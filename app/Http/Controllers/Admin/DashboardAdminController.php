<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $year = date('Y');
        $month = date('m');

        $pendaftarBulanan = $this->pendaftaranBulanan();

        $pendaftaranHarian = $this->pendaftaranHarian();

        $pendaftaranTahunan = $this->pendaftaranTahunan();

        $data = [
            'active' => 'dashboard',
            'dataPendaftarBulanan' => json_encode($pendaftarBulanan),
            'datapendaftarHarianCategories' => $pendaftaranHarian['categories'],
            'pendaftaranHarian' => $pendaftaranHarian['pendaftaranHarian'],
            'dataPendaftarTahunan' => json_encode($pendaftaranTahunan),
            'year' => $year,
            'month' => $month
        ];

        return view('admin.dashboard.index', $data);
    }

    public function pendaftaranHarian()
    {
        $year = date('Y');
        $month = date('m');

        // Ambil data dari database
        $pendaftaranHarian = DB::table('pendaftarans')
            ->select(DB::raw("DATE_FORMAT(tglpendaftaran, '%Y-%m-%d') AS tanggal_pendaftaran"), DB::raw('COALESCE(COUNT(*), 0) AS total_pendaftar'))
            ->whereYear('tglpendaftaran', $year)
            ->whereMonth('tglpendaftaran', $month)
            ->groupBy(DB::raw("DATE_FORMAT(tglpendaftaran, '%Y-%m-%d')"))
            ->orderBy('tanggal_pendaftaran', 'ASC')
            ->get();

        // Buat array dengan semua tanggal dalam rentang bulan ini
        $allDatesInMonth = [];
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = sprintf("%04d-%02d-%02d", $year, $month, $day);
            $allDatesInMonth[] = $date;
        }

        // Ubah hasil query menjadi associative array
        foreach ($pendaftaranHarian as $item) {
            $pendaftaranArray[$item->tanggal_pendaftaran] = $item->total_pendaftar;
        }

        // Isi nilai 0 untuk tanggal yang tidak ada dalam hasil query
        foreach ($allDatesInMonth as $date) {
            if (!isset($pendaftaranArray[$date])) {
                $pendaftaranHarian->push((object) ['tanggal_pendaftaran' => $date, 'total_pendaftar' => 0]);
            }
        }

        // Ubah Collection menjadi array
        $pendaftaranHarian = $pendaftaranHarian->all();

        // Urutkan kembali array berdasarkan tanggal
        usort($pendaftaranHarian, function ($a, $b) {
            return strtotime($a->tanggal_pendaftaran) - strtotime($b->tanggal_pendaftaran);
        });

        $categories = [];
        $pendaftaranData = [];

        foreach ($pendaftaranHarian as $item) {
            $categories[] = $item->tanggal_pendaftaran;
            $pendaftaranData[] = $item->total_pendaftar;
        }

        $categoriesJson = json_encode($categories);
        $pendaftaranDataJson = json_encode($pendaftaranData);

        $data = [
            'categories' => $categoriesJson,
            'pendaftaranHarian' => $pendaftaranDataJson
        ];

        return $data;
    }

    public function pendaftaranBulanan()
    {
        $year = date('Y');
        $month = date('m');

        $pendaftarBulanan = DB::table('pendaftarans')
            ->select(DB::raw("DATE_FORMAT(tglpendaftaran, '%Y-%m') AS bulan_pendaftaran"), DB::raw('COUNT(*) AS total_pendaftar'))
            ->whereYear('tglpendaftaran', $year)
            ->groupBy(DB::raw("DATE_FORMAT(tglpendaftaran, '%Y-%m')"))
            ->orderBy('bulan_pendaftaran', 'ASC')
            ->get();

        // Inisialisasi array untuk menyimpan data yang akan digunakan di grafik Highcharts
        $dataPendaftarBulanan = [];

        // Mengisi array dataPendaftarBulanan dengan hasil query
        foreach ($pendaftarBulanan as $result) {
            $dataPendaftarBulanan[] = (int)$result->total_pendaftar;
        }

        return $dataPendaftarBulanan;
    }

    public function pendaftaranTahunan()
    {
        // Mendapatkan tahun pertama kali dan tahun terakhir dalam data
        $firstYear = DB::table('pendaftarans')->min(DB::raw('YEAR(tglpendaftaran)'));
        $lastYear = DB::table('pendaftarans')->max(DB::raw('YEAR(tglpendaftaran)'));

        // Menambahkan 1 tahun ke tahun terakhir
        $nextYear = $lastYear + 1;

        // Query untuk menghitung jumlah pendaftaran per tahun dalam rentang tahun tersebut
        $pendaftaranTahunan = DB::table('pendaftarans')
            ->select(DB::raw("YEAR(tglpendaftaran) AS tahun_pendaftaran"), DB::raw('COALESCE(COUNT(*), 0) AS total_pendaftar'))
            ->whereBetween(DB::raw('YEAR(tglpendaftaran)'), [$firstYear, $nextYear]) // Menggunakan $nextYear
            ->groupBy(DB::raw("YEAR(tglpendaftaran)"))
            ->orderBy('tahun_pendaftaran', 'ASC')
            ->get();

        // Tambahkan data manual untuk tahun berikutnya jika belum ada
        $nextYearData = [
            'tahun_pendaftaran' => $nextYear,
            'total_pendaftar' => 0
        ];

        $pendaftaranTahunan->push($nextYearData);

        return $pendaftaranTahunan;
    }
}

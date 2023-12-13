<?php

namespace App\Http\Controllers\Guest;

use App\Models\Slider;
use App\Models\Regulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $year = date('Y');

        $pendaftaranTahunan = DB::table('pendaftarans')
            ->select(DB::raw("DATE_FORMAT(tglpendaftaran, '%Y-%m') AS bulan_pendaftaran"), DB::raw('COUNT(*) AS total_pendaftar'))
            ->whereYear('tglpendaftaran', $year)
            ->groupBy(DB::raw("DATE_FORMAT(tglpendaftaran, '%Y-%m')"))
            ->orderBy('bulan_pendaftaran', 'ASC')
            ->get();

        // Inisialisasi array untuk menyimpan data yang akan digunakan di grafik Highcharts
        $dataPendaftarTahunan = [];

        // Mengisi array dataPendaftarTahunan dengan hasil query
        foreach ($pendaftaranTahunan as $result) {
            $dataPendaftarTahunan[] = (int)$result->total_pendaftar;
        }

        $data = [
            'sliders' => $sliders,
            'dataPendaftarTahunan' => json_encode($dataPendaftarTahunan)
        ];

        return view('guest.landing', $data);
    }

    public function regulation()
    {
        $regulasi = Regulasi::all();

        $data = [
            'regulasi' => $regulasi
        ];

        return view('guest.regulation', $data);
    }
}

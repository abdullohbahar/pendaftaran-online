<?php

namespace App\Http\Controllers\Guest;

use PDF;
use Exception;
use App\Models\Kuota;
use App\Models\Transaksi;
use App\Models\Klasifikasi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\DataKendaraans;
use App\Models\IdentitasKendaraan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\CekTarifController;

class PendaftaranUjiPertamaController extends Controller
{
    public function index()
    {
        $jenis = Klasifikasi::orderBy('klasifikasis', 'asc')->get();

        $data = [
            'jenis' => $jenis,
            'active' => 'pendaftaran'
        ];

        return view('guest.registration.uji-pertama', $data);
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            // simpan ke tabel identitaskendaraan
            $alamatPemilik = "$request->kelurahan_pemilik, $request->kecamatan_pemilik, $request->kabupaten_pemilik, $request->provinsi_pemilik";
            $noRegiastrasiKendaraan = "$request->no_kendaraan_awal $request->no_kendaraan_tengah $request->no_kendaraan_belakang";

            $dataIdentitasKendaraan = [
                'nouji' => NULL, // Belum tau diambil dari mana,
                'nama' => $request->nama_pemilik,
                'alamat' => $alamatPemilik,
                'nohp' => NULL, // tidak diisi
                'noidentitaspemilik' => NULL,
                'noregistrasikendaraan' => $noRegiastrasiKendaraan,
                'merek' => NULL, // tidak diisi,
                'nosertifikatreg' => NULL, // tidak diisi
                'tglsertifikatreg' => NULL, // tidak diisi
                'rancang' => NULL, // tidak diisi
                'tipe' => NULL, // tidak diisi
                'norangka' => NULL, // tidak diisi
                'nomesin' => NULL, // tidak diisi
                'thpembuatan' => NULL, // tidak diisi
                'bahanbakar' => NULL, // tidak diisi
                'isisilinder' => NULL, // tidak diisi
                'dayamotorpenggerak' => NULL, // tidak diisi
                'jenis' => $request->jenis,
                'model' => NULL, // tidak diisi
                'peruntukan' => NULL, // tidak diisi
                'warna' => NULL, // tidak diisi
                'idkepaladinas' => NULL, // tidak diisi
                'iddirektur' => NULL, // tidak diisi
                'kodewilayah' => NULL, // tidak diisi
                'kodewilayahasal' => NULL, // tidak diisi
            ];

            $saveIdentitasKendaraan =  IdentitasKendaraan::create($dataIdentitasKendaraan);

            // simpan ke table pendaftarans
            $alamatPemohon = "$request->kelurahan_pemohon, $request->kecamatan_pemohon, $request->kabupaten_pemohon, $request->provinsi_pemohon";

            $dataPendaftaran = [
                'identitaskendaraan_id' => $saveIdentitasKendaraan->id,
                'idx' => NULL, // tidak diisi,
                'kodepenerbitans_id' => 1,
                'tglpendaftaran' => $request->tglpendaftaran,
                'tglbayar' => $request->tglpendaftaran,
                'namapemohon' => $request->namapemohon,
                'alamatpemohon' => $alamatPemohon,
                'notelp' => $request->nomor_telepon_pemohon,
                'status' => 0, // tidak diisi
                'verif' => 0, // tidak diisi
                'posisi' => NULL, // tidak diisi
                'foto' => NULL, // tidak diisi
                'jenispendaftaran' => 'on',
                'noantrian' => NULL, // tidak diisi
                'user_id' => NULL // tidak diisi
            ];

            $saveDataPendaftaran = Pendaftaran::create($dataPendaftaran);

            // simpan ke table datakendaraans
            $dataKendaraan = [
                'identitaskendaraan_id' => $saveIdentitasKendaraan->id,
                'jbb' => $request->jbb,
                'tinggianaktangga' => 0
            ];

            DataKendaraans::create($dataKendaraan);

            // Simpan ke table transaksis
            $cekTarifController = new CekTarifController();

            $cekTarif = $cekTarifController->__invoke($request->jbb);

            $tarif = json_decode($cekTarif->getContent())->data->tarif;

            $lastBillCode = Transaksi::orderBy('id', 'desc')->first()->bill_code;

            $tarif = 0;

            $dataTransaksi = [
                'pendaftaran_id' => $saveDataPendaftaran->id,
                'bill_code' => '0' . $lastBillCode + 1,
                'bill_code_unique' => 1,
                'bill_blth' => date('Ym'),
                'bill_name' => $request->namapemohon,
                'bill_alamat' => $alamatPemohon,
                'bill_alamatobj' => NULL,
                'pengujian' => $tarif,
                'penghapusan' => 0,
                'pengganti' => 0,
                'bill_denda' => 0,
                'kekurangan' => 0,
                'catatan' => NULL,
                'bill_amount' => $tarif,
                'bill_amount_paid' => 0,
                'bill_paid' => 0,
            ];

            $saveTransaksi = Transaksi::create($dataTransaksi);

            // kurangi kuota
            Kuota::where('tanggal', $request->tglpendaftaran)->first()->decrement('tersedia');

            DB::commit();
            return to_route('bukti.pendaftaran', $saveTransaksi->id)->with('success', 'Berhasil Melakukan Pendaftaran');
        } catch (Exception $e) {
            Log::critical($e);

            return redirect()->back()->with('failed', 'Gagal Melakukan Pendaftaran')->withInput();
        }
    }

    public function queryTransaction($idTransaksi)
    {
        $transaksi = Transaksi::join('pendaftarans', 'transaksis.pendaftaran_id', '=', 'pendaftarans.id')
            ->join('identitaskendaraans', 'pendaftarans.identitaskendaraan_id', '=', 'identitaskendaraans.id')
            ->join('datakendaraans', 'identitaskendaraans.id', '=', 'datakendaraans.identitaskendaraan_id')
            ->join('kodepenerbitan', 'pendaftarans.kodepenerbitans_id', '=', 'statuspenerbitan')
            ->select(
                'transaksis.bill_code',
                'transaksis.id as id_transaksi',
                'pendaftarans.namapemohon as nama_pemohon',
                'pendaftarans.alamatpemohon as alamat_pemohon',
                'pendaftarans.notelp as notelp_pemohon',
                'identitaskendaraans.nama as nama_pemilik',
                'identitaskendaraans.alamat as alamat_pemilik',
                'identitaskendaraans.noregistrasikendaraan as nomor_kendaraan',
                'identitaskendaraans.merek',
                'identitaskendaraans.tipe',
                'identitaskendaraans.nouji',
                'identitaskendaraans.thpembuatan as tahun_pembuatan',
                'identitaskendaraans.norangka as nomor_rangka',
                'identitaskendaraans.nomesin as nomor_mesin',
                'identitaskendaraans.noidentitaspemilik',
                'datakendaraans.bahan as jenis_rumah_rumah',
                'identitaskendaraans.peruntukan as sifat_penggunaan',
                'kodepenerbitan.keterangan as sifat_pengujian',
                'pendaftarans.tglpendaftaran as tanggal_berakhir_masa_uji',
                'pendaftarans.tglpendaftaran as untuk_diuji_tanggal',
            )
            ->where('transaksis.id', $idTransaksi)
            ->first();

        return $transaksi;
    }

    public function buktiPendaftaran($idTransaksi)
    {
        $transaksi = $this->queryTransaction($idTransaksi);

        $data = [
            'transaksi' => $transaksi,
            'active' => ''
        ];

        return view('guest.registration.bukti-pendaftaran.bukti-pendaftaran', $data);
    }

    public function buktiPDF($idTransaksi)
    {
        $transaksi = $this->queryTransaction($idTransaksi);

        $qrCode = QrCode::size(80)->generate($transaksi->bill_code);
        $qrCodeBase64 = 'data:image/png;base64,' . base64_encode($qrCode);

        $data = [
            'transaksi' => $transaksi,
            'qrCode' => $qrCodeBase64,
            'active' => ''
        ];

        $fileName = "BUKTI PENDAFTARAN - $transaksi->nomor_kendaraan - $transaksi->tanggal_berakhir_masa_uji";

        $pdf = PDF::loadView('guest.registration.bukti-pendaftaran.pdf.bukti', $data);
        $pdf->setPaper('a4', 'potrait');

        return $pdf->download($fileName . '.pdf');

        return view('guest.registration.bukti-pendaftaran.pdf.bukti', $data);
    }
}

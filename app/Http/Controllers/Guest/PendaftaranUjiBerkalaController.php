<?php

namespace App\Http\Controllers\Guest;

use Exception;
use App\Models\Merk;
use App\Models\Tipe;
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
use App\Http\Controllers\CekTarifController;

class PendaftaranUjiBerkalaController extends Controller
{
    public function index()
    {
        $jenis = Klasifikasi::orderBy('klasifikasis', 'asc')->get();
        $merek = Merk::orderBy('merek', 'asc')->get();
        $tipe = Tipe::orderBy('tipe', 'asc')->select('tipe')->get();

        $data = [
            'jenis' => $jenis,
            'merek' => $merek,
            'tipe' => $tipe,
            'active' => 'pendaftaran'
        ];

        return view('guest.registration.uji-berkala', $data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // simpan ke tabel identitaskendaraan
            $alamatPemilik = "$request->kelurahan_pemilik, $request->kecamatan_pemilik, $request->kabupaten_pemilik, $request->provinsi_pemilik";
            $noRegiastrasiKendaraan = "$request->no_kendaraan_awal $request->no_kendaraan_tengah $request->no_kendaraan_belakang";

            // Cek apakah data kendaraan sudah ada
            // jika sudah ada maka lakukan update saja

            $identitasKendaraan = IdentitasKendaraan::where('nouji', $request->nouji)->first();

            $dataIdentitasKendaraan = [
                'nama' => $request->nama_pemilik,
                'alamat' => $alamatPemilik,
                'noregistrasikendaraan' => $noRegiastrasiKendaraan,
                'merek' => $request->merek, // tidak diisi,
                'tipe' => $request->tipe, // tidak diisi
                'jenis' => $request->jenis,
            ];

            if ($identitasKendaraan) {
                IdentitasKendaraan::where('nouji', $request->nouji)->update($dataIdentitasKendaraan);
            } else {
                $identitasKendaraan = IdentitasKendaraan::create($dataIdentitasKendaraan);
            }

            // simpan ke table pendaftarans
            $alamatPemohon = "$request->kelurahan_pemohon, $request->kecamatan_pemohon, $request->kabupaten_pemohon, $request->provinsi_pemohon";

            $dataPendaftaran = [
                'identitaskendaraan_id' => $identitasKendaraan->id,
                'idx' => NULL, // tidak diisi,
                'kodepenerbitans_id' => 2,
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
                'identitaskendaraan_id' => $identitasKendaraan->id,
                'jbb' => $request->jbb,
                'tinggianaktangga' => 0
            ];

            DataKendaraans::create($dataKendaraan);

            // Simpan ke table transaksis
            $cekTarifController = new CekTarifController();

            $cekTarif = $cekTarifController->__invoke($request->jbb);

            $tarif = json_decode($cekTarif->getContent())->data->tarif;

            $lastBillCode = Transaksi::orderBy('id', 'desc')->first()->bill_code;

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
}

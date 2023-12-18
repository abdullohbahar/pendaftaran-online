<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Models\IdentitasKendaraan;
use App\Http\Controllers\Controller;

class CekPendaftaranController extends Controller
{
    public function index(Request $request)
    {

        if ($request->nouji) {
            $identitasKendaraan = IdentitasKendaraan::join('pendaftarans', 'identitaskendaraans.id', '=', 'pendaftarans.identitaskendaraan_id')
                ->join('kodepenerbitan', 'pendaftarans.kodepenerbitans_id', '=', 'kodepenerbitan.statuspenerbitan')
                ->join('datakendaraans', 'pendaftarans.identitaskendaraan_id', '=', 'datakendaraans.identitaskendaraan_id')
                ->join('transaksis', 'pendaftarans.id', '=', 'transaksis.pendaftaran_id')
                ->select(
                    'pendaftarans.tglpendaftaran',
                    'pendaftarans.namapemohon',
                    'identitaskendaraans.nama as nama_pemilik',
                    'identitaskendaraans.noregistrasikendaraan',
                    'kodepenerbitan.keterangan',
                    'transaksis.id as id_transaksi',
                    'transaksis.bill_paid'
                )
                ->where('identitaskendaraans.nouji', $request->nouji)
                ->orWhere('identitaskendaraans.noregistrasikendaraan', $request->nouji)
                ->orderBy('pendaftarans.tglpendaftaran', 'desc')
                ->get();
        } else {
            $identitasKendaraan = [];
        }

        $data = [
            'identitasKendaraan' => $identitasKendaraan,
            'active' => 'pendaftaran'
        ];

        return view('guest.cek-pendaftaran', $data);
    }
}

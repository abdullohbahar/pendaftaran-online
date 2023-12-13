<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdentitasKendaraan;

class CekPendaftaranController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($nomor)
    {
        $identitasKendaraan = IdentitasKendaraan::join('pendaftarans', 'identitaskendaraans.id', '=', 'pendaftarans.identitaskendaraan_id')
            ->join('kodepenerbitan', 'pendaftarans.kodepenerbitans_id', '=', 'kodepenerbitan.statuspenerbitan')
            ->join('datakendaraans', 'pendaftarans.identitaskendaraan_id', '=', 'datakendaraans.identitaskendaraan_id')
            ->select(
                'pendaftarans.tglpendaftaran',
                'pendaftarans.namapemohon',
                'identitaskendaraans.nama as nama_pemilik',
                'identitaskendaraans.noregistrasikendaraan',
                'kodepenerbitan.keterangan',
            )
            ->where('identitaskendaraans.nouji', $nomor)
            ->orWhere('identitaskendaraans.noregistrasikendaraan', $nomor)
            ->get();

        return response()->json([
            'status' => 200,
            'message' => 'OK',
            'data' => $identitasKendaraan
        ]);
    }
}

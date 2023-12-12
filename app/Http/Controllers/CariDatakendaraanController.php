<?php

namespace App\Http\Controllers;

use App\Models\IdentitasKendaraan;
use Illuminate\Http\Request;

class CariDatakendaraanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($nouji)
    {
        $identitasKendaraan = IdentitasKendaraan::join('pendaftarans', 'identitaskendaraans.id', '=', 'pendaftarans.identitaskendaraan_id')
            ->join('kodepenerbitan', 'pendaftarans.kodepenerbitans_id', '=', 'kodepenerbitan.statuspenerbitan')
            ->join('datakendaraans', 'pendaftarans.identitaskendaraan_id', '=', 'datakendaraans.identitaskendaraan_id')
            ->select(
                'identitaskendaraans.nouji',
                'identitaskendaraans.noregistrasikendaraan',
                'identitaskendaraans.nama',
                'identitaskendaraans.norangka',
                'identitaskendaraans.nomesin',
                'identitaskendaraans.jenis',
                'identitaskendaraans.merek',
                'identitaskendaraans.tipe',
                'identitaskendaraans.model',
                'identitaskendaraans.kodewilayah',
                'identitaskendaraans.alamat as alamat_pemilik',
                'kodepenerbitan.keterangan as status_uji_terakhir',
                'datakendaraans.jbb'
            )
            ->where('identitaskendaraans.nouji', $nouji)
            ->orWhere('identitaskendaraans.noregistrasikendaraan', $nouji)
            ->first();

        if ($identitasKendaraan) {
            return response()->json([
                'status' => 200,
                'message' => 'OK',
                'data' => $identitasKendaraan
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Not Found',
                'data' => []
            ]);
        }
    }
}

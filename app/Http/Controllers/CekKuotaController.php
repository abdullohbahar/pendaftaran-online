<?php

namespace App\Http\Controllers;

use App\Models\Kuota;
use Illuminate\Http\Request;

class CekKuotaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $dateNow = now();

        $kuota = Kuota::where('tanggal', '>=', $dateNow)
            ->orderBy('tanggal', 'asc')
            ->get();

        return response()->json([
            'status' => 200,
            'message' => 'OK',
            'data' => $kuota
        ]);
    }
}

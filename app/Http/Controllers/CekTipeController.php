<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Tipe;
use Illuminate\Http\Request;

class CekTipeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($merk)
    {
        $merek = Merk::where('merek', $merk)->first();

        $tipe = Tipe::where('merek_id', $merek->id)->orderBy('tipe', 'asc')->select('tipe')->get();

        $data = [
            'tipe' => $tipe
        ];

        return response()->json([
            'status' => 200,
            'message' => 'OK',
            'data' => $data
        ]);
    }
}

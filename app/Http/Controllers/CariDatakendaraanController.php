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
        $identitasKendaraan = IdentitasKendaraan::where('nouji', $nouji)
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

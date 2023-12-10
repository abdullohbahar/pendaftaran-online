<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekTarifController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($berat)
    {
        switch (true) {
            case $berat <= 2500:
                $tarif = 40000;
                break;
            case $berat <= 3500:
                $tarif = 45000;
                break;
            case $berat <= 9000:
                $tarif = 50000;
                break;
            case $berat <= 15000:
                $tarif = 55000;
                break;
            default:
                $tarif = 60000;
                break;
        }

        $data = [
            'tarif' => $tarif,
            'berat' => $berat,
        ];

        return response()->json([
            'status' => 200,
            'message' => 'OK',
            'data' => $data
        ]);
    }
}

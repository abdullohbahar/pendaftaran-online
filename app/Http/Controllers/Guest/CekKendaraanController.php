<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CekKendaraanController extends Controller
{
    public function index()
    {
        $data = [
            'active' => ''
        ];

        return view('guest.cek-kendaraan', $data);
    }
}

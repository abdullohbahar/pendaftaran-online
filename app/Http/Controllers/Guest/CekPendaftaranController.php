<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CekPendaftaranController extends Controller
{
    public function index()
    {
        return view('guest.cek-pendaftaran');
    }
}

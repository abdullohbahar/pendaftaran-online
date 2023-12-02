<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendaftaranUjiPertamaController extends Controller
{
    public function index()
    {
        return view('guest.registration.uji-pertama');
    }
}

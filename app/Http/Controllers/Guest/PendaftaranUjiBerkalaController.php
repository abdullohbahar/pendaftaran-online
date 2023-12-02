<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendaftaranUjiBerkalaController extends Controller
{
    public function index()
    {
        return view('guest.registration.uji-berkala');
    }
}

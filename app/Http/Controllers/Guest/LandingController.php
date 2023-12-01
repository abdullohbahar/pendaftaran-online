<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('guest.landing');
    }

    public function regulation()
    {
        return view('guest.regulation');
    }
}
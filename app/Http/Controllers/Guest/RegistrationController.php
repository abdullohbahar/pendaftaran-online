<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $data = [
            'active' => 'pendaftaran'
        ];

        return view('guest.registration.registration', $data);
    }
}

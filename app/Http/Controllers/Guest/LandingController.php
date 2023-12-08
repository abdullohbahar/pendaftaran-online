<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Regulasi;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();

        $data = [
            'sliders' => $sliders
        ];

        return view('guest.landing', $data);
    }

    public function regulation()
    {
        $regulasi = Regulasi::all();

        $data = [
            'regulasi' => $regulasi
        ];

        return view('guest.regulation', $data);
    }
}

<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\KritikSaran;
use Illuminate\Http\Request;

class KritikDanSaranController extends Controller
{
    public function index()
    {
        return view('guest.kritik-saran');
    }

    public function store(Request $request)
    {
        KritikSaran::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'kritik_saran' => $request->kritik_saran,
            'tingkat_kepuasan' => $request->tingkat_kepuasan
        ]);

        return redirect()->back()->with('success', 'Berhasil memberi kritik dan saran');
    }
}

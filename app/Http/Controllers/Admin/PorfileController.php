<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PorfileController extends Controller
{
    public function index()
    {
        $data = [
            'active' => ''
        ];

        return view('admin.profile.index', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required'
        ]);

        if (auth()->user()->username != $request->username) {
            $request->validate([
                'username' => 'unique:admins,username'
            ]);
        }

        $data = [
            'username' => $request->username
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        Admin::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Berhasil Mengubah Profile');
    }
}

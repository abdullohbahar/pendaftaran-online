<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Regulasi;
use Illuminate\Http\Request;

class RegulasiController extends Controller
{
    public function index()
    {
        $regulasi = Regulasi::all();

        $data = [
            'active' => 'regulasi',
            'regulasi' => $regulasi
        ];

        return view('admin.regulasi.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'regulasi',
        ];

        return view('admin.regulasi.create', $data);
    }

    public function store(Request $request)
    {
        $data = [
            'nama_dokumen' => $request->nama_dokumen,
            'tahun_terbit' => $request->tahun_terbit,
            'jenis' => $request->jenis
        ];

        $file = $request->file('file');
        $filename = date('His') . "." . $file->getClientOriginalExtension();
        $location = 'file-regulasi/';
        $filepath = $location . $filename;
        $file->move($location, $filename);
        $data['file'] = $filepath;

        Regulasi::create($data);

        return to_route('admin.regulasi')->with('success', 'Berhasil menyimpan regulasi');
    }

    public function edit($id)
    {
        $regulasi = Regulasi::findorfail($id);


        $data = [
            'active' => 'regulasi',
            'regulasi' => $regulasi
        ];

        return view('admin.regulasi.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $regulasi = Regulasi::findorfail($id);

        $data = [
            'nama_dokumen' => $request->nama_dokumen,
            'tahun_terbit' => $request->tahun_terbit,
            'jenis' => $request->jenis
        ];

        if ($request->file('file')) {
            if (file_exists(public_path($regulasi->file))) {
                unlink(public_path($regulasi->file));
            }

            $file = $request->file('file');
            $filename = date('His') . "." . $file->getClientOriginalExtension();
            $location = 'file-regulasi/';
            $filepath = $location . $filename;
            $file->move($location, $filename);
            $data['file'] = $filepath;
        }

        Regulasi::where('id', $id)->update($data);

        return to_route('admin.regulasi')->with('success', 'Berhasil mengubah regulasi');
    }

    public function destroy($id)
    {
        try {
            // mengambil data banner
            $regulasi = Regulasi::findorfail($id);

            // melakukan pengecekan apakah file ada atau tidak
            // jika ada maka hapus file tersebut
            if (file_exists(public_path($regulasi->file))) {
                unlink(public_path($regulasi->file));
            }

            Regulasi::destroy($id);

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus Data Regulasi',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus Data Regulasi',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}

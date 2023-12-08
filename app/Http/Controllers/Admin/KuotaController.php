<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kuota;
use Illuminate\Http\Request;
use DataTables;

class KuotaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Kuota::orderBy('tanggal', 'desc')->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '<div class="btn-group" role="group" aria-label="Basic example">
                                <a href="./kuota/ubah/' . $item->id . '" type="button" class="btn btn-warning">Ubah</a>
                                <button class="btn btn-danger" id="removeBtn" data-id="{{ $kuota->id }}">Hapus</button>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        $data = [
            'active' => 'kuota',
        ];

        return view('admin.kuota.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'kuota',
        ];

        return view('admin.kuota.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|unique:kuota,tanggal'
        ], [
            'tanggal.unique' => 'Tanggal sudah ada'
        ]);

        $data = [
            'tanggal' => $request->tanggal,
            'kuota' => $request->kuota,
            'tersedia' => $request->kuota
        ];

        Kuota::create($data);

        return to_route('admin.kuota')->with('success', 'Berhasil menambah kuota');
    }

    public function edit($id)
    {

        $kuota = Kuota::findorfail($id);

        $data = [
            'active' => 'kuota',
            'kuota' => $kuota,
        ];

        return view('admin.kuota.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required'
        ]);

        $kuota = Kuota::findorfail($id);

        if ($kuota->tanggal != $request->tanggal) {
            $request->validate([
                'tanggal' => 'unique:kuota,tanggal'
            ], [
                'tanggal.unique' => 'Tanggal sudah ada'
            ]);
        }

        // mencari tersedia
        $oldKuota = $kuota->kuota;
        $oldTersedia = $kuota->tersedia;

        $selisih = $oldKuota - $oldTersedia;

        $data = [
            'tanggal' => $request->tanggal,
            'kuota' => $request->kuota,
            'tersedia' => $request->kuota - $selisih
        ];

        Kuota::where('id', $id)->update($data);

        return to_route('admin.kuota')->with('success', 'Berhasil mengubah kuota');
    }

    public function destroy($id)
    {
        try {
            Kuota::destroy($id);

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus Data Kuota',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus Data Kuota',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}

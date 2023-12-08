<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merk;
use Illuminate\Http\Request;
use DataTables;

class MerkController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Merk::orderBy('created_at', 'desc')->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '<div class="btn-group" role="group" aria-label="Basic example">
                                <a href="./merek/ubah/' . $item->id . '" type="button" class="btn btn-warning">Ubah</a>
                                <button class="btn btn-danger" id="removeBtn" data-id="' . $item->id . '">Hapus</button>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        $data = [
            'active' => 'merek'
        ];

        return view('admin.merek.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'merek'
        ];

        return view('admin.merek.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required|unique:mereks,merek'
        ], [
            'merek.unique' => 'Merek sudah ada'
        ]);

        $data = [
            'merek' => $request->merek,
        ];

        Merk::create($data);

        return to_route('admin.merek')->with('success', 'Berhasil menambah merek');
    }

    public function edit($id)
    {
        $merek = Merk::findorfail($id);

        $data = [
            'active' => 'merek',
            'merek' => $merek
        ];

        return view('admin.merek.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->merek != $request->old_merek) {
            $request->validate([
                'merek' => 'required|unique:mereks,merek'
            ], [
                'merek.unique' => 'Merek sudah ada'
            ]);
        }

        Merk::where('id', $id)->update([
            'merek' => $request->merek
        ]);

        return to_route('admin.merek')->with('success', 'Berhasil mengubah merek');
    }

    public function destroy($id)
    {
        try {
            Merk::destroy($id);

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus Data Merek',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus Data Merek',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}

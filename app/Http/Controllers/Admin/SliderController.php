<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();

        $data = [
            'active' => 'slider',
            'sliders' => $sliders
        ];

        return view('admin.slider.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => 'slider',
        ];

        return view('admin.slider.create', $data);
    }

    public function store(Request $request)
    {
        $file = $request->file('gambar');
        $filename = date('His') . "." . $file->getClientOriginalExtension();
        $location = 'gambar-slider/';
        $filepath = $location . $filename;
        $file->move($location, $filename);
        $data['gambar'] = $filepath;

        Slider::create($data);

        return to_route('admin.slider')->with('success', 'Berhasil menyimpan slider');
    }

    public function destroy(string $id)
    {
        try {
            // mengambil data banner
            $slider = Slider::findorfail($id);

            // melakukan pengecekan apakah file ada atau tidak
            // jika ada maka hapus file tersebut
            if (file_exists(public_path($slider->gambar))) {
                unlink(public_path($slider->gambar));
            }

            Slider::destroy($id);

            // Mengembalikan respons JSON sukses dengan status 200
            return response()->json([
                'message' => 'Berhasil Menghapus Data Slider',
                'code' => 200,
                'error' => false
            ]);
        } catch (\Exception $e) {
            // Menangkap exception jika terjadi kesalahan
            return response()->json([
                'message' => 'Gagal Menghapus Data Slider',
                'code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}

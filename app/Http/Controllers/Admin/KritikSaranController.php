<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KritikSaran;
use Illuminate\Http\Request;
use DataTables;

class KritikSaranController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = KritikSaran::orderBy('created_at', 'desc')->get();

            return Datatables::of($query)
                // ->addColumn('action', function ($item) {
                //     return '<div class="btn-group" role="group" aria-label="Basic example">
                //                 <button class="btn btn-info" id="detailBtn" data-id="' . $item->id . '">Detail</button>
                //             </div>';
                // })
                // ->rawColumns(['action'])
                ->make();
        }

        $data = [
            'active' => 'kritik-saran'
        ];

        return view('admin.kritik-saran.index', $data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use DataTables;


class PendaftaranController extends Controller
{
    public function index()
    {


        if (request()->ajax()) {
            $query = Pendaftaran::join('identitaskendaraans', 'pendaftarans.identitaskendaraan_id', '=', 'identitaskendaraans.id')
                ->join('kodepenerbitan', 'pendaftarans.kodepenerbitans_id', '=', 'kodepenerbitan.statuspenerbitan')
                ->select(
                    'pendaftarans.tglpendaftaran',
                    'pendaftarans.namapemohon',
                    'identitaskendaraans.nama as nama_pemilik',
                    'identitaskendaraans.noregistrasikendaraan'
                )
                ->orderBy('pendaftarans.tglpendaftaran', 'desc')->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '<div class="btn-group" role="group" aria-label="Basic example">
                            </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        $data = [
            'active' => 'pendaftaran',
        ];

        return view('admin.pendaftaran.index', $data);
    }
}

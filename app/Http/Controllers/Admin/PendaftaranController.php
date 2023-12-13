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
                ->join('transaksis', 'pendaftarans.id', '=', 'transaksis.pendaftaran_id')
                ->select(
                    'pendaftarans.tglpendaftaran',
                    'pendaftarans.namapemohon',
                    'identitaskendaraans.nama as nama_pemilik',
                    'identitaskendaraans.noregistrasikendaraan',
                    'kodepenerbitan.keterangan',
                    'transaksis.bill_paid'
                )
                ->orderBy('pendaftarans.tglpendaftaran', 'desc')->get();

            return Datatables::of($query)
                // ->addColumn('action', function ($item) {
                //     return '<div class="btn-group" role="group" aria-label="Basic example">
                //             </div>';
                // })
                ->addColumn('status', function ($item) {
                    if ($item->bill_paid) {
                        $html = '<button class="btn btn-info btn-sm">Lunas</button>';
                    } else {
                        $html = '<button class="btn btn-danger btn-sm">Belum Lunas</button>';
                    }

                    return $html;
                })
                ->rawColumns(['status'])
                ->make();
        }

        $data = [
            'active' => 'pendaftaran',
        ];

        return view('admin.pendaftaran.index', $data);
    }
}

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
                    'pendaftarans.posisi',
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
                    if ($item->posisi > 1) {
                        $html = '<button class="btn btn-success btn-sm">Telah Uji</button>';
                    } else {
                        $html = '<button class="btn btn-secondary btn-sm">Belum Uji</button>';
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

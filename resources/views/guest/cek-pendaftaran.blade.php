@extends('guest.layout.app')

@section('title')
    Regulasi | Sistem Pengujian Kendaraan Bermotor Online
@endsection

@push('addons-css')
    <style>
        .callout {
            background-color: #fff;
            border: 1px solid #e4e7ea;
            border-left: 4px solid #c8ced3;
            border-radius: .25rem;
            margin: 1rem 0;
            padding: .75rem 1.25rem;
            position: relative;
        }

        .callout h4 {
            font-size: 1.3125rem;
            margin-top: 0;
            margin-bottom: .8rem
        }

        .callout p:last-child {
            margin-bottom: 0;
        }

        .callout-default {
            border-left-color: #777;
            background-color: #f4f4f4;
        }

        .callout-default h4 {
            color: #777;
        }

        .callout-primary {
            border-left-color: #17a2b8;
        }

        .callout-primary h4 {
            color: #20a8d8;
        }
    </style>
    <link rel="stylesheet"
        href="{{ asset('./dashboard-assets/library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('./dashboard-assets/library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item">Cek Pendaftaran</li>
            </ol>
        </nav>

        <h2>Cek Pendaftaran</h2>

        <hr>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="GET" id="selectPendaftaran">
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <label class="mt-2" for=""><b>Nomor uji / Nomor Kendaraan</b></label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-8">
                                    <input type="text" name="nouji" class="form-control"
                                        placeholder="masukkan no uji / no kendaraan" id="">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-block btn-info">
                                        <i class="fa-regular fa-pen-to-square"></i> Cek Pendaftaran
                                    </button>
                                </div>
                            </div>
                        </form>

                        @if ($identitasKendaraan)
                            {{-- hasil dari cek kendaraan --}}
                            <div class="row mt-5" id="showResult">
                                <div class="col-12">
                                    <h2><b>Data Riwayat Booking</b></h2>
                                    <table class="table table-bordered text-center" id="table1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Tanggal Daftar</th>
                                                <th class="text-center">Jenis Pendaftaran</th>
                                                <th class="text-center">Tanggal Uji</th>
                                                <th class="text-center">No Kendaraan</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Bukti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($identitasKendaraan as $item)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($item->tglpendaftaran)->format('d-m-Y') }}
                                                    </td>
                                                    <td>{{ $item->keterangan }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->tglpendaftaran)->format('d-m-Y') }}
                                                    </td>
                                                    <td>{{ $item->noregistrasikendaraan }}</td>
                                                    <td>
                                                        @if ($item->bill_paid)
                                                            <button class="btn btn-info btn-sm">Lunas</button>
                                                        @else
                                                            <button class="btn btn-danger btn-sm">Belum Lunas</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('bukti.pendaftaran.pdf', $item->id_transaksi) }}"
                                                            class="btn btn-success">
                                                            <i class="fas fa-file-download"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">Data Tidak Ditemukan</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addons-js')
    <!-- JS Libraies -->
    <script src="{{ asset('./dashboard-assets/library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('./dashboard-assets/library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('./dashboard-assets/library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('./dashboard-assets/assets/js/page/modules-datatables.js') }}"></script>

    <script>
        $("#table1").DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            responsive: true,
        });
    </script>
@endpush

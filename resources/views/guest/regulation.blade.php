@extends('guest.layout.app')

@section('title')
    Regulasi | Sistem Pengujian Kendaraan Bermotor Online
@endsection

@push('addons-css')
@endpush

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item">Regulasi</li>
            </ol>
        </nav>
    </div>

    <div class="container" style="height: 480px;">
        <h2>Regulasi</h2>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokumen</th>
                            <th>Terbit Tahun</th>
                            <th>Jenis</th>
                            <th>Unduh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>ini nama</td>
                            <td>2023</td>
                            <td>adsf</td>
                            <td>
                                <a href="" class="btn btn-info">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addons-js')
@endpush

@extends('guest.layout.app')

@section('title')
    Regulasi | Sistem Pengujian Kendaraan Bermotor Online
@endsection

@push('addons-css')
@endpush

@section('content')
    <div class="container" style="margin-top: 100px">
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
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($regulasi as $regulasi)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $regulasi->nama_dokumen }}</td>
                                <td>{{ $regulasi->tahun_terbit }}</td>
                                <td>{{ $regulasi->jenis }}</td>
                                <td>
                                    <a href="{{ asset($regulasi->file) }}" target="_blank" class="btn btn-info">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addons-js')
@endpush

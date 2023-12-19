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

        .no-kend {
            text-align: center
        }

        .input-group-append .btn {
            font-size: 9pt;
        }

        .tooltip-inner {
            background-color: #dddddd;
            color: black;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('registration') }}">Pendaftaran</a></li>
                <li class="breadcrumb-item">Bukti Pendaftaran</li>
            </ol>
        </nav>

        <h2>Bukti Pendaftaran</h2>

        <hr>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    Berhasil Melakukan Pendaftaran
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('bukti.pendaftaran.pdf', $transaksi->id_transaksi) }}"
                                    class="btn btn-primary mb-3">Unduh Bukti Pendaftaran</a>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="width: 30%">Nama Pemohon</th>
                                            <td style="width: 10px">:</td>
                                            <td>{{ $transaksi->nama_pemohon ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%">Alamat Pemohon</th>
                                            <td style="width: 10px">:</td>
                                            <td>{{ $transaksi->alamat_pemohon ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Uji Kendaraan</th>
                                            <td>:</td>
                                            <td>{{ $transaksi->nouji ?? ('-' ?? '-') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Kendaraan</th>
                                            <td>:</td>
                                            <td>{{ $transaksi->nomor_kendaraan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Pemilik</th>
                                            <td>:</td>
                                            <td>{{ $transaksi->nama_pemilik ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Pemilik</th>
                                            <td>:</td>
                                            <td>{{ $transaksi->alamat_pemilik ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Merek / Type</th>
                                            <td>:</td>
                                            <td>{{ $transaksi->merek ?? '-' }}/{{ $transaksi->tipe ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tahun Pembuatan</th>
                                            <td>:</td>
                                            <td>{{ $transaksi->tahun_pembuatan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Rangka</th>
                                            <td>:</td>
                                            <td>{{ $transaksi->nomor_rangka ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Mesin</th>
                                            <td>:</td>
                                            <td>{{ $transaksi->nomor_mesin ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis rumah-rumah</th>
                                            <td>:</td>
                                            <td>{{ $transaksi->jenis_rumah_rumah ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Sifat Penggunaan</th>
                                            <td>:</td>
                                            <td>{{ $transaksi->sifat_penggunaan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Sifat Pengujian</th>
                                            <td>:</td>
                                            <td>{{ $transaksi->sifat_pengujian ?? '-' }}</td>
                                        </tr>
                                        @php
                                            \Carbon\Carbon::setLocale('id');
                                        @endphp
                                        <tr>
                                            <th>Tanggal Berakhir Masa Uji</th>
                                            <td>:</td>
                                            <td>{{ \Carbon\Carbon::parse($transaksi->untuk_diuji_tanggal)->translatedFormat('j F Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Untuk Diuji pada tanggal</th>
                                            <td>:</td>
                                            <td>{{ \Carbon\Carbon::parse($transaksi->untuk_diuji_tanggal)->translatedFormat('j F Y') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addons-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

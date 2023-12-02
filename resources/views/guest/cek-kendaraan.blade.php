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
@endpush

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item">Cek Kendaraan</li>
            </ol>
        </nav>

        <h2>Cek Kendaraan</h2>

        <hr>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" id="selectPendaftaran">
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <label class="mt-2" for=""><b>Nomor uji / Nomor Kendaraan</b></label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-8">
                                    <input type="text" name="" class="form-control"
                                        placeholder="masukkan no uji / no kendaraan" id="">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-block btn-info">
                                        <i class="fa-regular fa-pen-to-square"></i> Cek Kendaraan
                                    </button>
                                </div>
                            </div>
                        </form>

                        {{-- hasil dari cek kendaraan --}}
                        <div class="row mt-5" id="showResult">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 30%">Nomor Uji</th>
                                        <td style="width: 10px;">:</td>
                                        <td>asdf</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Kendaraan</th>
                                        <td>:</td>
                                        <td>asdf</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Pemilik</th>
                                        <td>:</td>
                                        <td>asdf</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Rangka</th>
                                        <td>:</td>
                                        <td>asdf</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Mesin</th>
                                        <td>:</td>
                                        <td>asdf</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis</th>
                                        <td>:</td>
                                        <td>asdf</td>
                                    </tr>
                                    <tr>
                                        <th>Merk / TIpe</th>
                                        <td>:</td>
                                        <td>asdf</td>
                                    </tr>
                                    <tr>
                                        <th>Model</th>
                                        <td>:</td>
                                        <td>asdf</td>
                                    </tr>
                                    <tr>
                                        <th>Masa Berlaku Uji</th>
                                        <td>:</td>
                                        <td>asdf</td>
                                    </tr>
                                    <tr>
                                        <th>Status uji Terakhir</th>
                                        <td>:</td>
                                        <td>asdf</td>
                                    </tr>
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
@endpush

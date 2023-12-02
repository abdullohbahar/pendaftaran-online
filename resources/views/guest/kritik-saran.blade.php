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
                <li class="breadcrumb-item">Kritik dan Saran</li>
            </ol>
        </nav>

        <h2>Kritik dan Saran</h2>

        <hr>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-2 text-lg-right">
                                    <label class="mt-2 ml-lg-4" for=""><b>Nama</b></label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-10">
                                    <input type="text" name="nama" class="form-control" style="width: 100%"
                                        id="">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-2 text-lg-right">
                                    <label class="mt-2 ml-lg-4" for=""><b>Email</b></label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-10">
                                    <input type="email" name="email" class="form-control" style="width: 100%"
                                        id="">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-2 text-lg-right">
                                    <label class="mt-2 ml-lg-4" for=""><b>No Telepon</b></label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-10">
                                    <input type="text" name="no_telp" class="form-control" style="width: 100%"
                                        id="">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-2 text-lg-right">
                                    <label class="mt-2 ml-lg-4" for=""><b>Kritik dan Saran</b></label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-10">
                                    <textarea name="kritik_dan_saran" class="form-control" id=""></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-2 text-lg-right">
                                    <label class="mt-2 ml-lg-4" for=""><b>Tingkat Kepuasan</b></label>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-10">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sangat-puas" value="sangat-puas" name="tingkat-kepuasan"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="sangat-puas">Sangat Puas</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="puas" value="puas" name="tingkat-kepuasan"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="puas">Puas</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kurang-puas" value="kurang-puas" name="tingkat-kepuasan"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="kurang-puas">Kurang Puas</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="tidak-puas" value="tidak-puas" name="tingkat-kepuasan"
                                            class="custom-control-input">
                                        <label class="custom-control-label" for="tidak-puas">Tidak Puas</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-block btn-info">
                                        <i class="fa-regular fa-pen-to-square"></i> Kirim
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addons-js')
@endpush

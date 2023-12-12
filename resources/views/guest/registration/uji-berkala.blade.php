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
                <li class="breadcrumb-item">Uji Berkala</li>
            </ol>
        </nav>

        <h2>Uji Berkala</h2>

        <hr>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('simpan.uji.berkala') }}" method="POST">
                            @csrf
                            {{-- jika data ditemukan tampilkan alert berikut --}}
                            <div class="alert alert-success text-capitalize" role="alert" hidden>
                                Data Ditemukan. cek kelengkapan data dibawah
                            </div>
                            {{-- jika data tidak ditemukan tampilkan alert berikut --}}
                            <div class="alert alert-danger" role="alert" hidden>
                                Data Tidak Ditemukan. harap mengisi data
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <label>Tanggal booking</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="tanggalBooking"
                                            name="tglpendaftaran">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" id="cekKuota" type="button">Cek
                                                Kuota</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label>Nomor Uji</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="nouji" name="nouji">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" id="search" type="button">Cari Data
                                                Kendaraan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                            {{-- jika data ditemukan maka tampilkan form berikut --}}
                            <div id="showResult">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <label>No Kendaraan (Awal)</label>
                                        <input type="text" class="form-control no-kend" id="noKendAwal"
                                            name="no_kendaraan_awal" maxlength="2">
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label>No Kendaraan (Tengah)</label>
                                        <input type="text" class="form-control no-kend" id="noKendTengah"
                                            name="no_kendaraan_tengah" maxlength="4">
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label>No Kendaraan (Belakang)</label>
                                        <input type="text" class="form-control no-kend" id="noKendBelakang"
                                            name="no_kendaraan_belakang" maxlength="3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <hr>
                                        <b>Pemilik</b> <br>
                                        <label>Nama Pemilik</label>
                                        <input type="text" class="form-control" name="nama_pemilik" id="namaPemilik">
                                    </div>
                                </div>
                                {{-- alamat pemilik --}}
                                @include('guest.registration.components.owner-address')
                                <div class="row">
                                    <div class="col-12">
                                        <hr>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Merek</label>
                                        <div class="input-group mb-3">
                                            <select name="merek" id="merek" class="select2" required>
                                                <option value="">-- Pilih merek --</option>
                                                @foreach ($merek as $merek)
                                                    <option value="{{ $merek->merek }}">{{ $merek->merek }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Tipe</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="tipe" class="form-control" id="tipe">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Jenis</label>
                                        <select name="jenis" id="jenis" class="form-control" required>
                                            <option value="">-- Pilih Jenis --</option>
                                            @foreach ($jenis as $jenis)
                                                <option value="{{ $jenis->klasifikasis }}">{{ $jenis->klasifikasis }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>JBB</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="" id="berat">
                                            <div class="input-group-append">
                                                <button class="btn btn-info" type="button" data-toggle="tooltip"
                                                    data-html="true" id="tooltipJBB">?</button>
                                                <button class="btn btn-success" type="button" id="cekTarif">Cek
                                                    Tarif</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6" id="resultCekTarif">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <hr>
                                        <b>Persyaratan (Wajib Checklist Semua)</b>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                required>
                                            <label class="custom-control-label" for="customCheck1">STNK asli dan masih
                                                berlaku</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2"
                                                required>
                                            <label class="custom-control-label" for="customCheck2">KTP pemohon uji atau
                                                surat
                                                kuasa</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3"
                                                required>
                                            <label class="custom-control-label" for="customCheck3">Kartu Uji</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <hr>
                                        <b>Pemohon</b>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Nama Pemohon</label>
                                        <input type="text" class="form-control" name="namapemohon" id="">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Nomor Telepon Pemohon</label>
                                        <input type="text" class="form-control" name="nomor_telepon_pemohon"
                                            id="">
                                    </div>
                                </div>
                                {{-- alamat pemohon --}}
                                @include('guest.registration.components.applicant-address')
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-block btn-info">
                                        <i class="fa-regular fa-pen-to-square"></i> Daftar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('guest.registration.components.modal-cek-kuota')
@endsection

@push('addons-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('./landing-assets/js/cek-kuota.js') }}"></script>
    <script src="{{ asset('./landing-assets/js/cek-tarif.js') }}"></script>
    <script src="{{ asset('./landing-assets/js/cari-data-kendaraan.js') }}"></script>


    <script src="{{ asset('./landing-assets/js/owner-address.js') }}"></script>
    <script src="{{ asset('./landing-assets/js/applicant-address.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Set HTML content for the tooltip
            $('#tooltipJenis').tooltip({
                title: function() {
                    return `
                        Jenis Kendaraan
                        <hr>
                        Dapat dicek pada STNK atau Sertifikasi Uji Tipe Kendaraan Bermotor
                    `;
                },
                html: true
            });
            $('#tooltipJBB').tooltip({
                title: function() {
                    return `
                        JBB adalah
                        <hr>
                        Berat operasional maksimum dari sebuah kendaraan dengan satuan Kg
                    `;
                },
                html: true
            });
        });
    </script>
@endpush

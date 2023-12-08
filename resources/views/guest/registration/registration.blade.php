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
                <li class="breadcrumb-item">Pendaftaran</li>
            </ol>
        </nav>

        <h2>Pendaftaran</h2>

        <hr>

        <div class="callout callout-primary alert-dismissible fade show">
            <h4><i class="fas fa-fw fa-info-circle"></i> Tata Cara Pendaftaran</h4>
            <i class="fa fa-building fa-fw"></i> Pilih provinsi <i class="fa fa-arrow-right"></i> Pilih pengujian kendaraan
            tujuan <i class="fa fa-arrow-right"></i> Pilih permohonan
            <br>
            <i class="fa fa-building fa-fw"></i> Jika Permohonan Baru, isi dan lengkapi data-data kendaraan
            <br>
            <i class="fa fa-building fa-fw"></i> Untuk Perpanjangan, Mutasi Masuk, Peremajaan hingga Buku Uji Hilang
            silahkan masukkan Nomor Uji kendaraan.
            <br>
        </div>
    </div>

    <div class="container" style="height: 480px;">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form action="" id="selectPendaftaran">
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-4">
                                    <label class="mt-2 ml-sm-4" for=""><b>Permohonan</b></label>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <select class="form-control" style="width: 100%" name="" required
                                        id="pendaftaran">
                                        <option value="">-- Pilih Permohonan --</option>
                                        <option value="uji-pertama">Uji Pertama</option>
                                        <option value="uji-berkala">Uji Berkala</option>
                                        <option value="numpang-uji-masuk">Numpang Uji Masuk</option>
                                        <option value="mutasi-masuk">Mutasi Masuk</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-block btn-info">
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
@endsection

@push('addons-js')
    <script>
        $("#selectPendaftaran").on("submit", function(e) {
            e.preventDefault();

            var val = $("#pendaftaran").val();

            console.log(val)

            var currentURL = window.location.href;

            // Pengecekan apakah ada garis miring di akhir URL
            if (currentURL.endsWith("/")) {
                // Menghapus garis miring dari akhir URL
                currentURL = currentURL.slice(0, -1);
            }

            window.location.href = currentURL + '/' + val
        })
    </script>
@endpush

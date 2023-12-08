<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    @stack('addons-css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>@yield('title')</title>

    <style>
        main {
            margin-top: 70px;
        }

        .nav-link {
            color: #03A678 !important;
        }

        .nav-link:hover {
            color: black !important;
        }
    </style>
</head>

<body>
    {{-- navbar --}}
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg" width="30"
                        height="30" class="d-inline-block align-top" alt="">
                    Bootstrap
                </a> <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto text-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('regulation') }}">Regulasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registration') }}">Pendaftaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kritik') }}">Kritik & Saran</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div style="background-color: #03A678; color: white;">
            <div class="container">
                <div class="row pt-4 pb-4">
                    <div class="col-sm-12 col-md-4">
                        <h5><b>Kontak Kami</b></h5>
                        <p>
                            Jika ada kendala hubungi <br>
                            Hotline : Pengujian Kendaraan Bermotor (PKB) Dishub Kab/Kota terkait. <br>
                            Email: tricipta09@yahoo.com dan office@tricipta.com.
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <h5><b>Tentang Aplikasi</b></h5>
                        <p class="text-justify">
                            Aplikasi ini secara garis besar dibagi menjadi bidang pelayanan pendaftaran ujiyang dapat
                            dilakukan
                            secara online, bidang pelayanan uji di ruang pengujian semua prosesnya dilakukan secara
                            komputerisasi, bidang pengawasan dan monitoring kinerja pelaksanaan uji disampaikan secara
                            online
                            realtime kepada bidang terkait seperti pimpinan Dishub Kab/Kot, Bidang Pendapatan dan
                            Provinsi
                            dan
                            Kemenhub, serta pengawasan kendaraan dijalan dalam dilakukan secara online oleh petugas
                            Dallops
                            dan
                            hasil pengawasan juga sudah terintegrasi dengan Dishub Provinsi dan Kemenhub. PKB yang sudah
                            bergabung dengan clouds ini penanganan pelayanan dan monitoring dapat dilakukan secara
                            online
                            sehingga terwujud pelayanan PRAKTIS – HEMAT – HANDAL (PH2) dan sudah sesuai dengan UU Nomor
                            22
                            Tahun
                            2009 tentang Lalu Lintas dan Angkutan Jalan, PP Nomor 55 Tahun 2012 tentang Kendaraan dan PM
                            Perhubungan No. 133 Tahun 2015 tentang Pengujian Berkala Kendaraan Bermotor.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div style="background-color: #048662; color: white;">
            <div class="container justify-content-between d-flex justify-content-between">
                <div class="py-2">
                    <a class="text-reset" href="/">Beranda</a> |
                    <a class="text-reset" href="{{ route('regulation') }}">Regulasi</a> |
                    <a class="text-reset" href="{{ route('registration') }}">Pendaftaran</a> |
                    <a class="text-reset" href="{{ route('kritik') }}">Kritik dan Saran</a>
                </div>
                <div class="py-2">
                    <span>Copyright &copy; {{ date('Y') }} Clouds PKB versi 3.0.</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    @stack('addons-js')
</body>

</html>

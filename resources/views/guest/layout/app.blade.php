<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600;700;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    @stack('addons-css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="https://www.dephub.go.id/img/favicon.ico" type="image/x-icon">

    <title>@yield('title')</title>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        main {
            margin-top: 70px;
        }

        .nav-link {
            color: #273175 !important;
            font-weight: 700;
            font-size: 13pt !important;
        }

        .nav-link:hover {
            color: #F08742 !important;
        }

        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-float {
            margin-top: 16px;
        }

        .navbar-nav .nav-item {
            position: relative;
        }

        .navbar-nav .nav-item:after {
            content: '';
            display: block;
            height: 2px;
            /* ketebalan garis bawah */
            width: 0;
            background-color: #F08742;
            /* warna garis bawah */
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }

        .navbar-nav .nav-item.active:after {
            width: 90%;
        }

        .navbar-nav .nav-item.active a {
            color: #F08742 !important;
            /* warna teks ketika aktif */
        }

        .center-div {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .center-div1 {
            display: flex;
            align-items: center;
            /* justify-content: center; */
            height: 100%;
        }
    </style>
</head>

<body>
    {{-- navbar --}}
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand center-div" href="/">
                    <img src="{{ asset('landing-assets/img/dishub.png') }}" width="75"
                        class="d-inline-block align-top" alt="">
                    <span class="font-weight-bold"> UPTD PKB SRAGEN</span>
                </a> <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto text-center">
                        <li class="nav-item {{ $active == 'home' ? 'active' : '' }}">
                            <a class="nav-link" href="/">Beranda</a>
                        </li>
                        <li class="nav-item {{ $active == 'regulasi' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('regulation') }}">Regulasi</a>
                        </li>
                        <li class="nav-item {{ $active == 'pendaftaran' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('registration') }}">Pendaftaran</a>
                        </li>
                        <li class="nav-item {{ $active == 'kritik' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('kritik') }}">Kritik & Saran</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
        <a href="https://api.whatsapp.com/send?phone=+6285700767354&text=Hola" class="float" target="_blank">
            <i class="fa-brands fa-whatsapp my-float"></i>
        </a>
    </main>

    <footer>
        <div style="background-color: #001C38; color: white;">
            <div class="container">
                <div class="py-3 text-center" style="font-size: 10.7pt">
                    <span>Copyright &copy; {{ date('Y') }} CV. SOLUSI TEKNIK INDONESIA</span>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    @stack('addons-js')
</body>

</html>

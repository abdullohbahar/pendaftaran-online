<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        @yield('title') | Ekir
    </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('./dashboard-assets/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('./dashboard-assets/assets/css/components.css') }}">

    <style>
        .loaders {
            width: 48px;
            height: 48px;
            border: 5px solid #FFF;
            border-bottom-color: #FF3D00;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }

        @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    @stack('addons-css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-sm-none d-lg-inline-block">
                                <i class="fas fa-user"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">Admin</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">Ad</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="{{ $active == 'dashboard' ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>
                                <span>Dashboard</span></a></li>
                        <li class="{{ $active == 'pendaftaran' ? 'active' : '' }}"><a class="nav-link"><i
                                    class="fas fa-users"></i>
                                <span>Data Pendaftaran</span></a></li>
                        <li class="{{ $active == 'slider' ? 'active' : '' }}"><a href="{{ route('admin.slider') }}"
                                class="nav-link"><i class="far fa-square"></i>
                                <span>Slider</span></a></li>
                        <li class="{{ $active == 'regulasi' ? 'active' : '' }}"><a href="{{ route('admin.regulasi') }}"
                                class="nav-link"><i class="far fa-square"></i>
                                <span>Regulasi</span></a></li>
                        <li
                            class="nav-item dropdown {{ $active == 'product' || $active == 'product-category' ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-boxes"></i> <span>Master Data</span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ $active == 'product' ? 'active' : '' }}"><a class="nav-link"
                                        href="">Data Kuota</a></li>
                                <li class="{{ $active == 'product' ? 'active' : '' }}"><a class="nav-link"
                                        href="">Data Merek</a></li>
                            </ul>
                        </li>
                    </ul>
                </aside>
            </div>

            @yield('content')
            <footer class="main-footer">
                {{-- <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauv.al/">Muhamad
                        Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div> --}}
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('./dashboard-assets/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('./dashboard-assets/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('./dashboard-assets/assets/js/custom.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    @if (session()->has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            })
        </script>
    @endif

    @if (session()->has('warning'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'warning',
                title: '{{ session('warning') }}'
            })
        </script>
    @endif


    <!-- Page Specific JS File -->
    @stack('addons-js')
</body>

</html>

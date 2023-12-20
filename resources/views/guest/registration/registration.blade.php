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

        .custom-rounded {
            border-radius: 20px;
        }

        .card-permohonan {
            width: 100%;
        }

        .center-div {
            display: grid;
            place-items: center;
            /* Optional: Set the height to 100% of the viewport height for vertical centering */
        }

        svg {
            color: red;
        }
    </style>
@endpush

@section('content')
    <div class="container" style="margin-top: 100px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item">Pendaftaran</li>
            </ol>
        </nav>

        <h2>Pendaftaran</h2>

        <hr>
    </div>

    <div class="container" style="height: 480px;">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-9">
                <div class="row">
                    <div class="col-12">
                        <h5><b>Pilih Permohonan</b></h5>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <a href="{{ route('uji.pertama') }}"
                            class="card custom-rounded card-permohonan text-decoration-none"
                            style="background-color:#273175; color: #F08742;">
                            <div class="card-body text-center center-div">
                                <h4><b>Uji Pertama</b></h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <a href="{{ route('uji.berkala') }}"
                            class="card custom-rounded card-permohonan text-decoration-none"
                            style="background-color:#273175; color: #F08742;">
                            <div class="card-body text-center center-div">
                                <h4><b>Uji Berkala</b></h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <a href="{{ route('numpang.uji.masuk') }}"
                            class="card custom-rounded card-permohonan text-decoration-none"
                            style="background-color:#273175; color: #F08742;">
                            <div class="card-body text-center center-div">
                                <h4><b>Numpang Uji Masuk</b></h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <a href="{{ route('mutasi.masuk') }}"
                            class="card custom-rounded card-permohonan text-decoration-none"
                            style="background-color:#273175; color: #F08742;">
                            <div class="card-body text-center center-div">
                                <h4><b>Mutasi Masuk</b></h4>
                            </div>
                        </a>
                    </div>
                </div> --}}
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush font-weight-bold">
                            <a href="{{ route('uji.pertama') }}" class="text-decoration-none">
                                <li class="list-group-item border-top-0 border-left-0 border-right-0">
                                    <div class="row center-div1">
                                        <div class="col-1">
                                            <svg version="1.1" viewBox="0 0 24 24" height="40px" width="40px"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                                <title xmlns="http://www.w3.org/2000/svg">Stockholm-icons / Files /
                                                    Folder-plus</title>
                                                <desc xmlns="http://www.w3.org/2000/svg">Created with Sketch.</desc>
                                                <defs xmlns="http://www.w3.org/2000/svg"></defs>
                                                <g xmlns="http://www.w3.org/2000/svg"
                                                    id="Stockholm-icons-/-Files-/-Folder-plus" stroke="none"
                                                    stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                                        id="Combined-Shape" fill="#273175"></path>
                                                    <path
                                                        d="M11,13 L11,11 C11,10.4477153 11.4477153,10 12,10 C12.5522847,10 13,10.4477153 13,11 L13,13 L15,13 C15.5522847,13 16,13.4477153 16,14 C16,14.5522847 15.5522847,15 15,15 L13,15 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,15 L9,15 C8.44771525,15 8,14.5522847 8,14 C8,13.4477153 8.44771525,13 9,13 L11,13 Z"
                                                        id="Combined-Shape" fill="#F08742"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="col-11">
                                            UJI PERTAMA
                                        </div>
                                    </div>
                                </li>
                            </a>
                            <a href="{{ route('uji.berkala') }}" class="text-decoration-none">
                                <li class="list-group-item border-top-0 border-left-0 border-right-0">
                                    <div class="row center-div1">
                                        <div class="col-1">
                                            <svg version="1.1" viewBox="0 0 24 24" height="40px" width="40px"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                                <title xmlns="http://www.w3.org/2000/svg">Stockholm-icons / Files /
                                                    Selected-file</title>
                                                <desc xmlns="http://www.w3.org/2000/svg">Created with Sketch.</desc>
                                                <defs xmlns="http://www.w3.org/2000/svg"></defs>
                                                <g xmlns="http://www.w3.org/2000/svg"
                                                    id="Stockholm-icons-/-Files-/-Selected-file" stroke="none"
                                                    stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path
                                                        d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                        id="Combined-Shape-Copy" fill="#273175" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                        id="Combined-Shape" fill="#F08742" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="col-11">
                                            UJI BERKALA
                                        </div>
                                    </div>
                                </li>
                            </a>
                            <a href="{{ route('numpang.uji.masuk') }}" class="text-decoration-none">
                                <li class="list-group-item border-top-0 border-left-0 border-right-0">
                                    <div class="row center-div1">
                                        <div class="col-1">
                                            <svg version="1.1" viewBox="0 0 24 24" height="40px" width="40px"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                                <title xmlns="http://www.w3.org/2000/svg">Stockholm-icons / Files / Upload
                                                </title>
                                                <desc xmlns="http://www.w3.org/2000/svg">Created with Sketch.</desc>
                                                <defs xmlns="http://www.w3.org/2000/svg"></defs>
                                                <g xmlns="http://www.w3.org/2000/svg" id="Stockholm-icons-/-Files-/-Upload"
                                                    stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z"
                                                        id="Path-57" fill="#F08742" fill-rule="nonzero">
                                                    </path>
                                                    <rect id="Rectangle" fill="#273175" x="11" y="2" width="2"
                                                        height="14" rx="1"></rect>
                                                    <path
                                                        d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z"
                                                        id="Path-102" fill="#273175" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="col-11">
                                            NUMPANG UJI MASUK
                                        </div>
                                    </div>
                                </li>
                            </a>
                            <a href="{{ route('mutasi.masuk') }}" class="text-decoration-none">
                                <li class="list-group-item border-top-0 border-left-0 border-right-0">
                                    <div class="row center-div1">
                                        <div class="col-1">
                                            <svg version="1.1" viewBox="0 0 24 24" height="40px" width="40px"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                                <title xmlns="http://www.w3.org/2000/svg">Stockholm-icons / Files / Import
                                                </title>
                                                <desc xmlns="http://www.w3.org/2000/svg">Created with Sketch.</desc>
                                                <defs xmlns="http://www.w3.org/2000/svg"></defs>
                                                <g xmlns="http://www.w3.org/2000/svg"
                                                    id="Stockholm-icons-/-Files-/-Import" stroke="none" stroke-width="1"
                                                    fill="none" fill-rule="evenodd">
                                                    <rect id="bound" x="0" y="0" width="24" height="24">
                                                    </rect>
                                                    <rect id="Rectangle" fill="#273175"
                                                        transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) "
                                                        x="11" y="1" width="2" height="12" rx="1"></rect>
                                                    <path
                                                        d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                                        id="Path-103" fill="#F08742" fill-rule="nonzero"></path>
                                                    <path
                                                        d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z"
                                                        id="Path-104" fill="#273175" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="col-11">
                                            MUTASI MASUK
                                        </div>
                                    </div>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-12 col-md-7 mt-5">
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
            </div> --}}
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

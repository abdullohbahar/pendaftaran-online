@extends('guest.layout.app')

@section('title')
    Sistem Pengujian Kendaraan Bermotor Online
@endsection

@push('addons-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .image-owlcarousel {
            margin: auto;
            width: 180px !important;
            height: 200px;
            object-fit: contain;
        }

        .btn-blue {
            background-color: #00197b;
            color: white;
            height: 3rem;
        }

        .btn-blue:hover {
            color: #F08742;
        }

        .center-div {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
    </style>
@endpush

@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"
        style="background-color: rgb(237, 235, 235); margin-top: 85px;">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset($slider->gambar) }}" style="object-fit:contain;" class="d-block w-100"
                        alt="...">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 text-center" style="color: #00197b">
                <h3>DAFTAR UJI KENDARAAN BERMOTOR ONLINE</h3>
                <h6>"Mari daftar uji berkala kendaraan secara online"</h6>
                <div class="row mt-3">
                    <div class="col-sm-12 col-md-4">
                        <a href="{{ route('cek.kendaraan') }}" class="btn btn-blue btn-block rounded-pill mt-2">
                            <div class="center-div">
                                <i class="fa-solid fa-magnifying-glass mr-2"></i> Cek Kendaraan
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <a href="{{ route('registration') }}" class="btn btn-blue btn-block rounded-pill mt-2">
                            <div class="center-div">
                                <i class="fa-regular fa-pen-to-square mr-2"></i> Pendaftaran
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <a href="{{ route('cek.pendaftaran') }}" class="btn btn-blue btn-block rounded-pill mt-2">
                            <div class="center-div">
                                <i class="fa-solid fa-magnifying-glass mr-2"></i> Cek Pendaftaran
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <hr>
                <h5 class="text-center" style="color: #273175;"><b>SOP NGEKIRONLINE</b></h5>
                <hr>
                <img src="{{ asset('./landing-assets/img/sop.png') }}" class="w-100" alt="" srcset="">
            </div>
            <div class="col-12">
                <hr>
                <h5 class="text-center"><b>GRAFIK PENDAFTARAN TAHUN 2023</b></h5>
                <hr>
                <div id="grafiktahun" class="" style="width: 100%; height:280px;"></div>
            </div>
            {{-- <div class="col-12">
                <hr>
                <h5 class="text-center"><b>GRAFIK PENDAFTARAN TANGGAL 2023-11-23 s/d 2023-11-29</b></h5>
                <hr>
                <div id="graph" class="" style="width: 100%; height:280px;"></div>
            </div> --}}
        </div>
    </div>
@endsection

@push('addons-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true, // Enable loop mode
                autoplay: false, // Enable autoplay
                autoplayTimeout: 2000, // Autoplay interval in milliseconds
                autoplayHoverPause: true, // Pause autoplay on hover
                responsive: {
                    0: {
                        items: 1 // Jumlah item pada lebar kurang dari 600 pixel
                    },
                    480: {
                        items: 1 // Jumlah item pada lebar 600 pixel atau lebih
                    },
                    768: {
                        items: 3
                    }
                }
            });
        });
    </script>

    <script>
        $(function() {
            $('#grafiktahun').highcharts({

                title: {
                    text: ""
                },

                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt',
                        'Nov', 'Dec'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Pendaftaran Pertahun'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b> {point.y:1f} Pendaftaran</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Pendaftaran',
                    data: {{ $dataPendaftarTahunan }},
                    color: "#2c5957",

                }],
                credits: "disabled"
            });
        });
    </script>
    {{-- <script>
        $(function() {
            $('#graph').highcharts({

                title: {
                    text: ""
                },

                xAxis: {
                    categories: ["2023-11-22", "2023-11-23", "2023-11-24", "2023-11-25", "2023-11-26",
                        "2023-11-27", "2023-11-28", "2023-11-29"
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Pendaftaran PKB'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b> {point.y:1f} Kendaraan</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                        name: 'Penumpang',
                        data: [45, 39, 39, 6, 0, 54, 79, 44],
                        color: "#2c5957",

                    },
                    {
                        name: 'Barang',
                        data: [409, 492, 809, 121, 1, 821, 807, 644],
                        color: "#a1fb12",

                    }
                ],
                credits: "disabled"
            });
        });
    </script> --}}
@endpush

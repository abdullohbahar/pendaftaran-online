@extends('admin.layout.app')

@section('title')
    Admin Dashboard
@endsection

@push('addons-css')
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @php
                                    \Carbon\Carbon::setLocale('id');
                                @endphp
                                <h4>Grafik Pendaftaran Harian, Bulan
                                    @php
                                        $date = $year . '-' . $month;
                                    @endphp
                                    {{ \Carbon\Carbon::parse($date)->translatedFormat('F Y') }}
                                </h4>
                            </div>
                            <div class="card-body">
                                <div id="grafikHarian" class="" style="width: 100%; height:280px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Grafik Pendaftaran Tahun {{ $year }}</h4>
                            </div>
                            <div class="card-body">
                                <div id="grafikBulanan" class="" style="width: 100%; height:280px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Grafik Pendaftaran per Tahun</h4>
                            </div>
                            <div class="card-body">
                                <div id="grafikTahunan" class="" style="width: 100%; height:280px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('addons-js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script>
        $(function() {
            $('#grafikBulanan').highcharts({

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
                        text: 'Jumlah Pendaftaran Perbulan'
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
                    data: {{ $dataPendaftarBulanan }},
                    color: "#2c5957",

                }],
                credits: "disabled"
            });
        });
    </script>
    <script>
        $(function() {
            var categories = <?php echo $datapendaftarHarianCategories; ?>;
            var pendaftaranData = <?php echo $pendaftaranHarian; ?>;

            $('#grafikHarian').highcharts({
                title: {
                    text: ""
                },
                xAxis: {
                    categories: categories,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Pendaftaran Perbulan'
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
                    data: pendaftaranData,
                    color: "#2c5957",
                }],
                credits: {
                    enabled: false
                }
            });
        });
    </script>

    <script>
        $(function() {
            var data = <?php echo $dataPendaftarTahunan; ?>;

            $('#grafikTahunan').highcharts({
                title: {
                    text: ""
                },
                xAxis: {
                    categories: data.map(item => item.tahun_pendaftaran),
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Pendaftaran Perbulan'
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
                    data: data.map(item => item.total_pendaftar),
                    color: "#2c5957",
                }],
                credits: {
                    enabled: false
                }
            });
        });
    </script>
@endpush

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
                            <div class="card-body">
                                <table style="font-size: 14pt">
                                    <tr>
                                        <td>Pengunjung Hari Ini</td>
                                        <td>:</td>
                                        {{-- <td>{{ $todayVisitor }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td>Total Pengunjung</td>
                                        <td>:</td>
                                        {{-- <td>{{ $totalVisitor }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td>Pengunjung Online</td>
                                        <td>:</td>
                                        {{-- <td>{{ $onlineVisitor }}</td> --}}
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('addons-js')
@endpush

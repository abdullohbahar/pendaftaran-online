@extends('admin.layout.app')

@section('title')
    Regulasi
@endsection

@push('addons-css')
    <link rel="stylesheet"
        href="{{ asset('./dashboard-assets/library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('./dashboard-assets/library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Regulasi</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row justify-content-end">
                                    <div class="col-12 text-end">
                                        <a href="{{ route('admin.tambah.regulasi') }}" class="btn btn-success">Tambah
                                            Regulasi</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered table-striped" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Dokumen</th>
                                                    <th>Tahun Terbit</th>
                                                    <th>Jenis</th>
                                                    <th>File</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($regulasi as $regulasi)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>
                                                            {{ $regulasi->nama_dokumen }}
                                                        </td>
                                                        <td>
                                                            {{ $regulasi->tahun_terbit }}
                                                        </td>
                                                        <td>
                                                            {{ $regulasi->jenis }}
                                                        </td>
                                                        <td>
                                                            <a target="_blank" href="{{ asset($regulasi->file) }}"
                                                                class="btn btn-primary">Lihat File</a>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a href="{{ route('admin.ubah.regulasi', $regulasi->id) }}"
                                                                    type="button" class="btn btn-warning">Ubah</a>
                                                                <button class="btn btn-danger" id="removeBtn"
                                                                    data-id="{{ $regulasi->id }}">Hapus</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('addons-js')
    <!-- JS Libraies -->
    <script src="{{ asset('./dashboard-assets/library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('./dashboard-assets/library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('./dashboard-assets/library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('./dashboard-assets/assets/js/page/modules-datatables.js') }}"></script>

    <script>
        $("#table1").dataTable({
            columnDefs: [{
                sortable: false,
                targets: [3]
            }],
        });

        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });

        $("body").on("click", "#removeBtn", function() {
            var id = $(this).data("id");

            console.log(id)

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/regulasi/hapus/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.code == 200) {
                                Swal.fire(
                                    'Berhasil!',
                                    response.message,
                                    'success'
                                ).then(() => {
                                    location
                                        .reload(); // Refresh halaman setelah mengklik OK
                                });
                            } else if (response.code == 500) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: response.message,
                                })
                            }
                        }
                    })
                }
            })
        })
    </script>
@endpush

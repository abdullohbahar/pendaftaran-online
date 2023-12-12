@extends('admin.layout.app')

@section('title')
    Pendaftaran
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
                <h1>Pendaftaran</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered table-striped" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Pendaftaran</th>
                                                    <th>Nama Pemohon</th>
                                                    <th>Nama Pemilik</th>
                                                    <th>No Kendaraan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
        $("#table1").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            ajax: {
                url: "{!! url()->current() !!}",
            },
            columns: [{
                    title: "No",
                    data: null,
                    searchable: false,
                    orderable: false,
                    width: "50px",
                    className: "text-center border-bottom",
                    render: (data, type, row, meta) => {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "tglpendaftaran",
                    name: "tglpendaftaran",
                },
                {
                    data: "namapemohon",
                    name: "namapemohon",
                },
                {
                    data: "nama_pemilik",
                    name: "nama_pemilik",
                },
                {
                    data: "noregistrasikendaraan",
                    name: "noregistrasikendaraan",
                },
                {
                    data: "action",
                    name: "action",
                },
            ],
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
                        url: '/admin/kuota/hapus/' + id,
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

@extends('admin.layout.app')

@section('title')
    Tambah Regulasi
@endsection

@push('addons-css')
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Regulasi</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.simpan.regulasi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="">Nama Dokumen</label>
                                        <input type="text" class="form-control" name="nama_dokumen" id=""
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="">Tahun Terbit</label>
                                        <input type="number" class="form-control" name="tahun_terbit" id=""
                                            required maxlength="4" oninput="this.value=this.value.slice(0,this.maxLength)">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="">Jenis</label>
                                        <input type="text" class="form-control" name="jenis" id="" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label>File</label>
                                        <input type="file" name="file"
                                            class="form-control @error('file') is-invalid @enderror" id="fileUpload"
                                            required>
                                        @error('file')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success btn-block">Simpan Regulasi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('addons-js')
    <script>
        fileUpload.onchange = (evt) => {
            const [file] = fileUpload.files;
            if (file) {
                // Batasan ukuran file (2MB)
                const maxSizeInBytes = 2 * 1024 * 1024; // 2MB
                if (file.size <= maxSizeInBytes) {
                    // Batasan jenis file (PNG, JPG, JPEG)
                    const allowedExtensions = ["pdf", "PDF"];
                    const fileExtension = file.name.split(".").pop().toLowerCase();

                    if (allowedExtensions.includes(fileExtension)) {
                        // Baca dimensi gambar
                        const img = new Image();
                        img.src = URL.createObjectURL(file);
                    } else {
                        alert(
                            "Jenis file yang diunggah tidak diizinkan. Harap pilih file dengan format PDF"
                        );
                        fileUpload.value = null; // Menghapus file yang dipilih
                    }
                } else {
                    alert("Ukuran file terlalu besar. Harap pilih file dengan ukuran maksimal 2MB.");
                    fileUpload.value = null; // Menghapus file yang dipilih
                }
            }
        };
    </script>
@endpush

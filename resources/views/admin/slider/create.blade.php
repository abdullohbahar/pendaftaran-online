@extends('admin.layout.app')

@section('title')
    Tambah Slider
@endsection

@push('addons-css')
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Slider</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.simpan.slider') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <img src="" alt="" id="imagePreview" style="object-fit: contain;">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5">
                                    <div class="form-group">
                                        <label>Gambar Slider</label>
                                        <input type="file" name="gambar"
                                            class="form-control @error('gambar') is-invalid @enderror" id="imageUpload"
                                            required>
                                        @error('gambar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success btn-block">Simpan Slider</button>
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
        imageUpload.onchange = (evt) => {
            const [file] = imageUpload.files;
            if (file) {
                // Batasan ukuran file (2MB)
                const maxSizeInBytes = 2 * 1024 * 1024; // 2MB
                if (file.size <= maxSizeInBytes) {
                    // Batasan jenis file (PNG, JPG, JPEG)
                    const allowedExtensions = ["png", "jpg", "jpeg", "webp"];
                    const fileExtension = file.name.split(".").pop().toLowerCase();

                    if (allowedExtensions.includes(fileExtension)) {
                        // Baca dimensi gambar
                        const img = new Image();
                        img.src = URL.createObjectURL(file);
                        // Setelah gambar selesai dimuat
                        img.onload = function() {
                            // Menetapkan width dan height pada imagePreview
                            $(imagePreview).width(400);
                            $(imagePreview).height(480);

                            // Menetapkan src pada imagePreview setelah dimensi ditetapkan
                            imagePreview.src = URL.createObjectURL(file);
                        };
                    } else {
                        alert(
                            "Jenis file yang diunggah tidak diizinkan. Harap pilih file dengan format PNG, JPG, atau JPEG."
                        );
                        imageUpload.value = null; // Menghapus file yang dipilih
                    }
                } else {
                    alert("Ukuran file terlalu besar. Harap pilih file dengan ukuran maksimal 2MB.");
                    imageUpload.value = null; // Menghapus file yang dipilih
                }
            }
        };
    </script>
@endpush

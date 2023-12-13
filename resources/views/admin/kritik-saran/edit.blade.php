@extends('admin.layout.app')

@section('title')
    Edit Regulasi
@endsection

@push('addons-css')
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Regulasi</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update.merek', $merek->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label for="">Merek</label>
                                        <input type="text" class="form-control @error('merek') is-invalid @enderror"
                                            value="{{ old('merek', $merek->id) }}" name="merek" id="" required>
                                        @error('merek')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input type="hidden" name="old_merek" value="{{ $merek->merek }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success btn-block">Edit Regulasi</button>
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

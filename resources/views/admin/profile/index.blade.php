@extends('admin.layout.app')

@section('title')
    Admin Ubah Profile
@endsection

@push('addons-css')
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Ubah Profile</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('update.profile', auth()->user()->id) }}" method="POST"
                                    autocomplete="off">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input type="text" name="username" required class="form-control"
                                                    value="{{ auth()->user()->username }}" autocomplete="off"
                                                    id="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="password">Password <small style="color: red">Kosongi Jika Tidak
                                                        Ingin Mengubah
                                                        Password</small></label>
                                                <input type="password" name="password" class="form-control" id="password"
                                                    autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success" style="width: 100%">Ubah
                                                Profile</button>
                                        </div>
                                    </div>
                                </form>
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

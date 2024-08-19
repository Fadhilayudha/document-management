@extends('layout.dashboard')
@section('title', 'Tambah Akun')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Form Tambah Akun</h1>
        </div>
        @if (session('err'))
            <div class="alert alert-danger">
                {{ session('err') }}
            </div>
        @endif
        <div class="section-body">
            <div class="card">
                <form action="{{ route('user.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>NPWP<span class="text-danger">*</span></label>
                                <input type="text" name="npwp" class="form-control" required pattern="\d{12}">
                                <div class="invalid-feedback">
                                    Silahkan isi NPWP yang valid (12 digit angka).
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Nama<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required>
                                <div class="invalid-feedback">
                                    Silahkan isi nama.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" required>
                                <div class="invalid-feedback">
                                    Silahkan isi password.
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Alamat<span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" required>
                                <div class="invalid-feedback">
                                    Silahkan isi alamat.
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Type<span class="text-danger">*</span></label>
                                <select class="form-control" name="user_type" required>
                                    <option disabled selected>Pilih Type</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan pilih type.
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('user') }}" class="btn btn-warning">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

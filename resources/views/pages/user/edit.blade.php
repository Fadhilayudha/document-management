@extends('layout.dashboard')
@section('title', 'Edit Akun')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Form Edit Akun</h1>
        </div>
        @if (session('err'))
            <div class="alert alert-danger">
                <b>Error: </b>{{ session('err') }}
            </div>
        @endif
        <div class="section-body">
            <div class="card">
                <form action="{{ route('user.update', $user->id) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>NPWP<span class="text-danger">*</span></label>
                                <input type="text" name="npwp" class="form-control"
                                    value="{{ old('npwp', $user->npwp) }}">
                                <div class="invalid-feedback">
                                    Silahkan isi NPWP yang valid (12 digit angka).
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Nama<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required>
                                <div class="invalid-feedback">
                                    Silahkan isi nama.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Password<span class="text-danger">*</span> (Kosongkan jika tidak diubah)</label>
                                <input type="password" name="password" class="form-control">
                                <div class="invalid-feedback">
                                    Silahkan isi password.
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Alamat<span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ old('address', $user->address) }}" required>
                                <div class="invalid-feedback">
                                    Silahkan isi alamat.
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Type<span class="text-danger">*</span></label>
                                <select class="form-control" name="user_type" required>
                                    <option disabled>Pilih Type</option>
                                    <option value="user"
                                        {{ old('user_type', $user->user_type) == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin"
                                        {{ old('user_type', $user->user_type) == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan pilih type.
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('user') }}" class="btn btn-warning">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

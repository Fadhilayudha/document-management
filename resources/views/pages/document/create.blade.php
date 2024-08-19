@extends('layout.dashboard')
@section('title', 'Tambah Dokumen')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Form Tambah Dokumen</h1>
        </div>
        @if (session('err'))
            <div class="alert alert-danger">
                {{ session('err') }}
            </div>
        @endif
        <div class="section-body">
            <div class="card">
                <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Nama<span class="text-danger">*</span></label>
                                <select name="user_id" class="form-control" required>
                                    <option disabled selected>Pilih Nama</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Upload Zip<span class="text-danger">*</span></label>
                                <input type="file" class="dropify" name="file_zip" data-allowed-file-extensions="zip" required />
                                <div class="invalid-feedback">
                                    Silahkan upload file Zip.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Upload Excel<span class="text-danger">*</span></label>
                                <input type="file" class="dropify" name="file_excel" data-allowed-file-extensions="xlx xlsx" required />
                                <div class="invalid-feedback">
                                    Silahkan upload file Excel.
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('document') }}" class="btn btn-warning">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

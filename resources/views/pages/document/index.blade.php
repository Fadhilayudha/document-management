@extends('layout.dashboard')
@section('title', 'Dashboard')
@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>List document</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tabel Dokumen</h2>
            @if (auth()->check() && auth()->user()->user_type === 'admin')
                <div class="buttons">
                    <a href="{{ route('document.create') }}" class="btn btn-icon btn-primary mb-4">Tambah Dokumen<i
                            class="fas fa-plus pl-2"></i></a>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <b>Success:</b>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card shadow-sm ">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>#</th>
                                    <th>NPWP</th>
                                    <th>Nama</th>
                                    <th>Dokumen</th>
                                    <th>Unduh</th>
                                </tr>
                                {{-- @foreach ($documents as $index => $doc)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $doc->npwp }}</td>
                                        <td>{{ $doc->user->name }}</td>
                                        <td>{{ $doc->file_name }}</td>
                                        <td>
                                            <a href="{{ route('document.download', $doc->id) }}"
                                                class="btn btn-danger">Unduh PDF</a>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

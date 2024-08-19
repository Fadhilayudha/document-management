@extends('layout.dashboard')
@section('title', 'Akun User')
@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>List Akun</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tabel Akun</h2>
            <div class="buttons">
                <a href="{{ route('user.create') }}" class="btn btn-icon btn-primary mb-4">Tambah Akun<i
                        class="fas fa-plus pl-2"></i></a>
            </div>
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
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($Accounts as $index => $acc)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $acc->npwp }}</td>
                                        <td>{{ $acc->name }}</td>
                                        <td>{{ $acc->address }}</td>
                                        @if ($acc->user_type == ('admin'))
                                            <td>
                                                <div class="badge badge-danger">Admin</div>
                                            </td>
                                        @else
                                            <td>
                                                <div class="badge badge-warning">User</div>
                                            </td>
                                        @endif
                                        <td>
                                            <form method="post" action="{{ route('user.delete', $acc->id) }}">
                                                <a href="{{ route('user.edit', $acc->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                @method('DELETE')
                                                @csrf
                                                @if (Auth::user()->id != $acc->id)
                                                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus akun ini?')">Delete</button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

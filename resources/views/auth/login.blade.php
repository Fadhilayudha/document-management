@extends('layout.login')
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Login</h3>
                        <form action="{{ route('auth.login') }}" method="POST" class="login-form"> 
                            @csrf
                            @if (session('err'))
                                <div class="alert alert-danger">
                                    <b>Error:</b>
                                    {{ session('err') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <input name="npwp" type="text" class="form-control rounded-left"
                                    placeholder="Masukkan NPWP" required>
                            </div>
                            <div class="form-group d-flex">
                                <input name="password" type="password" class="form-control rounded-left"
                                    placeholder="Masukan Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

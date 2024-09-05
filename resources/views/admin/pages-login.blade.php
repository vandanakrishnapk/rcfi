@extends('layouts.master-without-nav')

@section('title') Login @endsection

@section('body') <body> @endsection

@section('content')
<div class="home-btn d-none d-sm-block">
    <a href="index" class="text-dark"><i class="fas fa-home h2"></i></a>
</div>

<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card overflow-hidden">
                    <div class="hh">
                        <div class="text-primary text-center p-4">
                            <h5 class="text-white font-size-20">Admin Login</h5>
                            <p class="text-white-50">Sign in to continue to Admin dashboard</p>
                            <a href="index" class="logo logo-admin">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjXGugPZ8GDVwlB7BkMUCHcO_lXL8qwSXhdmPdJEVSmYIygYl3UgffAm12sVE0ttk8r4o&usqp=CAU" height="50px" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="p-3">
                            <form class="mt-5" action="{{ route('do.admin_login') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label" for="username">Email ID</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="username" placeholder="Enter username" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" placeholder="Enter password" name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-5 row d-flex flex-row">
                                    <div class="col-sm-7">
                                        <a href="{{ route('forgot_password') }}" class="forgot"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                    <div class="col-sm-5 text-end">
                                        <button class="but btn w-md waves-effect text-light" type="submit">Log In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>             
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/app.js') }}"></script>
@endpush

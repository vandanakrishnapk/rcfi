@extends('layouts.master-without-nav')

@section('title') Change Password @endsection

@section('css')
<link href="{{ asset('assets/libs/chartist/chartist.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('style.css') }}">
@endsection

@section('body') 
<body> 
@endsection

@section('content')
<div class="home-btn d-none d-sm-block">
    <a href="index" class="text-dark"><i class="fas fa-home h2"></i></a>
</div>
<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
               <div class="card overflow-hidden">
                    <div class="box">
                        <div class="text-primary text-center p-4">
                            <h5 class="text-white font-size-20 p-2">Change Password</h5>
                            <a href="index" class="logo logo-admin">
                                <img src="https://cdn-icons-png.flaticon.com/512/9187/9187604.png" height="60" alt="logo">
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('submitResetPasswordForm') }}" method="POST" class="p-4">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}" class="form-control">

                        <div class="form-group mt-5">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary mt-3" style="margin-left:100px;">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection

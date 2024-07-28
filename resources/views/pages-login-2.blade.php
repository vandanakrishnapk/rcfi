@extends('layouts.master-without-nav')
@section('title') Login 2 @endsection
@section('body') <body class="account-pages"> @endsection
@section('content')

    <!-- Begin page -->
    <div class="accountbg" style="background: url('assets/images/bg.jpg');background-size: cover;background-position: center;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card shadow-none">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box shadow-none p-4">
                        <div class="p-2">
                            <div class="text-center mt-4">
                                <a href="index" class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="17">
                                    </span>
                                </a>

                                <a href="index" class="logo logo-light">
                                    <span class="logo-lg">
                                        <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="18">
                                    </span>
                                </a>
                            </div>

                            <h4 class="font-size-18 mt-5 text-center">Welcome Back !</h4>
                            <p class="text-muted text-center">Sign in to continue to Veltrix.</p>

                            <form class="mt-4" action="#">

                                <div class="mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter username">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlInline">
                                            <label class="form-check-label" for="customControlInline">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>

                                <div class="mb-3 mt-2 mb-0 row">
                                    <div class="col-12 mt-3">
                                        <a href="pages-recoverpw-2"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                </div>

                            </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>Don't have an account ? <a href="pages-register-2" class="fw-medium text-primary"> Signup now </a> </p>
                                <p>© <script>
                                        document.write(new Date().getFullYear())

                                    </script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection

@extends('layouts.master-without-nav')

@section('title') Recover Password @endsection

@section('css')
<link href="{{ asset('assets/libs/chartist/chartist.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
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
                            <h5 class="text-white font-size-20 p-2">Reset Password</h5>
                            <a href="index" class="logo logo-admin">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjXGugPZ8GDVwlB7BkMUCHcO_lXL8qwSXhdmPdJEVSmYIygYl3UgffAm12sVE0ttk8r4o&usqp=CAU" height="50px" alt="logo">
                            </a>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="p-3">
                            <div class="alert alert-success mt-5" role="alert">
                                Enter your email and instructions will be sent to you!
                            </div>

                            <form class="mt-4" action="{{ route('submitForgetPasswordForm') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="useremail">Email</label>
                                    <input type="email" class="form-control" id="useremail" placeholder="Enter email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="row mb-0">
                                    <div class="col-12 text-end">
                                        <button class="but btn w-md waves-effect waves-light text-light" type="submit">Reset</button>
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

@extends('user.template.master')
@section('content')
@section('css')
<link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
<!-- Icons Css -->
<link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
<!-- App Css-->
<link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/libs/chartist/chartist.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<!-- Bootstrap Css -->
@endsection

<div class="row mt-4">
    <div class="float-start">
        <a href="{{ route('user.userProject')}}" class="btn pro btn-sm rounded-circle mb-3"><i class="bi bi-box-arrow-in-left fs-4 ms-1"></i></a>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body widgetcolor rounded">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4 fs-2">
                        <i class="bi bi-book-half"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Education Centre</h5>
                    <h4 class="fw-medium font-size-24">{{ $Education }}</i></h4>
                   
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.education')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                   <a href=""> <p class="text-white-50 mb-0 mt-1">View Applications</p></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body widgetcolor rounded">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <i class="bi bi-brilliance fs-2"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Cultural Centre</h5>
                    <h4 class="fw-medium font-size-24">{{ $culturalCount }}</h4>
                
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.cultural')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body widgetcolor rounded">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">   
                        <i class="bi bi-hospital fs-2"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Hospitals or Clinics</h5>
                    <h4 class="fw-medium font-size-24">{{ $medical }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.hospital') }}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body widgetcolor rounded">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">   
                        <i class="bi bi-water fs-2"></i>
                    </div>
                    <h5 class="text-uppercase text-white w-100" style="font-size: 12px;">Drinking Water-<span class="text-capitalize">Group level</span></h5>
                    <h4 class="fw-medium font-size-24">#</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="#" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body widgetcolor rounded">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">   
                        <i class="bi bi-building-fill-add fs-2"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Shops and Other</h5>
                    <h4 class="fw-medium font-size-24">{{ $shops }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.shops') }}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body widgetcolor rounded">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">   
                        <i class="bi bi-shop-window fs-2"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">House</h5>
                    <h4 class="fw-medium font-size-24">{{ $house }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.house') }}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div>





</div>
@endsection









@section('scripts')

<!-- Peity chart-->
<script src="{{ asset('assets/libs/peity/peity.min.js') }}"></script>

<!-- Plugin Js-->
<script src="{{ asset('assets/libs/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltips.min.js') }}"></script>

<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>


@endsection
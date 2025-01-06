@extends('layouts.master')
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
@section('body') <body data-sidebar="light" data-sidebar-size="small"> @endsection
    @section('content')

    <div class="row mt-4">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat text-white box1">
                <div class="card-body box1">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <i class="bi bi-people-fill fs-2"></i>
                        </div>
                        <h5 class="fs-6 text-white">USERS</h5>
                        <h4 class="fw-medium font-size-24">{{ $user}}</h4>
                    
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="{{ url('/admin/dataTable') }}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
    
                        <p class="text-white-50 mb-0 mt-1">View Users</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat text-white">
                <div class="card-body box1">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4 fs-2">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="fs-6 text-uppercase text-white">DONORS</h5>
                        <h4 class="fw-medium font-size-24">{{ $donor }}</i></h4>
                       
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="{{ url('/admin/donorView')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
    
                       <a href=""> <p class="text-white-50 mb-0 mt-1">View Donors</p></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat text-white">
                <div class="card-body box1">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <i class="bi bi-file-earmark-medical-fill fs-3"></i>
                        </div>
                        <h5 class="fs-6 text-uppercase text-white">APPLICATIONS</h5>
                        <h4 class="fw-medium font-size-24">{{ $applications }}</h4>
                    
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="{{ url('/admin/application/view') }}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
    
                        <p class="text-white-50 mb-0 mt-1">View Applications</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat text-white">
                <div class="card-body box1">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">   
                            <i class="bi bi-folder-fill"></i>
                        </div>
                        <h5 class="fs-6 text-uppercase text-white">PROJECTS</h5>
                        <h4 class="fw-medium font-size-24">{{ $pro }}</h4>
                        
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="{{ url('/admin/projects/view') }}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
    
                        <p class="text-white-50 mb-0 mt-1">View Projects</p>
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
   

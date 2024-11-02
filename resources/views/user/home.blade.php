@extends('user.template.master')

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
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body box rounded">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <i class="bi bi-file-earmark-medical-fill fs-3"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">APPLICATIONS</h5>
                    <h4 class="fw-medium font-size-24">{{ $applications }}</h4>
                
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ url('/user/application/view') }}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body box rounded">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">   
                        <i class="bi bi-folder-fill"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">PROJECTS</h5>
                    <h4 class="fw-medium font-size-24">{{ $pro }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ url('/user/projects/view') }}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Projects</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end row -->

    <!-- end row -->


    <!-- end row -->


    <!-- end row -->

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
   

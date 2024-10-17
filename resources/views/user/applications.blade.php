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
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat text-white box">
            <div class="card-body box rounded">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <i class="fa fa-handshake-o fa-2x" aria-hidden="true"></i>
                    </div>
                    <h5 class="fs-6 text-white">MARKAZ ORPHAN CARE</h5>
                    <h4 class="fw-medium font-size-24">{{ $markazCount }}</h4>
                
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.getMarkazOrphanCare')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
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
                    <div class="float-start mini-stat-img me-4 fs-2">
                        <i class="bi bi-book-half"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Education Centre</h5>
                    <h4 class="fw-medium font-size-24">{{ $eduCount }}</i></h4>
                   
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.getEducationCenterApplication')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                   <a href=""> <p class="text-white-50 mb-0 mt-1">View Applications</p></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body box rounded">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <i class="bi bi-brilliance fs-2"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Cultural Centre</h5>
                    <h4 class="fw-medium font-size-24">{{ $culturalCount }}</h4>
                
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.getCulturalCenterApp')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
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
                        <i class="bi bi-droplet-half fs-2"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Sweet Water Project</h5>
                    <h4 class="fw-medium font-size-24">{{ $sweetCount }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.getSweetWaterProject')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
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
   

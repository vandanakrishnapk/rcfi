@extends('user.template.master')
@section('css')
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
<!-- Icons Css -->
<link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
<!-- App Css-->
<link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/libs/chartist/chartist.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<!-- Bootstrap Css -->
@endsection

@section('content')  
<div class="row mt-4">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat text-white widgetcolor">
            <div class="card-body widgetcolor rounded">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
 
                        <i class="bi bi-buildings-fill fa-2x"></i>
                    </div>
                    <h5 class="fs-6 text-white">CONSTRUCTION PROJECT</h5>
                    <h4 class="fw-medium font-size-24">6</h4>
                
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.getProConstruction') }}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
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
                        <i class="bi bi-droplet-half fs-2"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Sweet Water Project</h5>
                    <h4 class="fw-medium font-size-24">{{ $sweetCount }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.sweet')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat text-white widgetcolor">
            <div class="card-body widgetcolor rounded">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <i class="fa fa-handshake-o fa-2x" aria-hidden="true"></i>
                    </div>
                    <h5 class="fs-6 text-white">ORPHAN CARE</h5>
                    <h4 class="fw-medium font-size-24">{{ $markazCount }}</h4>
                
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.orphancare')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
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
                     
                        <i class="bi bi-person-wheelchair fs-2"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Differently Abled</h5>
                    <h4 class="fw-medium font-size-24">{{ $diffCount }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.diffabled')}} " class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
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
                        <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Family aid</h5>
                    <h4 class="fw-medium font-size-24">{{ $famCount }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.familyaid') }}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
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
                        <i class="bi bi-file-earmark-ruled-fill fs-2"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">General Project</h5>
                    <h4 class="fw-medium font-size-24">{{ $general }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('user.general')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
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
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>
@endpush

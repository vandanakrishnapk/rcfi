@extends('layouts.master')
@section('content')
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
                        <a href="{{ route('admin.getMarkazOrphanCare')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
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
                        <a href="{{ route('admin.getEducationCenterApplication')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
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
                        <a href="{{ route('admin.getCulturalCenterApp')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
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
                        <a href="{{ route('admin.getSweetWaterProject')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
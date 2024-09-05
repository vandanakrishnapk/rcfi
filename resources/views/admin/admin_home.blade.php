@extends('layouts.master')
@section('title') Compact Sidebar @endsection
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
    @component('components.breadcrumb')
    @slot('page_title') RCFI @endslot
    @slot('subtitle')Admin Dashboard @endslot
    @endcomponent 
    <div class="row">
    <div class="float-end d-none d-md-block">
                <button type="button" class="btn box mb-2 float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add user
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header box">
                                <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">User Registration</h1>
                                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="submitApplication">
                                    @csrf 
                                    <div id="formErrors" class="alert alert-danger d-none"></div> <!-- Error container -->
                                    
                                    <br><label for="name">Name</label>
                                    <input type="text" name="name" id="name" placeholder="name" class="form-control">
                                    <span class="error name_error text-danger"></span>
                                    
                                    <br><label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="email" class="form-control">
                                    <span class="error email_error text-danger"></span>
                                    
                                    <br><label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" placeholder="mobile" class="form-control">
                                    <span class="error mobile_error text-danger"></span>
                                    
                                    <br><label for="designation">Designation</label>
                                    <input type="text" name="designation" id="designation" placeholder="designation" class="form-control">
                                    <span class="error designation_error text-danger"></span>
                                    
                                    <br><label for="password">Password</label>
                                    <input type="password" name="password" id="password" placeholder="password" class="form-control">
                                    <span class="error password_error text-danger"></span>
                                    
                                    <br>
                                    <div class="modal-footer">        
                                        <button type="submit" class="box btn submit-application">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat text-white box">
                <div class="card-body box rounded">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/images/services-icon/01.png')}}" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Orders</h5>
                        <h4 class="fw-medium font-size-24">1,685 <i class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                        <div class="mini-stat-label bg-success">
                            <p class="mb-0">+ 12%</p>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Since last month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body box rounded">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/images/services-icon/02.png')}}" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Revenue</h5>
                        <h4 class="fw-medium font-size-24">52,368 <i class="mdi mdi-arrow-down text-danger ms-2"></i></h4>
                        <div class="mini-stat-label bg-danger">
                            <p class="mb-0">- 28%</p>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                       <a href="{{ route('data_table') }}"> <p class="text-white-50 mb-0 mt-1">Since last month</p></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body box rounded">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/images/services-icon/03.png')}}" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Average Price</h5>
                        <h4 class="fw-medium font-size-24">15.8 <i class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                        <div class="mini-stat-label bg-info">
                            <p class="mb-0"> 00%</p>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Since last month</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body box rounded">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{ asset('assets/images/services-icon/04.png')}}" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Product Sold</h5>
                        <h4 class="fw-medium font-size-24">2436 <i class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                        <div class="mini-stat-label bg-warning">
                            <p class="mb-0">+ 84%</p>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">Since last month</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

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
   

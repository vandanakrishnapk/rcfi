@extends('layouts.master')
@section('content')
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
@endsection



@section('content')




<div class="row mt-3">
    <div class="col-12">
        <div class="float-start">
            <a href="{{ route('admin.getApplications')}}" class="btn btn-success btn-sm rounded-circle"><i class="bi bi-box-arrow-in-left fs-4 ms-1"></i></a>
        </div>
        <div class="float-end d-none d-md-block">
            <button type="button" class="btn btn-success mb-1 me-3 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#shopModal">
                <i class="bi bi-person-plus-fill fs-5"></i>
            </button>
        </div>
    </div>
            <div class="row">
                <div class="col-12">
        
          
        <div class="modal fade" id="shopModal" tabindex="-1" aria-labelledby="shopModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header box">
                        <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">shop Project Welfare Application</h1>
                        <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
               <div class="modal-body p-4 shopModalBody">


    <h4 style="margin-left: 200px">Applicant/Committee Description Form</h4>
    <form>
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="applicantName">Name of Applicant:</label>
                    <input type="text" name="applicantName" class="form-control" id="applicantName" required>
                    <span id="applicantNameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="committeeName">Name of Committee:</label>
                    <input type="text" name="committeeName" class="form-control" id="committeeName" required>
                    <span id="committeeNameError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="registerNumber">Register Number:</label>
                    <input type="text" name="registerNumber" class="form-control" id="registerNumber" required>
                    <span id="registerNumberError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="year">Year:</label>
                    <input type="text" name="year" class="form-control" id="year" required>
                    <span id="yearError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="place">Place:</label>
                    <input type="text" name="place" class="form-control" id="place" required>
                    <span id="placeError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="village">Village:</label>
                    <input type="text" name="village" class="form-control" id="village" required>
                    <span id="villageError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="post">Post:</label>
                    <input type="text" name="post" class="form-control" id="post" required>
                    <span id="postError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="panchayat">Panchayat:</label>
                    <input type="text" name="panchayat" class="form-control" id="panchayat" required>
                    <span id="panchayatError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="mobileNumber">District</label>
                    <input type="tel" name="districtsmobileNumber1" class="form-control" id="districts" required>
                    <span id="districtsError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="state">State:</label>
                    <input type="text" name="state" class="form-control" id="state" required>
                    <span id="stateError" class="text-danger"></span>
                </div>
            </div>
        </div>
          

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="mobileNumber">Mobile Number1</label>
                        <input type="tel" name="mobileNumber1" class="form-control" id="mobileNumber1" required>
                        <span id="mobileNumber1Error" class="text-danger"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="mobileNumber">Mobile Number2</label>
                        <input type="tel" name="mobileNumber2" class="form-control" id="mobileNumber2" required>
                        <span id="mobileNumber2Error" class="text-danger"></span>
                    </div>
                </div>
            </div>
            
        

       <h4 style="margin-left: 200px">Description of the project site:</h4>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="mahalName">Name of Mahal:</label>
                    <input type="text" name="mahalName" class="form-control" id="mahalName" required>
                    <span id="mahalNameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="location">Location:</label>
                    <input type="text" name="location" class="form-control" id="location" required>
                    <span id="locationError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="mahalName">Village</label>
                    <input type="text" name="village" class="form-control" id="village" required>
                    <span id="villageError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="location">District</label>
                    <input type="text" name="district" class="form-control" id="district" required>
                    <span id="districtError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="goodName">State:</label>
                    <input type="text" name="state" class="form-control" id="state" required>
                    <span id="stateError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="isBuildingCurrent">Is the building currently...:</label>
                    <input type="text" name="isBuildingCurrent" class="form-control" id="isBuildingCurrent" required>
                    <span id="isBuildingCurrentError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group mb-3">
                    <label for="currentStatus">Current status if any:</label>
                    <textarea name="currentStatus" class="form-control" id="currentStatus" rows="4"></textarea>
                    <span id="currentStatusError" class="text-danger"></span>
                </div>
            </div>
        </div>

    <h4 style="margin-left:200px">Description of the proposed project:</h4>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="buildingArea">Matham Building Area (Sqft):</label>
                    <input type="number" name="buildingArea" class="form-control" id="buildingArea" required>
                    <span id="buildingAreaError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="placeStreet">Place (St.):</label>
                    <input type="text" name="placeStreet" class="form-control" id="placeStreet" required>
                    <span id="placeStreetError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="estimatedAmount">Estimated amount:</label>
                    <input type="number" name="estimatedAmount" class="form-control" id="estimatedAmount" required>
                    <span id="estimatedAmountError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="familiesBenefited">Families benefited by the scheme:</label>
                    <input type="number" name="familiesBenefited" class="form-control" id="familiesBenefited" required>
                    <span id="familiesBenefitedError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="legalPermissions">Are legal permissions available:</label>
                    <input type="text" name="legalPermissions" class="form-control" id="legalPermissions" required>
                    <span id="legalPermissionsError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="typeApproved">Type Approved:</label>
                    <input type="text" name="typeApproved" class="form-control" id="typeApproved" required>
                    <span id="typeApprovedError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="area">Area:</label>
                    <input type="text" name="area" class="form-control" id="area" required>
                    <span id="areaError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="numberOfRooms">How many rooms:</label>
                    <input type="number" name="numberOfRooms" class="form-control" id="numberOfRooms" required>
                    <span id="numberOfRoomsError" class="text-danger"></span>
                </div>
            </div>
        </div>
<div class="row">
    <div class="col-5"></div>
    <div class="col-4">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
        
    </form>
</div>
</div>
</div>
</div>


                </div>
            </div>

@endsection













@section('scripts')

<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
 <!-- Peity chart-->
 <script src="{{ asset('assets/libs/peity/peity.min.js') }}"></script>

 <!-- Plugin Js-->
 <script src="{{ asset('assets/libs/chartist/chartist.min.js') }}"></script>
 <script src="{{ asset('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltips.min.js') }}"></script>


<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>

@endsection




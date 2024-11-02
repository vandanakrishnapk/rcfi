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
            <a href="{{ route('admin.getConstruction')}}" class="btn btn-success btn-sm rounded-circle"><i class="bi bi-box-arrow-in-left fs-4 ms-1"></i></a>
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
                        <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Shop and Others Under Construction</h1>
                        <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
               <div class="modal-body p-4 shopModalBody">


    <h4 style="margin-left: 200px">Applicant/Committee Description Form</h4>
    <form id="shopForm">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="applicantName">Name of Applicant:</label>
                    <input type="text" name="applicantName" class="form-control" id="applicantName" >
                    <span id="applicantNameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="committeeName">Name of Committee:</label>
                    <input type="text" name="committeeName" class="form-control" id="committeeName" >
                    <span id="committeeNameError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="registerNumber">Register Number:</label>
                    <input type="text" name="registerNumber" class="form-control" id="registerNumber" >
                    <span id="registerNumberError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="year">Year:</label>
                    <input type="text" name="year" class="form-control" id="year" >
                    <span id="yearError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="place">Place:</label>
                    <input type="text" name="place" class="form-control" id="place" >
                    <span id="placeError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="village">Village:</label>
                    <input type="text" name="village" class="form-control" id="village" >
                    <span id="villageError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="post">Post:</label>
                    <input type="text" name="post" class="form-control" id="post" >
                    <span id="postError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="panchayat">Panchayat:</label>
                    <input type="text" name="panchayat" class="form-control" id="panchayat" >
                    <span id="panchayatError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="mobileNumber">District</label>
                    <input type="tel" name="district1" class="form-control" id="district1" >
                    <span id="district1Error" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="state">State:</label>
                    <input type="text" name="state1" class="form-control" id="state1" >
                    <span id="state1Error" class="text-danger"></span>
                </div>
            </div>
        </div>
          

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="mobileNumber">Mobile Number1</label>
                        <input type="tel" name="mobileNumber1" class="form-control" id="mobileNumber1" >
                        <span id="mobileNumber1Error" class="text-danger"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="mobileNumber">Mobile Number2</label>
                        <input type="tel" name="mobileNumber2" class="form-control" id="mobileNumber2" >
                        <span id="mobileNumber2Error" class="text-danger"></span>
                    </div>
                </div>
            </div>
            
        

       <h4 style="margin-left: 200px">Description of the project site:</h4>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="mahalName">Name of Mahal:</label>
                    <input type="text" name="mahalName" class="form-control" id="mahalName" >
                    <span id="mahalNameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="location">Location:</label>
                    <input type="text" name="location" class="form-control" id="location" >
                    <span id="locationError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="mahalName">Village</label>
                    <input type="text" name="village" class="form-control" id="village" >
                    <span id="villageError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="location">District</label>
                    <input type="text" name="district2" class="form-control" id="district2" >
                    <span id="district2Error" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="goodName">State:</label>
                    <input type="text" name="state2" class="form-control" id="state2" >
                    <span id="state2Error" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="isBuildingCurrent">Is the building currently...:</label>
                    <input type="text" name="isBuildingCurrent" class="form-control" id="isBuildingCurrent" >
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
                    <input type="number" name="buildingArea" class="form-control" id="buildingArea" >
                    <span id="buildingAreaError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="placeStreet">Place (St.):</label>
                    <input type="text" name="placeStreet" class="form-control" id="placeStreet" >
                    <span id="placeStreetError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="estimatedAmount">Estimated amount:</label>
                    <input type="number" name="estimatedAmount" class="form-control" id="estimatedAmount" >
                    <span id="estimatedAmountError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="familiesBenefited">Families benefited by the scheme:</label>
                    <input type="number" name="familiesBenefited" class="form-control" id="familiesBenefited" >
                    <span id="familiesBenefitedError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="legalPermissions">Are legal permissions available:</label>
                    <input type="text" name="legalPermissions" class="form-control" id="legalPermissions" >
                    <span id="legalPermissionsError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="typeApproved">Type Approved:</label>
                    <input type="text" name="typeApproved" class="form-control" id="typeApproved" >
                    <span id="typeApprovedError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="area">Area:</label>
                    <input type="text" name="area" class="form-control" id="area" >
                    <span id="areaError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="numberOfRooms">How many rooms:</label>
                    <input type="number" name="numberOfRooms" class="form-control" id="numberOfRooms" >
                    <span id="numberOfRoomsError" class="text-danger"></span>
                </div>
            </div>
        </div> 
        @if(Auth::user()->role ===1 || Auth::user()->role ===2)
        <div class="row">
            <div class="col-6">
             <label for="">For Office Use Only</label>
             <select name="office_use" id="" class="form-select">
                <option value="Shop">Shop</option>
                <option value="Auditorium">Auditorium</option>
                <option value="Others">Others</option>
             </select>
            </div>
        </div>
        @endif
<div class="row">
    <div class="col-5"></div>
    <div class="col-4">
        <button type="submit" class="btn but">Submit</button>
    </div>
</div>
        
    </form>
</div>
</div>
</div>
</div>
            </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                         
                            <div class="row">
                            
                                <div class="col-12">
            
                                    <h4 class="but p-3 rounded fw-bold border border-success text-center" style="color:white;">SHOPS AND OTHER APPLICATIONS</h4>
                        
                                </div>
                            </div>
                        </div>
                        <div class="card-body">               
                               <table id="shopTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Applicant Name</th>
                                        <th>Committee Name</th>
                                        <th>Register Number</th>
                                        <th>Year</th>
                                        <th>Place</th>
                                        <th>Village</th>
                                        <th>Post</th>
                                        <th>Panchayat</th>
                                        <th>District</th>
                                        <th>State</th>
                                        <th>Mobile Number 1</th>
                                        <th>Mobile Number 2</th>
                                        <th>Name of Mahal</th>
                                        <th>Location</th>
                                        <th>Village</th>
                                        <th>District</th>
                                        <th>State</th>
                                        <th>Is the Building Current?</th>
                                        <th>Current Status</th>
                                        <th>Building Area (Sqft)</th>
                                        <th>Place (St.)</th>
                                        <th>Estimated Amount</th>
                                        <th>Families Benefited</th>
                                        <th>Legal Permissions</th>
                                        <th>Type Approved</th>
                                        <th>Area</th>
                                        <th>Number of Rooms</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>                      
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>     
            
            
            <!-- view more-->
<div class="modal fade" id="viewMoreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header custommodal">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Family Welfare Application
          </h1>
          <button type="button" class="btn-close customclose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="viewMoreModalBody">
          
        </div>
       
      </div>
    </div>
  </div>  


<!-- Edit shop and others -->
<div class="modal fade" id="EditshopModal" tabindex="-1" aria-labelledby="EditshopModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Shop and Others Under Construction</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
       <div class="modal-body p-4 EditshopModalBody">


<h4 style="margin-left: 200px">Applicant/Committee Description Form</h4>
<form id="EditshopForm">
@csrf
<div class="row">
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="applicantName">Name of Applicant:</label>
            <input type="text" name="applicantName" class="form-control" id="applicantName" >
            <span id="applicantNameError" class="text-danger"></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="committeeName">Name of Committee:</label>
            <input type="text" name="committeeName" class="form-control" id="committeeName" >
            <span id="committeeNameError" class="text-danger"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="registerNumber">Register Number:</label>
            <input type="text" name="registerNumber" class="form-control" id="registerNumber" >
            <span id="registerNumberError" class="text-danger"></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="year">Year:</label>
            <input type="text" name="year" class="form-control" id="year" >
            <span id="yearError" class="text-danger"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="place">Place:</label>
            <input type="text" name="place" class="form-control" id="place" >
            <span id="placeError" class="text-danger"></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="village">Village:</label>
            <input type="text" name="village" class="form-control" id="village" >
            <span id="villageError" class="text-danger"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="post">Post:</label>
            <input type="text" name="post" class="form-control" id="post" >
            <span id="postError" class="text-danger"></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="panchayat">Panchayat:</label>
            <input type="text" name="panchayat" class="form-control" id="panchayat" >
            <span id="panchayatError" class="text-danger"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="mobileNumber">District</label>
            <input type="tel" name="district1" class="form-control" id="district1" >
            <span id="district1Error" class="text-danger"></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="state">State:</label>
            <input type="text" name="state1" class="form-control" id="state1" >
            <span id="state1Error" class="text-danger"></span>
        </div>
    </div>
</div>
  

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="mobileNumber">Mobile Number1</label>
                <input type="tel" name="mobileNumber1" class="form-control" id="mobileNumber1" >
                <span id="mobileNumber1Error" class="text-danger"></span>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="mobileNumber">Mobile Number2</label>
                <input type="tel" name="mobileNumber2" class="form-control" id="mobileNumber2" >
                <span id="mobileNumber2Error" class="text-danger"></span>
            </div>
        </div>
    </div>
    


<h4 style="margin-left: 200px">Description of the project site:</h4>

<div class="row">
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="mahalName">Name of Mahal:</label>
            <input type="text" name="mahalName" class="form-control" id="mahalName" >
            <span id="mahalNameError" class="text-danger"></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" id="location" >
            <span id="locationError" class="text-danger"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="mahalName">Village</label>
            <input type="text" name="village" class="form-control" id="village" >
            <span id="villageError" class="text-danger"></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="location">District</label>
            <input type="text" name="district2" class="form-control" id="district2" >
            <span id="district2Error" class="text-danger"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="goodName">State:</label>
            <input type="text" name="state2" class="form-control" id="state2" >
            <span id="state2Error" class="text-danger"></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="isBuildingCurrent">Is the building currently...:</label>
            <input type="text" name="isBuildingCurrent" class="form-control" id="isBuildingCurrent" >
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
            <input type="number" name="buildingArea" class="form-control" id="buildingArea" >
            <span id="buildingAreaError" class="text-danger"></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="placeStreet">Place (St.):</label>
            <input type="text" name="placeStreet" class="form-control" id="placeStreet" >
            <span id="placeStreetError" class="text-danger"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="estimatedAmount">Estimated amount:</label>
            <input type="number" name="estimatedAmount" class="form-control" id="estimatedAmount" >
            <span id="estimatedAmountError" class="text-danger"></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="familiesBenefited">Families benefited by the scheme:</label>
            <input type="number" name="familiesBenefited" class="form-control" id="familiesBenefited" >
            <span id="familiesBenefitedError" class="text-danger"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="legalPermissions">Are legal permissions available:</label>
            <input type="text" name="legalPermissions" class="form-control" id="legalPermissions" >
            <span id="legalPermissionsError" class="text-danger"></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="typeApproved">Type Approved:</label>
            <input type="text" name="typeApproved" class="form-control" id="typeApproved" >
            <span id="typeApprovedError" class="text-danger"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="area">Area:</label>
            <input type="text" name="area" class="form-control" id="area" >
            <span id="areaError" class="text-danger"></span>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group mb-3">
            <label for="numberOfRooms">How many rooms:</label>
            <input type="number" name="numberOfRooms" class="form-control" id="numberOfRooms" >
            <span id="numberOfRoomsError" class="text-danger"></span>
        </div>
    </div>
</div> 
@if(Auth::user()->role ===1 || Auth::user()->role ===2)
<div class="row">
    <div class="col-6">
     <label for="">For Office Use Only</label>
     <select name="office_use" id="" class="form-select">
        <option value="Shop">Shop</option>
        <option value="Auditorium">Auditorium</option>
        <option value="Others">Others</option>
     </select>
    </div>
</div>
@endif
<div class="row">
<div class="col-5"></div>
<div class="col-4">
<input type="hidden" name="shopId">
<button type="submit" class="btn but">Submit</button>
</div>
</div>

</form>
</div>
</div>
</div>
</div>
   <!--Delete confirmation modal-->
<!-- Bootstrap Modal -->
<div id="deleteConfirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header custommodal">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modalMessage"></p>
                <p>Name: <span id="modalUserName"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn but cancel" data-dismiss="modal">Cancel</button>
                <button type="button" id="confirmDelete" class="btn btn-danger">Delete</button>
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
@push('scripts')
<script>

$(document).ready(function() {
    $('#shopTable').DataTable({
        select: true,
        serverSide: false, 
        dom: 'Bfrtlip',
        buttons: [
            {
                extend: 'csvHtml5',
                text: 'Download Excel',
                title: 'General Project Application',
                titleAttr: 'Export to CSV',
                className: 'custombutton',
                exportOptions: {
                    columns: function (idx, data, node) {
                        return true;
                    }
                }
            }
        ],
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 Applications', '25 Applications', '50 Applications', 'All Applications']
        ],
        ajax: {
            url: `{{ url('/admin/construction/project/shops/others/datatable') }}`,
            type: 'GET',
            dataSrc: 'data',
        },
    columns: [       
    { data: 'applicantName' },
    { data: 'committeeName' },
    { data: 'registerNumber' },
    { data: 'year' },
    { data: 'place' },
    { data: 'village' },
    { data: 'post' },
    { data: 'panchayat' },
    { data: 'district1' },
    { data: 'state1' },
    { data: 'mobileNumber1' },
    { data: 'mobileNumber2' },
    { data: 'mahalName' },
    { data: 'location' },
    { data: 'village' }, // Duplicate field, ensure it's distinct in your context
    { data: 'district2' }, // Duplicate field, ensure it's distinct in your context
    { data: 'state2' }, // Duplicate field, ensure it's distinct in your context
    { data: 'isBuildingCurrent' },
    { data: 'currentStatus' },
    { data: 'buildingArea' },
    { data: 'placeStreet' },
    { data: 'estimatedAmount' },
    { data: 'familiesBenefited' },
    { data: 'legalPermissions' },
    { data: 'typeApproved' },
    { data: 'area' },
    { data: 'numberOfRooms' },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return `
                    <div class="dd d-flex">
                        <button class="btn btn-primary btn-sm view-more me-1" data-id="${row.shopId}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <button class="btn btn-warning btn-sm edit me-1" data-id="${row.shopId}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete" data-id="${row.shopId}" data-name="${row.applicantName}">
                            <i class="bi bi-trash"></i>
                        </button>                       
                    </div>`;
                } 
            },
        ]
    });
});

    //do general project 

    $(document).ready(function() {
    $('#shopForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = $(this).serialize();

        $.ajax({
            url: `{{ url('/admin/construction/project/shops/others/new') }}`, // Your endpoint
            type: 'POST',
            data: formData,
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#shopModal').modal('hide');
                 $('#shopTable').DataTable().ajax.reload();
                
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors; // Use xhr here
                    $.each(errors, function(key, value) {
                        $('#' + key + 'Error').text(value[0]); // Ensure ID matches
                    });
                    toastr.error('Please check the form and correct the errors.', 'Error');
                } else {
                    toastr.error('Something went wrong!', 'Error');
                }
            }
        });
    });
});   


$(document).on('click', '.view-more', function() {
    const shopId = $(this).data('id');
    console.log('Clicked Shop ID:', shopId);

    if (shopId !== undefined) {
        $.ajax({
            url: `{{ url('/admin/construction/project/shops/others/view/more') }}/${shopId}`, // Laravel route
            method: 'GET',
            success: function(response) {
                console.log('Response data:', response);

                 const data = response;
                 const requiredKeys = [
    'applicantName',
    'committeeName',
    'registerNumber',
    'year',
    'place',
    'village',
    'post',
    'panchayat',
    'district1',
    'state1',
    'mobileNumber1',
    'mahalName',
    'location',
    'district2',
    'state2',
    'isBuildingCurrent',
    'buildingArea',
    'placeStreet',
    'estimatedAmount',
    'familiesBenefited',
    'legalPermissions',
    'typeApproved',
    'area',
    'numberOfRooms',
];


                const $modalBody = $('#viewMoreModalBody');
                $modalBody.empty(); // Clear existing content

                let gridHtml = '<div class="row">';

                requiredKeys.forEach((key, index) => {
                    const capitalizedKey = key.replace(/_/g, ' ').replace(/^./, str => str.toUpperCase());
                    const value = data[key] !== undefined ? data[key] : 'Not Available';

                    if (index % 2 === 0 && index !== 0) {
                        gridHtml += '</div><div class="row">';
                    }

                    gridHtml += `
                        <ul class="list-group list-group-horizontal-md">
                            <div class="col-6">
                                <li class="list-group-item"><strong>${capitalizedKey}</strong></li>
                            </div>
                            <div class="col-6">
                                <li class="list-group-item"><strong>${value}</strong></li>
                            </div>
                        </ul>
                    `;
                });

                gridHtml += '</div>'; // Close the last row

                $modalBody.append(gridHtml);

                // Show the modal
                $('#viewMoreModal').modal('show');
            },
            error: function(xhr) {
                console.error('An error occurred:', xhr.responseText);
                // Optionally show an error message in the UI
            }
        });
    }
});



//Edit shop and others 
//edit family

$(document).on('click', '.edit', function() {
const shopId = $(this).data('id'); // Assuming the edit button has a data-id attribute
$.get(`{{ url('/admin/construction/project/shops/others/edit') }}/${shopId}`, function(data)
 {
 // Fill the form with data 
 $('input[name="shopId"]').val(data.shopId);  
$('input[name="applicantName"]').val(data.applicantName);
$('input[name="committeeName"]').val(data.committeeName);
$('input[name="registerNumber"]').val(data.registerNumber);
$('input[name="year"]').val(data.year);
$('input[name="place"]').val(data.place);
$('input[name="village"]').val(data.village);
$('input[name="post"]').val(data.post);
$('input[name="panchayat"]').val(data.panchayat);
$('input[name="district1"]').val(data.district1);
$('input[name="state1"]').val(data.state1);
$('input[name="mobileNumber1"]').val(data.mobileNumber1);
$('input[name="mobileNumber2"]').val(data.mobileNumber2);
$('input[name="mahalName"]').val(data.mahalName);
$('input[name="location"]').val(data.location);
$('input[name="district2"]').val(data.district2);
$('input[name="state2"]').val(data.state2);
$('input[name="isBuildingCurrent"]').val(data.isBuildingCurrent);
$('textarea[name="currentStatus"]').val(data.currentStatus);
$('input[name="buildingArea"]').val(data.buildingArea);
$('input[name="placeStreet"]').val(data.placeStreet);
$('input[name="estimatedAmount"]').val(data.estimatedAmount);
$('input[name="familiesBenefited"]').val(data.familiesBenefited);
$('input[name="legalPermissions"]').val(data.legalPermissions);
$('input[name="typeApproved"]').val(data.typeApproved);
$('input[name="area"]').val(data.area);
$('input[name="numberOfRooms"]').val(data.numberOfRooms);
$('select[name="office_use"]').val(data.office_use); // For select input
$('#EditshopModal').modal('show'); // Ensure the modal ID matches
});
}); 

//update shop and others 

$(document).ready(function() {
    $('#EditshopForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        let formData = $(this).serializeArray();

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.updateShopAndOther') }}",
            data: formData,
            dataType: 'json',
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },
            success: function(data) {
                if (data.status == 0) {
                    // Handle validation errors or other issues
                    $.each(data.error, function(prefix, val) {
                        $('#' + prefix + '-error').text(val[0]);
                    });
                } else {
                    // Hide the modal and reset the form on success
                    $('#EditshopModal').modal('hide');
                    toastr.success(data.message); // Display success message
                    setTimeout(function() {
                        location.reload(); // Optional: Reload page after a short delay
                    }, 2000);
                }
            },
            error: function(xhr, status, error) {
                toastr.error('An error occurred. Please try again.'); // Display error message on request failure
            }
        });
    });
}); 


//delete shop
$(document).on('click', '.delete', function() {
    const shopId = $(this).data('id');
    const userName = $(this).data('name'); // Assuming you have the username data attribute
    // Set the user name and message in the modal
    $('#modalUserName').text(userName);
    $('#modalMessage').text('Are you sure you want to delete this application?');

    // Show the modal
    $('#deleteConfirmationModal').modal('show');
     $('.close').on('click', function()
    {
        $('#deleteConfirmationModal').modal('hide');
    });

    $('.cancel').on('click', function()
    {
        $('#deleteConfirmationModal').modal('hide');
    });

    // Handle confirmation
    $('#confirmDelete').off('click').on('click', function() {
        $.ajax({
            url: `{{ url('/admin/construction/project/shops/others/delete') }}/${shopId}`,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 1) {
                    toastr.success(response.message, 'Success', {
                        positionClass: 'toast-top-right'
                    });
                } else {
                    toastr.error('Unexpected response format.', 'Error', {
                        positionClass: 'toast-top-right'
                    });
                }
                $('#shopTable').DataTable().ajax.reload();
                $('#deleteConfirmationModal').modal('hide'); // Hide the modal on success
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                toastr.error('Something went wrong!', 'Error', {
                    positionClass: 'toast-top-right'
                });
            }
        });
    });
});
</script>
@endpush




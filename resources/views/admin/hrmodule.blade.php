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

        <div class="float-end d-none d-md-block">
            <button type="button" class="btn btn-success mb-1 me-3 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#employeeModal">
                <i class="bi bi-person-plus-fill fs-5"></i>
            </button>
        </div>
    </div>
</div>
<div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="employeeModalLabel">Create New Employee</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="employeeForm" method="POST">
                    @csrf   
                
                    <!-- Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" >
                            <span id="name-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" >
                            <span id="email-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Mobile Number -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="tel" class="form-control" id="mobile" name="mobile" >
                            <span id="mobile-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <!-- Designation -->
                        <div class="col-md-6">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" >
                            <span id="designation-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Password -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                            <span id="password-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                   
                    </div>
                
                    <!-- Father's Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="father_name" class="form-label">Father's Name</label>
                            <input type="text" class="form-control" id="father_name" name="father_name">
                            <span id="father_name-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <!-- Mother's Name -->
                        <div class="col-md-6">
                            <label for="mother_name" class="form-label">Mother's Name</label>
                            <input type="text" class="form-control" id="mother_name" name="mother_name">
                            <span id="mother_name-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Date of Birth & Joining -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                            <span id="date_of_birth-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-6">
                            <label for="date_of_joining" class="form-label">Date of Joining</label>
                            <input type="date" class="form-control" id="date_of_joining" name="date_of_joining">
                            <span id="date_of_joining-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Gender & Marital Status -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <span id="gender-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-6">
                            <label for="marital_status" class="form-label">Marital Status</label>
                            <select class="form-select" id="marital_status" name="marital_status">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                            <span id="marital_status-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Address Details -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="house_name_or_number" class="form-label">House Name/Number</label>
                            <input type="text" class="form-control" id="house_name_or_no" name="house_name_or_no">
                            <span id="house_name_or_number-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-6">
                            <label for="place" class="form-label">Place</label>
                            <input type="text" class="form-control" id="place" name="place">
                            <span id="place-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- PO, District & State -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="po" class="form-label">PO</label>
                            <input type="text" class="form-control" id="po" name="po">
                            <span id="po-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <input type="text" class="form-control" id="district" name="district">
                            <span id="district-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state">
                            <span id="state-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- PIN Code -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pin_code" class="form-label">PIN Code</label>
                            <input type="text" class="form-control" id="pin_code" name="pin_code">
                            <span id="pin_code-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <!-- Mobile Professional -->
                        <div class="col-md-6">
                            <label for="mobile_professional" class="form-label">Mobile (Professional)</label>
                            <input type="tel" class="form-control" id="mobile_professional" name="mobile_professional">
                            <span id="mobile_professional-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Emails -->
                    <div class="row mb-3">
                
                        <div class="col-md-6">
                            <label for="email_professional" class="form-label">Email (Professional)</label>
                            <input type="email" class="form-control" id="email_professional" name="email_professional">
                            <span id="email_professional-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Financial Information -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="aadhar_number" class="form-label">Aadhar Number</label>
                            <input type="text" class="form-control" id="aadhar_number" name="aadhar_number">
                            <span id="aadhar_number-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-6">
                            <label for="pan_card_number" class="form-label">PAN Card Number</label>
                            <input type="text" class="form-control" id="pan_card_number" name="pan_card_number">
                            <span id="pan_card_number-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="account_number" class="form-label">Account Number</label>
                            <input type="text" class="form-control" id="account_number" name="account_number">
                            <span id="account_number-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-6">
                            <label for="bank_name" class="form-label">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name">
                            <span id="bank_name-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="bank_branch" class="form-label">Bank Branch</label>
                            <input type="text" class="form-control" id="bank_branch" name="bank_branch">
                            <span id="bank_branch-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-6">
                            <label for="ifsc_code" class="form-label">IFSC Code</label>
                            <input type="text" class="form-control" id="ifsc_code" name="ifsc_code">
                            <span id="ifsc_code-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary float-end btn-success">Create Employee</button>
                </form>
                
            </div>
        </div>
    </div>
</div>


   <!-- User Details Modal -->
   <div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="userDetailsModalLabel">User Details</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="userDetails">
                <!-- User details will be loaded here -->
            </div>
        </div>
    </div>
</div>
<!-- Modal HTML -->
<div class="modal fade" id="editDetailsModal" tabindex="-1" aria-labelledby="editDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box">
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
             
            </div>
            <div class="modal-body p-4" id="editDetails">
                <form id="EditemployeeForm" method="POST">
                    @csrf   
                
                    <!-- Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" >
                            <span id="name-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" >
                            <span id="email-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Mobile Number -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="tel" class="form-control" id="mobile" name="mobile" >
                            <span id="mobile-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <!-- Designation -->
                        <div class="col-md-6">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" >
                            <span id="designation-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                
                    <!-- Father's Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="father_name" class="form-label">Father's Name</label>
                            <input type="text" class="form-control" id="father_name" name="father_name">
                            <span id="father_name-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <!-- Mother's Name -->
                        <div class="col-md-6">
                            <label for="mother_name" class="form-label">Mother's Name</label>
                            <input type="text" class="form-control" id="mother_name" name="mother_name">
                            <span id="mother_name-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Date of Birth & Joining -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                            <span id="date_of_birth-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-6">
                            <label for="date_of_joining" class="form-label">Date of Joining</label>
                            <input type="date" class="form-control" id="date_of_joining" name="date_of_joining">
                            <span id="date_of_joining-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Gender & Marital Status -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <span id="gender-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-6">
                            <label for="marital_status" class="form-label">Marital Status</label>
                            <select class="form-select" id="marital_status" name="marital_status">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                            <span id="marital_status-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Address Details -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="house_name_or_number" class="form-label">House Name/Number</label>
                            <input type="text" class="form-control" id="house_name_or_no" name="house_name_or_no">
                            <span id="house_name_or_number-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-6">
                            <label for="place" class="form-label">Place</label>
                            <input type="text" class="form-control" id="place" name="place">
                            <span id="place-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- PO, District & State -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="po" class="form-label">PO</label>
                            <input type="text" class="form-control" id="po" name="po">
                            <span id="po-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <input type="text" class="form-control" id="district" name="district">
                            <span id="district-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state">
                            <span id="state-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- PIN Code -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pin_code" class="form-label">PIN Code</label>
                            <input type="text" class="form-control" id="pin_code" name="pin_code">
                            <span id="pin_code-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <!-- Mobile Professional -->
                        <div class="col-md-6">
                            <label for="mobile_professional" class="form-label">Mobile (Professional)</label>
                            <input type="tel" class="form-control" id="mobile_professional" name="mobile_professional">
                            <span id="mobile_professional-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Emails -->
                    <div class="row mb-3">
                
                        <div class="col-md-6">
                            <label for="email_professional" class="form-label">Email (Professional)</label>
                            <input type="email" class="form-control" id="email_professional" name="email_professional">
                            <span id="email_professional-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Financial Information -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="aadhar_number" class="form-label">Aadhar Number</label>
                            <input type="text" class="form-control" id="aadhar_number" name="aadhar_number">
                            <span id="aadhar_number-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-6">
                            <label for="pan_card_number" class="form-label">PAN Card Number</label>
                            <input type="text" class="form-control" id="pan_card_number" name="pan_card_number">
                            <span id="pan_card_number-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="account_number" class="form-label">Account Number</label>
                            <input type="text" class="form-control" id="account_number" name="account_number">
                            <span id="account_number-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-6">
                            <label for="bank_name" class="form-label">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name">
                            <span id="bank_name-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="bank_branch" class="form-label">Bank Branch</label>
                            <input type="text" class="form-control" id="bank_branch" name="bank_branch">
                            <span id="bank_branch-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                
                        <div class="col-md-6">
                            <label for="ifsc_code" class="form-label">IFSC Code</label>
                            <input type="text" class="form-control" id="ifsc_code" name="ifsc_code">
                            <span id="ifsc_code-error" class="text-danger"></span> <!-- Validation message -->
                        </div>
                    </div>
                
                    <!-- Submit Button -->
                    <input type="hidden" name="id">
                    <button type="submit" class="btn btn-primary float-end btn-success">Update Employee</button>
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



   <!-- User Details Modal -->
<div class="modal fade" id="leaveallocatedModal" tabindex="-1" aria-labelledby="leaveallocatedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="leaveallocatedModalLabel">Leave Allocation Details </h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="leaveallocated">
                <!-- User details will be loaded here -->
            </div>
        </div>
    </div>
</div>
   <!--data table -->
   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                  
                    <div class="col-12">
    
                        <h4 class="widgetcolor p-3 text-center rounded fw-bold border border-success" style="color:white;">Employee Details</h4>
            
                    </div>
                </div>
            </div>
    
            <div class="card-body">
    
                <table id="empTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Designation</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Date of Birth</th>
                            <th>Date of Joining</th>
                            <th>Gender</th>
                            <th>Marital Status</th>
                            <th>House Name/Number</th>
                            <th>Place</th>
                            <th>PO</th>
                            <th>District</th>
                            <th>State</th>
                            <th>PIN Code</th>
                            <th>Mobile (Professional)</th>
                            <th>Email (Professional)</th>
                            <th>Aadhar Number</th>
                            <th>PAN Card Number</th>
                            <th>Account Number</th>
                            <th>Bank Name</th>
                            <th>Bank Branch</th>
                            <th>IFSC Code</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be populated here by DataTables -->
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    </div>
    
    
</div>
</div>
</div>


<!-- Leave Details Modal -->
<div class="modal fade" id="leaveDetailsModal" tabindex="-1" aria-labelledby="leaveDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="leaveDetailsModalLabel">Leave Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Leave details will be loaded here dynamically -->
                <table class="table table-bordered" id="leaveDetailsTable">
                    <thead>
                        <tr>
                            <th>Leave Type</th>
                            <th>Leave Taken (Days)</th>
                            <th>From</th>
                            <th>To</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamic data will be inserted here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection







@push('scripts')
<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
 <!-- Peity chart-->
 <script src="{{ asset('assets/libs/peity/peity.min.js') }}"></script>

 <!-- Plugin Js-->
 <script src="{{ asset('assets/libs/chartist/chartist.min.js') }}"></script>
 <script src="{{ asset('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltips.min.js') }}"></script>


<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script> 

<script>
$(document).ready(function() {
    $('#empTable').DataTable({
        select: true,
        serverSide: true, // Server-side processing
        dom: 'Bfrtlip',
        buttons: [
            {
                extend: 'csvHtml5',
                text: 'Download Excel',
                title: 'Employees',
                titleAttr: 'Export to Excel',
                className: 'pro',
                exportOptions: {
                    columns: function (idx, data, node) {
                        return true; // Export all columns
                    }
                }
            }
        ],
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 employees', '25 employees', '50 employees', 'All employees']
        ],
        ajax: {
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/admin/hr/module/employee') }}`, // Ensure this route returns data in the correct format
            type: 'POST',
            dataSrc: 'data', // Ensuring the server sends data in 'data' property
        },
        columns: [
            { data: 'name' },
            { data: 'email' },
            { data: 'mobile' },
            { data: 'designation' },
            { data: 'father_name' },  // Add more columns to show father's name
            { data: 'mother_name' },  // Add more columns to show mother's name
            { data: 'date_of_birth' },  // Add more columns to show date of birth
            { data: 'date_of_joining' },  // Add more columns to show date of joining
            { data: 'gender' },  // Add more columns to show gender
            { data: 'marital_status' },  // Add more columns to show marital status
            { data: 'house_name_or_no' },  // Add more columns to show house name/number
            { data: 'place' },  // Add more columns to show place
            { data: 'po' },  // Add more columns to show PO
            { data: 'district' },  // Add more columns to show district
            { data: 'state' },  // Add more columns to show state
            { data: 'pin_code' },  // Add more columns to show pin code
            { data: 'mobile_professional' },  // Add more columns to show mobile (professional)
            { data: 'email_professional' },  // Add more columns to show email (professional)
            { data: 'aadhar_number' },  // Add more columns to show aadhar number
            { data: 'pan_card_number' },  // Add more columns to show PAN card number
            { data: 'account_number' },  // Add more columns to show account number
            { data: 'bank_name' },  // Add more columns to show bank name
            { data: 'bank_branch' },  // Add more columns to show bank branch
            { data: 'ifsc_code' },  // Add more columns to show IFSC code
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return `
                        <div class="dd d-flex">
                            <button class="btn btn-primary btn-sm more-user me-1" data-id="${row.id}" title="view more">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <button class="btn btn-warning btn-sm edit-user me-1" data-id="${row.id}" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-danger btn-sm delete-user" data-id="${row.id}" data-pro="${row.name}" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>  
                                <button class="btn btn-warning btn-sm leave-details me-1" data-id="${row.id}" title="leave-details">
                                Leave Details
                            </button> 
                        </div>
                    `;
                }
            }
        ]
    });
});


    $(document).ready(function() {
        $('#employeeForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = $(this).serialize(); // Serialize the form data

            // Clear previous error messages
            $('.text-danger').text('');

            $.ajax({
                url: `{{ url('/admin/hr/module/employee/new') }}`, // Correct route
                type: 'POST',
                data: formData,
                success: function(response) {
                    iziToast.success({
                        title: 'Success!',
                        message: response.message,
                        position: 'topRight',
                    });
                    $('#employeeModal').hide();
                    $('#empTable').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    // Loop through errors and display in respective input fields
                    for (var key in errors) {
                        $('#' + key + '-error').text(errors[key][0]); // Display the first error
                    }
                    iziToast.error({
                        title: 'Error!',
                        message: 'Please fix the errors and try again.',
                        position: 'topRight',
                    });
                }
            });
        });
    }); 
    $(document).ready(function() {
        // When employee_id is changed, fetch employee details
        $('#empId').on('change', function() {
            var employeeId = $(this).val(); // Get selected employee ID
            if (employeeId) {
                // Make an AJAX request to get employee details
                $.ajax({
                    url: `{{ url('/admin/hr/module/employee/name')}}/${employeeId}`, // Your route here
                    type: 'GET',
                    success: function(response) {
                        // On success, populate the employee name field
                        console.log('success');
                        $('#employee_name').val(response.employee_name);
                    },
                    error: function(xhr) {
                        alert('Error fetching employee data.');
                    }
                });
            } else {
                // If no employee is selected, clear the employee name field
                $('#employee_name').val('');
            }
        });
    }); 

   
    $(document).on('click', '.more-user', function() {
    const userId = $(this).data('id');
    console.log('Clicked user ID:', userId);

    if (userId !== undefined) {
        $.get(`{{ url('/admin/users') }}/${userId}`, function(data) {
            console.log('Response data:', data);

            // Checking if data exists and includes all required fields
            if (data) {
                let userDetails = `
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Name:</strong> ${data.name || 'N/A'}</p>
                            <p><strong>Email:</strong> ${data.email || 'N/A'}</p>
                            <p><strong>Mobile:</strong> ${data.mobile || 'N/A'}</p>
                            <p><strong>Designation:</strong> ${data.designation || 'N/A'}</p>
                            <p><strong>Father's Name:</strong> ${data.father_name || 'N/A'}</p>
                            <p><strong>Mother's Name:</strong> ${data.mother_name || 'N/A'}</p>
                            <p><strong>Date of Birth:</strong> ${data.date_of_birth || 'N/A'}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Date of Joining:</strong> ${data.date_of_joining || 'N/A'}</p>
                            <p><strong>Gender:</strong> ${data.gender || 'N/A'}</p>
                            <p><strong>Marital Status:</strong> ${data.marital_status || 'N/A'}</p>
                            <p><strong>House Name/Number:</strong> ${data.house_name_or_no || 'N/A'}</p>
                            <p><strong>Place:</strong> ${data.place || 'N/A'}</p>
                            <p><strong>PO:</strong> ${data.po || 'N/A'}</p>
                            <p><strong>District:</strong> ${data.district || 'N/A'}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>State:</strong> ${data.state || 'N/A'}</p>
                            <p><strong>PIN Code:</strong> ${data.pin_code || 'N/A'}</p>
                            <p><strong>Mobile (Professional):</strong> ${data.mobile_professional || 'N/A'}</p>
                            <p><strong>Email (Professional):</strong> ${data.email_professional || 'N/A'}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Aadhar Number:</strong> ${data.aadhar_number || 'N/A'}</p>
                            <p><strong>PAN Card Number:</strong> ${data.pan_card_number || 'N/A'}</p>
                            <p><strong>Account Number:</strong> ${data.account_number || 'N/A'}</p>
                            <p><strong>Bank Name:</strong> ${data.bank_name || 'N/A'}</p>
                            <p><strong>Bank Branch:</strong> ${data.bank_branch || 'N/A'}</p>
                            <p><strong>IFSC Code:</strong> ${data.ifsc_code || 'N/A'}</p>
                        </div>
                    </div>
                `;
                $('#userDetails').html(userDetails);
                $('#userDetailsModal').modal('show');
            } else {
                $('#userDetails').html('<p>No user details available.</p>');
                $('#userDetailsModal').modal('show');
            }
        }).fail(function() {
            alert('Error retrieving user details.');
        });
    } else {
        console.error('User ID is undefined.');
    }
});

$(document).on('click', '.edit-user', function() {
    const userId = $(this).data('id');  // Get the user Name from the data-name attribute
    $.get(`{{ url('/admin/hr/module/employee/edit') }}/${userId}`, function(data) {
        console.log('User Data:', data);

            // Populate the fields with the fetched data using input names
            if (data) {
            // Populate the form fields using the name attributes
            $('input[name="id"]').val(data.id);
            $('input[name="name"]').val(data.name);
            $('input[name="email"]').val(data.email);
            $('input[name="mobile"]').val(data.mobile);
            $('input[name="designation"]').val(data.designation);
            $('input[name="father_name"]').val(data.father_name || '');
            $('input[name="mother_name"]').val(data.mother_name || '');
            $('input[name="date_of_birth"]').val(data.date_of_birth || '');
            $('input[name="date_of_joining"]').val(data.date_of_joining || '');
            $('select[name="gender"]').val(data.gender || '');
            $('select[name="marital_status"]').val(data.marital_status || '');
            $('input[name="house_name_or_no"]').val(data.house_name_or_no || '');
            $('input[name="place"]').val(data.place || '');
            $('input[name="po"]').val(data.po || '');
            $('input[name="district"]').val(data.district || '');
            $('input[name="state"]').val(data.state || '');
            $('input[name="pin_code"]').val(data.pin_code || '');
            $('input[name="mobile_professional"]').val(data.mobile_professional || '');
            $('input[name="email_professional"]').val(data.email_professional || '');
            $('input[name="aadhar_number"]').val(data.aadhar_number || '');
            $('input[name="pan_card_number"]').val(data.pan_card_number || '');
            $('input[name="account_number"]').val(data.account_number || '');
            $('input[name="bank_name"]').val(data.bank_name || '');
            $('input[name="bank_branch"]').val(data.bank_branch || '');
            $('input[name="ifsc_code"]').val(data.ifsc_code || '');

         $('#editDetailsModal').modal('show');
        } else {
            alert('Error: User data not found');
        }
    }).fail(function() {
        alert('Error retrieving user details');
    });
});

//update user
$(document).on('submit', '#EditemployeeForm', function(event) {
    event.preventDefault();    
    const userId = $(this).data('id');
    console.log(userId);
    const formData = $(this).serialize();
    const url = `{{ url('/admin/hr/module/employee/update') }}`; // Ensure this URL is correct

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: "json",
        success: function(response) {
             if (response.status === 0) {
                $.each(response.error, function(key, value) {
                    $('#' + key + '-error').text(value);
                });
                iziToast.error({
                    title: 'Validation Error',
                    message: 'Please fix the errors and try again.',
                    position: 'topRight'
                });
            } else if (response.status === 1) {
                iziToast.success({
                    title: 'Success',
                    message: response.message,
                    position: 'topRight'
                });
                $('#EditemployeeForm')[0].reset();
                $('#editDetailsModal').modal('hide');
                $('#empTable').DataTable().ajax.reload();
            } else {
                iziToast.error({
                    title: 'Error',
                    message: 'Unexpected response format.',
                    position: 'topRight'
                });
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            iziToast.error({
                title: 'Error',
                message: 'Something went wrong!',
                position: 'topRight',
            
            });
        }
    });
});


    
//delete user  

$(document).on('click', '.delete-user', function() {
    const userId = $(this).data('id');
    const userName = $(this).data('name'); // Assuming you have the username data attribute
    // Set the user name and message in the modal
    $('#modalUserName').text(userName);
    $('#modalMessage').text('Are you sure you want to delete this user?');

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
            url: `{{ url('/admin/users') }}/${userId}`,
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
                $('#empTable').DataTable().ajax.reload();
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
$(document).ready(function() {
    // Handle the "Leave Details" button click event
    $('#empTable').on('click', '.leave-details', function() {
        var employeeId = $(this).data('id'); // Get the employee ID from the button data attribute

        // AJAX request to fetch leave details
        $.ajax({
            url: `{{ url('/admin/hr/module/employee/leave/details')}}/${employeeId}`,
            type: 'GET',
            success: function(response) {
                // Clear any existing rows in the table
                $('#leaveDetailsTable tbody').empty();

                // Loop through the leave details and append them to the table
                $.each(response.leaveApplications, function(index, leave) {
                    var row = `
                        <tr>
                            <td>${leave.leave_name}</td>
                            <td>${leave.leave_days} days</td>
                            <td>${leave.leave_duration_start}</td>
                            <td>${leave.leave_duration_end}</td>
                        </tr>
                    `;
                    $('#leaveDetailsTable tbody').append(row);
                });

                // Show the modal
                $('#leaveDetailsModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.log('Error fetching leave details: ', error);
                alert('An error occurred while fetching leave details.');
            }
        });
    });
});

</script>
@endpush

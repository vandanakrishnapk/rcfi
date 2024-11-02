@extends('user.template.master')
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
            <a href="{{ route('user.getApplications')}}" class="btn btn-success btn-sm rounded-circle"><i class="bi bi-box-arrow-in-left fs-4 ms-1"></i></a>
        </div>
        <div class="float-end d-none d-md-block">
            <button type="button" class="btn btn-success mb-1 me-3 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#familyModal">
                <i class="bi bi-person-plus-fill fs-5"></i>
            </button>
        </div>
    </div>
            <div class="row">
                <div class="col-12">
        
          
        <div class="modal fade" id="familyModal" tabindex="-1" aria-labelledby="familyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header box">
                        <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Family Welfare Application</h1>
                        <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
               <div class="modal-body p-4 familyModalBody">
               
                <form id="familyForm" method="post">
                @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="father_name">Father's Name</label>
                                <input type="text" name="father_name" class="form-control" id="father_name" >
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mother_name">Mother's Name</label>
                                <input type="text" name="mother_name" class="form-control" id="mother_name" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="father_grandfather">Father's Father</label>
                                <input type="text" name="father_grandfather" class="form-control" id="father_grandfather">
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" class="form-control" id="dob" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="age">Age</label>
                                <input type="number" name="age" class="form-control" id="age" >
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="aadhaar_number">Aadhaar Number</label>
                                <input type="text" name="aadhaar_number" class="form-control" id="aadhaar_number">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="house_name">House Name</label>
                                <input type="text" name="house_name" class="form-control" id="house_name">
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" id="location">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="po">P.O.</label>
                                <input type="text" name="po" class="form-control" id="po">
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="panchayat">Panchayat</label>
                                <input type="text" name="panchayat" class="form-control" id="panchayat">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="panchayat">District</label>
                                <input type="text" name="district" class="form-control" id="district">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="pin_code">Pin Code</label>
                                <input type="text" name="pin_code" class="form-control" id="pin_code">
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mobile1">Mobile 1</label>
                                <input type="tel" name="mobile1" class="form-control" id="mobile1" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mobile2">Mobile 2</label>
                                <input type="tel" name="mobile2" class="form-control" id="mobile2">
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="children_count">Number of children in the family</label>
                                <input type="number" name="children_count" class="form-control" id="children_count">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group mb-3">
                                <label for="children_count">male</label>
                                <input type="number" name="male_count" class="form-control" id="children_count">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group mb-3">
                                <label for="children_count">Female</label>
                                <input type="number" name="female_count" class="form-control" id="children_count">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="nri">NRI</label>
                                <select name="nri" class="form-control" id="nri">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="occupation">Occupation</label>
                                <input type="text" name="occupation" class="form-control" id="occupation">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="monthly_income">Monthly Income</label>
                                <input type="number" name="monthly_income" class="form-control" id="monthly_income">
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="other_income">Other sources of income</label>
                                <input type="text" name="other_income" class="form-control" id="other_income">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="health_status">Health Status</label>
                                <textarea name="health_status" class="form-control" id="health_status"></textarea>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="disability">Disability</label>
                                <select name="disability" class="form-control" id="disability">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="treatment_explanation">Explanation if routine treatment is </label>
                                <textarea name="treatment_explanation" class="form-control" id="treatment_explanation"></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="chronic_patients">Description if there are other chronic patients in the house</label>
                                <textarea name="chronic_patients" class="form-control" id="chronic_patients"></textarea>
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="residence_info">Residence Information</label>
                                <select name="residence_info" class="form-control" id="residence_info">
                                    <option value="own_house">Own House</option>
                                    <option value="homestead">Homestead</option>
                                    <option value="rented_house">Rented House</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="own_house_condition">If own house, describe present condition</label>
                                <textarea name="own_house_condition" class="form-control" id="own_house_condition"></textarea>
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="own_place">Own place</label>
                                <select name="own_place" class="form-control" id="own_place">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="own_place_size">If so, how much?</label>
                                <input type="text" name="own_place_size" class="form-control" id="own_place_size">
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="sequel">Is there a sequel</label>
                                <select name="sequel" class="form-control" id="sequel">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="welfare_assistance">Areas of welfare needing assistance</label>
                                <textarea name="welfare_assistance" class="form-control" id="welfare_assistance"></textarea>
                            </div>
                        </div>
                    </div>
        
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

<!--Family Data table -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
             
                <div class="row">
                
                    <div class="col-12">

                        <h4 class="but p-3 rounded fw-bold border border-success text-center" style="color:white;">FAMILY WELFARE APPLICATIONS</h4>
            
                    </div>
                </div>
            </div>
            <div class="card-body">
<table id="familyTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Father's Name</th>
            <th>Mother's Name</th>
            <th>Father's Grandfather</th>
            <th>Date of Birth</th>
            <th>Age</th>
            <th>Aadhaar Number</th>
            <th>House Name</th>
            <th>Location</th>
            <th>P.O.</th>
            <th>Panchayat</th>
            <th>District</th>
            <th>Pin Code</th>
            <th>Mobile 1</th>
            <th>Mobile 2</th>
            <th>Children Count</th>
            <th>Male Count</th>
            <th>Female Count</th>
            <th>NRI</th>
            <th>Occupation</th>
            <th>Monthly Income</th>
            <th>Other Income</th>
            <th>Health Status</th>
            <th>Disability</th>
            <th>Treatment Explanation</th>
            <th>Chronic Patients</th>
            <th>Residence Info</th>
            <th>Own House Condition</th>
            <th>Own Place</th>
            <th>Own Place Size</th>
            <th>Sequel</th>
            <th>Welfare Assistance</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data will be populated here -->
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
  
  <!-- edit family -->
  <div class="modal fade" id="EditfamilyModal" tabindex="-1" aria-labelledby="EditfamilyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Differently Abled Welfare Application</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
       <div class="modal-body p-4 EditfamilyModalBody">
       
        <form id="EditfamilyForm" method="post">
        @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="father_name">Father's Name</label>
                        <input type="text" name="father_name" class="form-control" id="father_name" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="mother_name">Mother's Name</label>
                        <input type="text" name="mother_name" class="form-control" id="mother_name" >
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="father_grandfather">Father's Father</label>
                        <input type="text" name="father_grandfather" class="form-control" id="father_grandfather">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="dob">Date of Birth</label>
                        <input type="date" name="dob" class="form-control" id="dob" >
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="age">Age</label>
                        <input type="number" name="age" class="form-control" id="age" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="aadhaar_number">Aadhaar Number</label>
                        <input type="text" name="aadhaar_number" class="form-control" id="aadhaar_number">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="house_name">House Name</label>
                        <input type="text" name="house_name" class="form-control" id="house_name">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" id="location">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="po">P.O.</label>
                        <input type="text" name="po" class="form-control" id="po">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="form-group mb-3">
                        <label for="panchayat">Panchayat</label>
                        <input type="text" name="panchayat" class="form-control" id="panchayat">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mb-3">
                        <label for="panchayat">District</label>
                        <input type="text" name="district" class="form-control" id="district">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mb-3">
                        <label for="pin_code">Pin Code</label>
                        <input type="text" name="pin_code" class="form-control" id="pin_code">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="mobile1">Mobile 1</label>
                        <input type="tel" name="mobile1" class="form-control" id="mobile1" >
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="mobile2">Mobile 2</label>
                        <input type="tel" name="mobile2" class="form-control" id="mobile2">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="form-group mb-3">
                        <label for="children_count">Number of children in the family</label>
                        <input type="number" name="children_count" class="form-control" id="children_count">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group mb-3">
                        <label for="children_count">male</label>
                        <input type="number" name="male_count" class="form-control" id="children_count">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group mb-3">
                        <label for="children_count">Female</label>
                        <input type="number" name="female_count" class="form-control" id="children_count">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mb-3">
                        <label for="nri">NRI</label>
                        <select name="nri" class="form-control" id="nri">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="occupation">Occupation</label>
                        <input type="text" name="occupation" class="form-control" id="occupation">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="monthly_income">Monthly Income</label>
                        <input type="number" name="monthly_income" class="form-control" id="monthly_income">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="form-group mb-3">
                        <label for="other_income">Other sources of income</label>
                        <input type="text" name="other_income" class="form-control" id="other_income">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mb-3">
                        <label for="health_status">Health Status</label>
                        <textarea name="health_status" class="form-control" id="health_status"></textarea>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mb-3">
                        <label for="disability">Disability</label>
                        <select name="disability" class="form-control" id="disability">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="treatment_explanation">Explanation if routine treatment is </label>
                        <textarea name="treatment_explanation" class="form-control" id="treatment_explanation"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="chronic_patients">Description if there are other chronic patients in the house</label>
                        <textarea name="chronic_patients" class="form-control" id="chronic_patients"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="residence_info">Residence Information</label>
                        <select name="residence_info" class="form-control" id="residence_info">
                            <option value="own_house">Own House</option>
                            <option value="homestead">Homestead</option>
                            <option value="rented_house">Rented House</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="own_house_condition">If own house, describe present condition</label>
                        <textarea name="own_house_condition" class="form-control" id="own_house_condition"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="own_place">Own place</label>
                        <select name="own_place" class="form-control" id="own_place">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="own_place_size">If so, how much?</label>
                        <input type="text" name="own_place_size" class="form-control" id="own_place_size">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="sequel">Is there a sequel</label>
                        <select name="sequel" class="form-control" id="sequel">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="welfare_assistance">Areas of welfare needing assistance</label>
                        <textarea name="welfare_assistance" class="form-control" id="welfare_assistance"></textarea>
                    </div>
                </div>
            </div>

           <div class="row">
            <div class="col-5"></div>
            <div class="col-4">
                <input type="hidden" name="familyId">
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
    $('#familyTable').DataTable({
        select: true,
        serverSide: false, 
        dom: 'Bfrtlip',
        buttons: [
            {
                extend: 'csvHtml5',
                text: 'Download Excel',
                title: 'Family Welfare Application',
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
            url: `{{ url('/user/application/family/welfare/datatable') }}`,
            type: 'GET',
            dataSrc: 'data',
        },
        columns: [
       
    { data: 'name' },
    { data: 'father_name' },
    { data: 'mother_name' },
    { data: 'father_grandfather' },
    { data: 'dob' },
    { data: 'age' },
    { data: 'aadhaar_number' },
    { data: 'house_name' },
    { data: 'location' },
    { data: 'po' },
    { data: 'panchayat' },
    { data: 'district' },
    { data: 'pin_code' },
    { data: 'mobile1' },
    { data: 'mobile2' },
    { data: 'children_count' },
    { data: 'male_count' },
    { data: 'female_count' },
    { data: 'nri' },
    { data: 'occupation' },
    { data: 'monthly_income' },
    { data: 'other_income' },
    { data: 'health_status' },
    { data: 'disability' },
    { data: 'treatment_explanation' },
    { data: 'chronic_patients' },
    { data: 'residence_info' },
    { data: 'own_house_condition' },
    { data: 'own_place' },
    { data: 'own_place_size' },
    { data: 'sequel' },
    { data: 'welfare_assistance' },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return `
                    <div class="dd d-flex">
                        <button class="btn btn-primary btn-sm view-more me-1" data-id="${row.familyId}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <button class="btn btn-warning btn-sm edit me-1" data-id="${row.familyId}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete" data-id="${row.familyId}" data-name="${row.name}">
                            <i class="bi bi-trash"></i>
                        </button>                       
                    </div>`;
                } 
            },
        ]
    });
});
    $(document).ready(function() {
    $('#familyForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = $(this).serialize();

        $.ajax({
            url: `{{ url('user/application/family/welfare/new') }}`, // Your endpoint
            type: 'POST',
            data: formData,
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#familyModal').modal('hide');
                $('#familyTable').DataTable().ajax.reload();
                // $('#diffAbledTable').DataTable().ajax.reload(); // Reload the DataTable
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

//view more family 

$(document).on('click', '.view-more', function() {
    const familyId = $(this).data('id');
    console.log('Clicked family ID:', familyId);

    if (familyId !== undefined) {
        $.ajax({
            url: `{{ url('/user/application/family/welfare/view/more') }}/${familyId}`, // Laravel route
            method: 'GET',
            success: function(response) {
                console.log('Response data:', response);

                 const data = response;
                 const requiredKeys = [
    'name',
    'father_name',
    'mother_name',
    'father_grandfather',
    'dob',
    'age',
    'aadhaar_number',
    'house_name',
    'location',
    'po',
    'panchayat',
    'district',
    'pin_code',
    'mobile1',
    'mobile2',
    'children_count',
    'male_count',
    'female_count',
    'nri',
    'occupation',
    'monthly_income',
    'other_income',
    'health_status',
    'disability',
    'treatment_explanation',
    'chronic_patients',
    'residence_info',
    'own_house_condition',
    'own_place',
    'own_place_size',
    'sequel',
    'welfare_assistance'
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

//edit family

$(document).on('click', '.edit', function() {
    const familyId = $(this).data('id'); // Assuming the edit button has a data-id attribute

    $.get(`{{ url('/user/application/family/welfare/edit/') }}/${familyId}`, function(data) {
        // Fill the form with data
 $('input[name="familyId"]').val(data.familyId);
$('input[name="name"]').val(data.name);
$('input[name="father_name"]').val(data.father_name);
$('input[name="mother_name"]').val(data.mother_name);
$('input[name="father_grandfather"]').val(data.father_grandfather);
$('input[name="dob"]').val(data.dob);
$('input[name="age"]').val(data.age);
$('input[name="aadhaar_number"]').val(data.aadhaar_number);
$('input[name="house_name"]').val(data.house_name);
$('input[name="location"]').val(data.location);
$('input[name="po"]').val(data.po);
$('input[name="panchayat"]').val(data.panchayat);
$('input[name="district"]').val(data.district);
$('input[name="pin_code"]').val(data.pin_code);
$('input[name="mobile1"]').val(data.mobile1);
$('input[name="mobile2"]').val(data.mobile2);
$('input[name="children_count"]').val(data.children_count);
$('input[name="male_count"]').val(data.male_count);
$('input[name="female_count"]').val(data.female_count);
$('select[name="nri"]').val(data.nri);
$('input[name="occupation"]').val(data.occupation);
$('input[name="monthly_income"]').val(data.monthly_income);
$('input[name="other_income"]').val(data.other_income);
$('textarea[name="health_status"]').val(data.health_status);
$('select[name="disability"]').val(data.disability);
$('textarea[name="treatment_explanation"]').val(data.treatment_explanation);
$('textarea[name="chronic_patients"]').val(data.chronic_patients);
$('input[name="residence_info"]').val(data.residence_info);
$('textarea[name="own_house_condition"]').val(data.own_house_condition);
$('select[name="own_place"]').val(data.own_place);
$('input[name="own_place_size"]').val(data.own_place_size);
$('select[name="sequel"]').val(data.sequel);
$('textarea[name="welfare_assistance"]').val(data.welfare_assistance);
$('#EditfamilyModal').modal('show'); // Ensure the modal ID matches
    });
}); 

// update family form 

$(document).ready(function() {
    $('#EditfamilyForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        let formData = $(this).serializeArray();

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('user.updateFamily') }}",
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
                    $('#EditfamilyModal').modal('hide');
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
//delete family
$(document).on('click', '.delete', function() {
    const familyId = $(this).data('id');
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
            url: `{{ url('/user/application/family/welfare/delete') }}/${familyId}`,
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
                $('#familyTable').DataTable().ajax.reload();
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
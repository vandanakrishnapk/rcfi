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




@section('body') <body data-sidebar="light"> @endsection
    @section('content')
   
    <div class="row mt-3">
        <div class="col-12">
            <div class="float-start">
                <a href="{{ route('user.getApplications')}}" class="btn btn-success btn-sm rounded-circle"><i class="bi bi-box-arrow-in-left fs-4 ms-1"></i></a>
            </div>
            <div class="float-end d-none d-md-block">
                <button type="button" class="btn btn-success mb-1 me-3 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#diffAbledModal">
                    <i class="bi bi-person-plus-fill fs-5"></i>
                </button>
            </div>
        </div>
                <div class="row">
                    <div class="col-12">
            
              
            <div class="modal fade" id="diffAbledModal" tabindex="-1" aria-labelledby="MarkazOrphanCareModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header box">
                            <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Differently Abled Welfare Application</h1>
                            <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                   <div class="modal-body p-4">
                    <form  id="diffAbled" method="POST">
                    @csrf
                
                            <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="applicant_name">Applicant Name</label>
                                    <input type="text" name="applicant_name" class="form-control" >
                                    <span id="applicant_nameError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="father_name">Father's Name</label>
                                    <input type="text" name="father_name" class="form-control" >
                                    <span id="father_nameError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="fathers_father">Father's Father</label>
                                    <input type="text" name="fathers_father" class="form-control" >
                                    <span id="fathers_fatherError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="mother_name">Mother's Name</label>
                                    <input type="text" name="mother_name" class="form-control" >
                                    <span id="mother_nameError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="form-select" >
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <span id="genderError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="aadhaar_number">Aadhaar Number</label>
                                    <input type="text" name="aadhaar_number" class="form-control" >
                                    <span id="aadhaar_numberError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control" >
                                    <span id="date_of_birthError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="age">Age</label>
                                    <input type="number" name="age" class="form-control" >
                                    <span id="ageError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="marital_status">Marital Status</label>
                                    <select name="marital_status" class="form-select">
                                        <option value="">Select Marital Status</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                    </select>
                                    <span id="marital_statusError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="parents_name">Name of Guardian</label>
                                    <input type="text" name="guardian" class="form-control">
                                    <span id="guardianError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="relationship">Relationship</label>
                                    <input type="text" name="relationship" class="form-control">
                                    <span id="relationshipError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="total_members">Total Members</label>
                                    <input type="number" name="total_members" class="form-control" >
                                    <span id="total_membersError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="male_members">Male Members</label>
                                    <input type="number" name="male_members" class="form-control" >
                                    <span id="male_membersError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="female_members">Female Members</label>
                                    <input type="number" name="female_members" class="form-control" >
                                    <span id="female_membersError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="people_with_disabilities">People with Disabilities</label>
                                    <input type="number" name="people_with_disabilities" class="form-control">
                                    <span id="people_with_disabilitiesError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="monthly_income">Monthly Income</label>
                                    <input type="number" name="monthly_income" class="form-control" >
                                    <span id="monthly_incomeError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="monthly_cost">Monthly Cost</label>
                                    <input type="number" name="monthly_cost" class="form-control" >
                                    <span id="monthly_costError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="source_of_income">Source of Income</label>
                                    <input type="text" name="source_of_income" class="form-control">
                                    <span id="source_of_incomeError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="studying_institution">Name of Studying Institution</label>
                                    <input type="text" name="studying_institution" class="form-control">
                                    <span id="studying_institutionError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="reason_for_not_studying">If you don't study, reason</label>
                                    <input type="text" name="reason_for_not_studying" class="form-control">
                                    <span id="reason_for_not_studyingError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="health_status">Health Status</label>
                                    <input type="text" name="health_status" class="form-control">
                                    <span id="health_statusError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="disability">Disability</label>
                                    <select name="disability" class="form-select">
                                        <option value="">Select Disability</option>
                                        <option value="mute">Mute</option>
                                        <option value="deafness">Deafness</option>
                                        <option value="blindness">Blindness</option>
                                        <option value="others">Others</option>
                                    </select>
                                    <span id="disabilityError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="disability_percentage">Percentage of Disability</label>
                                    <input type="number" name="disability_percentage" class="form-control">
                                    <span id="disability_percentageError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="disability_date">Date/Year of Disability</label>
                                    <input type="date" name="disability_date" class="form-control">
                                    <span id="disability_dateError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="disability_level">Level of Disability</label>
                                    <select name="disability_level" class="form-select">
                                        <option value="">Select Level</option>
                                        <option value="simple">Simple</option>
                                        <option value="hard">Hard</option>
                                        <option value="very_hard">Very Hard</option>
                                    </select>
                                    <span id="disability_levelError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="anyone_else_help">Anyone else help?</label>
                                    <input type="text" name="anyone_else_help" class="form-control">
                                    <span id="anyone_else_helpError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="description">Description if any</label>
                                    <textarea name="description" class="form-control"></textarea>
                                    <span id="descriptionError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="accommodation_details">Accommodation Details</label>
                                    <select name="accommodation_details" class="form-select">
                                        <option value="">Select Accommodation</option>
                                        <option value="jar">Own House</option>
                                        <option value="ancestral_home">Ancestral Home</option>
                                        <option value="rental_house">Rental House</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <span id="accommodation_detailsError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="house_name">House Name</label>
                                    <input type="text" name="house_name" class="form-control">
                                    <span id="house_nameError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="place">Place</label>
                                    <input type="text" name="place" class="form-control">
                                    <span id="placeError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="panchayat">Panchayat</label>
                                    <input type="text" name="panchayat" class="form-control">
                                    <span id="panchayatError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="good_flowers">District</label>
                                    <input type="text" name="district" class="form-control">
                                    <span id="districtError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                
                        <br>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="pincode">Pincode</label>
                                    <input type="text" name="pincode" class="form-control" >
                                    <span id="pincodeError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" >
                                    <span id="mobileError" class="text-danger"></span>
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


<!-- data table -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
             
                <div class="row">
                
                    <div class="col-12">

                        <h4 class="but p-3 rounded fw-bold border border-success text-center" style="color:white;">DIFFERENTLY ABLED WELFARE APPLICATIONS</h4>
            
                    </div>
                </div>
            </div>
            <div class="card-body">
               
                <table id="diffAbledTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                         
                            <th>Applicant Name</th>
                            <th>Father's Name</th>
                            <th>Father's Father</th>
                            <th>Mother's Name</th>
                            <th>Gender</th>
                            <th>Aadhaar Number</th>
                            <th>Date of Birth</th>
                            <th>Age</th>
                            <th>Marital Status</th>
                            <th>Guardian</th>
                            <th>Relationship</th>
                            <th>Total Members</th>
                            <th>Male Members</th>
                            <th>Female Members</th>
                            <th>People with Disabilities</th>
                            <th>Monthly Income</th>
                            <th>Monthly Cost</th>
                            <th>Source of Income</th>
                            <th>Studying Institution</th>
                            <th>Reason for Not Studying</th>
                            <th>Health Status</th>
                            <th>Disability</th>
                            <th>Disability Percentage</th>
                            <th>Disability Date</th>
                            <th>Disability Level</th>
                            <th>Anyone Else Help</th>
                            <th>Description</th>
                            <th>Accommodation Details</th>
                            <th>House Name</th>
                            <th>Place</th>
                            <th>Panchayat</th>
                            <th>District</th>
                            <th>Pincode</th>
                            <th>Mobile</th>
                            <th>Action</th>
                          
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





<!-- view more-->
<div class="modal fade" id="viewMoreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header custommodal">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Differently Abled Welfare Application
          </h1>
          <button type="button" class="btn-close customclose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="viewMoreModalBody">
          
        </div>
       
      </div>
    </div>
  </div>   
  
  
<!--Edit -->



<div class="modal fade" id="EditdiffAbledModal" tabindex="-1" aria-labelledby="EditdiffLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header box">
            <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Differently Abled Welfare Application</h1>
            <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
   <div class="modal-body p-4 editDiffModalBody">
    <form  id="EditdiffAbled" method="POST">
    @csrf

            <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="applicant_name">Applicant Name</label>
                    <input type="text" name="applicant_name" class="form-control" >
                    <span id="applicant_nameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="father_name">Father's Name</label>
                    <input type="text" name="father_name" class="form-control" >
                    <span id="father_nameError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="fathers_father">Father's Father</label>
                    <input type="text" name="fathers_father" class="form-control" >
                    <span id="fathers_fatherError" class="text-danger"></span>
                </div>
            </div>


            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="mother_name">Mother's Name</label>
                    <input type="text" name="mother_name" class="form-control" >
                    <span id="mother_nameError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-select" >
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <span id="genderError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="aadhaar_number">Aadhaar Number</label>
                    <input type="text" name="aadhaar_number" class="form-control" >
                    <span id="aadhaar_numberError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" >
                    <span id="date_of_birthError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="age">Age</label>
                    <input type="number" name="age" class="form-control" >
                    <span id="ageError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="marital_status">Marital Status</label>
                    <select name="marital_status" class="form-select">
                        <option value="">Select Marital Status</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                    </select>
                    <span id="marital_statusError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="parents_name">Name of Guardian</label>
                    <input type="text" name="guardian" class="form-control">
                    <span id="guardianError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="relationship">Relationship</label>
                    <input type="text" name="relationship" class="form-control">
                    <span id="relationshipError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="total_members">Total Members</label>
                    <input type="number" name="total_members" class="form-control" >
                    <span id="total_membersError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="male_members">Male Members</label>
                    <input type="number" name="male_members" class="form-control" >
                    <span id="male_membersError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="female_members">Female Members</label>
                    <input type="number" name="female_members" class="form-control" >
                    <span id="female_membersError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="people_with_disabilities">People with Disabilities</label>
                    <input type="number" name="people_with_disabilities" class="form-control">
                    <span id="people_with_disabilitiesError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="monthly_income">Monthly Income</label>
                    <input type="number" name="monthly_income" class="form-control" >
                    <span id="monthly_incomeError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="monthly_cost">Monthly Cost</label>
                    <input type="number" name="monthly_cost" class="form-control" >
                    <span id="monthly_costError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="source_of_income">Source of Income</label>
                    <input type="text" name="source_of_income" class="form-control">
                    <span id="source_of_incomeError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="studying_institution">Name of Studying Institution</label>
                    <input type="text" name="studying_institution" class="form-control">
                    <span id="studying_institutionError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="reason_for_not_studying">If you don't study, reason</label>
                    <input type="text" name="reason_for_not_studying" class="form-control">
                    <span id="reason_for_not_studyingError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="health_status">Health Status</label>
                    <input type="text" name="health_status" class="form-control">
                    <span id="health_statusError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="disability">Disability</label>
                    <select name="disability" class="form-select">
                        <option value="">Select Disability</option>
                        <option value="mute">Mute</option>
                        <option value="deafness">Deafness</option>
                        <option value="blindness">Blindness</option>
                        <option value="others">Others</option>
                    </select>
                    <span id="disabilityError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="disability_percentage">Percentage of Disability</label>
                    <input type="number" name="disability_percentage" class="form-control">
                    <span id="disability_percentageError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="disability_date">Date/Year of Disability</label>
                    <input type="date" name="disability_date" class="form-control">
                    <span id="disability_dateError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="disability_level">Level of Disability</label>
                    <select name="disability_level" class="form-select">
                        <option value="">Select Level</option>
                        <option value="simple">Simple</option>
                        <option value="hard">Hard</option>
                        <option value="very_hard">Very Hard</option>
                    </select>
                    <span id="disability_levelError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="anyone_else_help">Anyone else help?</label>
                    <input type="text" name="anyone_else_help" class="form-control">
                    <span id="anyone_else_helpError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="description">Description if any</label>
                    <textarea name="description" class="form-control"></textarea>
                    <span id="descriptionError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="accommodation_details">Accommodation Details</label>
                    <select name="accommodation_details" class="form-select">
                        <option value="">Select Accommodation</option>
                        <option value="jar">Jar</option>
                        <option value="ancestral_home">Ancestral Home</option>
                        <option value="rental_house">Rental House</option>
                        <option value="other">Other</option>
                    </select>
                    <span id="accommodation_detailsError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="house_name">House Name</label>
                    <input type="text" name="house_name" class="form-control">
                    <span id="house_nameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="place">Place</label>
                    <input type="text" name="place" class="form-control">
                    <span id="placeError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="panchayat">Panchayat</label>
                    <input type="text" name="panchayat" class="form-control">
                    <span id="panchayatError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="good_flowers">District</label>
                    <input type="text" name="district" class="form-control">
                    <span id="districtError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="pincode">Pincode</label>
                    <input type="text" name="pincode" class="form-control" >
                    <span id="pincodeError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" class="form-control" >
                    <span id="mobileError" class="text-danger"></span>
                </div>
            </div>
        </div>
<div class="row">
    <div class="col-5"></div>
    <div class="col-4">
        <input type="hidden" name="diffId">
        <button type="submit" class="btn but">Submit</button>
    </div>
</div>
       
    </form>
   </div>
    </div>
</div>
</div>

<!-- delete diff abled -->

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
    $('#diffAbledTable').DataTable({
        select: true,
        serverSide: false, 
        dom: 'Bfrtlip',
        buttons: [
            {
                extend: 'csvHtml5',
                text: 'Download Excel',
                title: 'differently abled welfare application',
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
            url: `{{ url('/user/application/differently/abled/datatable') }}`,
            type: 'GET',
            dataSrc: 'data',
        },
        columns: [
       
            { data: 'applicant_name' },
            { data: 'father_name' },
            { data: 'fathers_father' },
            { data: 'mother_name' },
            { data: 'gender' },
            { data: 'aadhaar_number' },
            { data: 'date_of_birth' },
            { data: 'age' },
            { data: 'marital_status' },
            { data: 'guardian' },
            { data: 'relationship' },
            { data: 'total_members' },
            { data: 'male_members' },
            { data: 'female_members' },
            { data: 'people_with_disabilities' },
            { data: 'monthly_income' },
            { data: 'monthly_cost' },
            { data: 'source_of_income' },
            { data: 'studying_institution' },
            { data: 'reason_for_not_studying' },
            { data: 'health_status' },
            { data: 'disability' },
            { data: 'disability_percentage' },
            { data: 'disability_date' },
            { data: 'disability_level' },
            { data: 'anyone_else_help' },
            { data: 'description' },
            { data: 'accommodation_details' },
            { data: 'house_name' },
            { data: 'place' },
            { data: 'panchayat' },
            { data: 'district' },
            { data: 'pincode' },
            { data: 'mobile' },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return `
                    <div class="dd d-flex">
                        <button class="btn btn-primary btn-sm view-more me-1" data-id="${row.diffId}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <button class="btn btn-warning btn-sm edit me-1" data-id="${row.diffId}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete" data-id="${row.diffId}" data-name="${row.applicant_name}">
                            <i class="bi bi-trash"></i>
                        </button>                       
                    </div>`;
                } 
            },
        ]
    });
});


$(document).ready(function() {
    $('#diffAbled').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = $(this).serialize();

        $.ajax({
            url: `{{ url('user/application/differently/abled/new') }}`, // Your endpoint
            type: 'POST',
            data: formData,
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#diffAbledModal').modal('hide');
                $('#diffAbledTable').DataTable().ajax.reload(); // Reload the DataTable
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



//view more 
$(document).on('click', '.view-more', function() {
    const diffId = $(this).data('id');
    console.log('Clicked diff ID:', diffId);

    if (diffId !== undefined) {
        $.ajax({
            url: `{{ url('/user/application/differently/abled/view/more') }}/${diffId}`, // Laravel route
            method: 'GET',
            success: function(response) {
                console.log('Response data:', response);

                 const data = response;
                const requiredKeys = [
                    'applicant_name', 'father_name', 'fathers_father', 'mother_name', 'gender',
                    'aadhaar_number', 'date_of_birth', 'age', 'marital_status', 'guardian',
                    'relationship', 'total_members', 'male_members', 'female_members', 
                    'people_with_disabilities', 'monthly_income', 'monthly_cost', 
                    'source_of_income', 'studying_institution', 'reason_for_not_studying',
                    'health_status', 'disability', 'disability_percentage', 
                    'disability_date', 'disability_level', 'anyone_else_help', 
                    'description', 'accommodation_details', 'house_name', 'place', 
                    'panchayat', 'district', 'pincode', 'mobile'
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

//edit 
$(document).on('click', '.edit', function() {
    const diffAbledId = $(this).data('id'); // Assuming the edit button has a data-id attribute

    $.get(`{{ url('/user/application/diffabled/edit') }}/${diffAbledId}`, function(data) {
        // Fill the form with data
        $('input[name="diffId"]').val(data.diffId);
        $('input[name="applicant_name"]').val(data.applicant_name);
        $('input[name="father_name"]').val(data.father_name);
        $('input[name="fathers_father"]').val(data.fathers_father);
        $('input[name="mother_name"]').val(data.mother_name);
        $('select[name="gender"]').val(data.gender);
        $('input[name="aadhaar_number"]').val(data.aadhaar_number);
        $('input[name="date_of_birth"]').val(data.date_of_birth);
        $('input[name="age"]').val(data.age);
        $('select[name="marital_status"]').val(data.marital_status);
        $('input[name="guardian"]').val(data.guardian);
        $('input[name="relationship"]').val(data.relationship);
        $('input[name="total_members"]').val(data.total_members);
        $('input[name="male_members"]').val(data.male_members);
        $('input[name="female_members"]').val(data.female_members);
        $('input[name="people_with_disabilities"]').val(data.people_with_disabilities);
        $('input[name="monthly_income"]').val(data.monthly_income);
        $('input[name="monthly_cost"]').val(data.monthly_cost);
        $('input[name="source_of_income"]').val(data.source_of_income);
        $('input[name="studying_institution"]').val(data.studying_institution);
        $('input[name="reason_for_not_studying"]').val(data.reason_for_not_studying);
        $('input[name="health_status"]').val(data.health_status);
        $('select[name="disability"]').val(data.disability);
        $('input[name="disability_percentage"]').val(data.disability_percentage);
        $('input[name="disability_date"]').val(data.disability_date);
        $('select[name="disability_level"]').val(data.disability_level);
        $('input[name="anyone_else_help"]').val(data.anyone_else_help);
        $('textarea[name="description"]').val(data.description);
        $('select[name="accommodation_details"]').val(data.accommodation_details);
        $('input[name="house_name"]').val(data.house_name);
        $('input[name="place"]').val(data.place);
        $('input[name="panchayat"]').val(data.panchayat);
        $('input[name="district"]').val(data.district);
        $('input[name="pincode"]').val(data.pincode);
        $('input[name="mobile"]').val(data.mobile);

        // Show the modal
        $('#EditdiffAbledModal').modal('show'); // Ensure the modal ID matches
    });
}); 
//update diffrently abled form 
$(document).ready(function() {
    $('#EditdiffAbled').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        let formData = $(this).serializeArray();

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('user.UpdateDiffAbled') }}",
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
                    $('#EditdiffAbledModal').modal('hide');
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


//delete differently abled
$(document).on('click', '.delete', function() {
    const diffId = $(this).data('id');
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
            url: `{{ url('/user/application/diffabled/delete') }}/${diffId}`,
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
                $('#diffAbledTable').DataTable().ajax.reload();
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
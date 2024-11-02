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
            <button type="button" class="btn btn-success mb-1 me-3 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#generalModal">
                <i class="bi bi-person-plus-fill fs-5"></i>
            </button>
        </div>
    </div>
            <div class="row">
                <div class="col-12">
        
          
        <div class="modal fade" id="generalModal" tabindex="-1" aria-labelledby="generalModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header box">
                        <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">General Project Welfare Application</h1>
                        <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
               <div class="modal-body p-4 generalModalBody">
               
                <form id="generalForm">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                    <span id="nameError" class="text-danger"></span> <!-- Error message for name -->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="age">Age</label>
                                    <input type="number" name="age" class="form-control" id="age">
                                    <span id="ageError" class="text-danger"></span> <!-- Error message for age -->
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group mb-3">
                            <label for="address">Current Mailing Address</label>
                            <input type="text" name="address" class="form-control" id="address">
                            <span id="addressError" class="text-danger"></span> <!-- Error message for address -->
                        </div>
                
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="ward">Ward</label>
                                    <input type="text" name="ward" class="form-control" id="ward">
                                    <span id="wardError" class="text-danger"></span> <!-- Error message for ward -->
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="po">POST</label>
                                    <input type="text" name="po" class="form-control" id="po">
                                    <span id="poError" class="text-danger"></span> <!-- Error message for post -->
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="village">Village</label>
                                    <input type="text" name="village" class="form-control" id="village">
                                    <span id="villageError" class="text-danger"></span> <!-- Error message for village -->
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group mb-3">
                            <label for="panchayat">Panchayat/Municipality/Corporation</label>
                            <input type="text" name="panchayat" class="form-control" id="panchayat">
                            <span id="panchayatError" class="text-danger"></span> <!-- Error message for panchayat -->
                        </div>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="block">Block</label>
                                    <input type="text" name="block" class="form-control" id="block">
                                    <span id="blockError" class="text-danger"></span> <!-- Error message for block -->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="district">District</label>
                                    <input type="text" name="district" class="form-control" id="district">
                                    <span id="districtError" class="text-danger"></span> <!-- Error message for district -->
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="state">State</label>
                                    <input type="text" name="state" class="form-control" id="state">
                                    <span id="stateError" class="text-danger"></span> <!-- Error message for state -->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="pin_code">Pin Code</label>
                                    <input type="text" name="pin_code" class="form-control" id="pin_code">
                                    <span id="pin_codeError" class="text-danger"></span> <!-- Error message for pin code -->
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="contact_1">Contact Number 1</label>
                                    <input type="text" name="contact_1" class="form-control" id="contact_1">
                                    <span id="contact_1Error" class="text-danger"></span> <!-- Error message for contact 1 -->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="contact_2">Contact Number 2</label>
                                    <input type="text" name="contact_2" class="form-control" id="contact_2">
                                    <span id="contact_2Error" class="text-danger"></span> <!-- Error message for contact 2 -->
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label>Sex of Applicant</label><br>
                                    <input type="radio" name="sex" value="Male" id="male">
                                    <label for="male">Male</label>
                                    <input type="radio" name="sex" value="Female" id="female">
                                    <label for="female">Female</label>
                                    <span id="sexError" class="text-danger"></span> <!-- Error message for sex -->
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="status">Status of Applicant</label>
                                <select name="status" class="form-select">
                                    <option value="With family">With family</option>
                                    <option value="Widow">Widow</option>
                                    <option value="Single">Single</option>
                                    <option value="Orphan">Orphan</option>
                                    <option value="Chronic deceased">Chronic deceased</option>
                                    <option value="Other">Other</option>
                                </select>
                                <span id="statusError" class="text-danger"></span> <!-- Error message for status -->
                            </div>
                        </div>
                
                        <div class="form-group mb-3">
                            <label for="education">Education Level of the Applicant</label>
                            <input type="text" name="education" class="form-control" id="education">
                            <span id="educationError" class="text-danger"></span> <!-- Error message for education -->
                        </div>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="male_members">Male Family Members</label>
                                    <input type="number" name="male_members" class="form-control" id="male_members">
                                    <span id="male_membersError" class="text-danger"></span> <!-- Error message for male members -->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="female_members">Female Family Members</label>
                                    <input type="number" name="female_members" class="form-control" id="female_members">
                                    <span id="female_membersError" class="text-danger"></span> <!-- Error message for female members -->
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group mb-3">
                            <label for="total_members">Total Family Members</label>
                            <input type="number" name="total_members" class="form-control" id="total_members">
                            <span id="total_membersError" class="text-danger"></span> <!-- Error message for total members -->
                        </div>
                
                        <div class="form-group mb-3">
                            <label for="earning_members">No. of Earning Members in the Family</label>
                            <input type="number" name="earning_members" class="form-control" id="earning_members">
                            <span id="earning_membersError" class="text-danger"></span> <!-- Error message for earning members -->
                        </div>
                
                        <div class="form-group mb-3">
                            <label for="average_income">Average Monthly Income</label>
                            <input type="number" name="average_income" class="form-control" id="average_income">
                            <span id="average_incomeError" class="text-danger"></span> <!-- Error message for average income -->
                        </div>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="applying_for">Applying for</label>
                                    <input type="text" name="applying_for" class="form-control" id="applying_for">
                                    <span id="applying_forError" class="text-danger"></span> <!-- Error message for applying for -->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="monthly_income">Monthly Income</label>
                                    <input type="number" name="monthly_income" class="form-control" id="monthly_income">
                                    <span id="monthly_incomeError" class="text-danger"></span> <!-- Error message for monthly income -->
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="recommended_by">Recommended by</label>
                                    <input type="text" name="recommended_by" class="form-control" id="recommended_by">
                                    <span id="recommended_byError" class="text-danger"></span> <!-- Error message for recommended by -->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" id="phone_number">
                                    <span id="phone_numberError" class="text-danger"></span> <!-- Error message for phone number -->
                                </div>
                            </div>
                        </div>
                
                        @if(Auth::user()->role === 1 || Auth::user()->role === 2)
                        <h4 style="width:250px;margin-left:250px">For Office Use Only</h4>
                        <div class="row d-flex">
                            <div class="col-10">
                                <select name="type_of_application" id="" class="form-select">
                                    <option value="">Select Type Of Application</option>
                                    @foreach($types as $type)
                                    <option value="{{ $type->typeId }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                                <span id="type_of_applicationError" class="text-danger"></span> <!-- Error message for type of application -->
                            </div>
                            <div class="col-2 mt-0">
                                <button type="button" class="btn but rounded-circle" data-bs-toggle="modal" data-bs-target="#TypeOfApp">
                                    <i class="bi bi-plus-lg fs-5"></i>
                                </button>
                            </div>
                        </div>
                        @endif
                
                        <div class="row mt-3">
                            <div class="col-5"></div>
                            <div class="col-4">
                                <button type="submit" class="btn but">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
                
               </div>
                </div>
            </div>
        </div>

          <div class="modal fade" id="TypeOfApp" tabindex="-1" aria-labelledby="TypeOfAppLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header but">
                                                <h1 class="modal-title fs-5 text-light" id="TypeOfAppLabel">Add Type Of Application</h1>
                                                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-4" id="SubCategoryDetails">
                                            <form id="apptypeForm" method="POST">
                                             @csrf
                                            <label for="">Type of Application</label>
                                            <input type="text" name="type" class="form-control">
                                            <span id="typeError" class="text-danger"></span>
                                            <div class="row">
                                                <div class="col-5"></div>
                                                <div class="col-4">
                                                    <button type="submit" class="btn but mt-3">Add</button>
                                                </div>
                                            </div>
                                            
                                            </form>
                                            </div>
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

                        <h4 class="but p-3 rounded fw-bold border border-success text-center" style="color:white;">GENERAL PROJECT APPLICATIONS</h4>
            
                    </div>
                </div>
            </div>
            <div class="card-body">               
                   <table id="generalTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                   <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Ward</th>
                            <th>Post</th>
                            <th>Village</th>
                            <th>Panchayat/Municipality/Corporation</th>
                            <th>Block</th>
                            <th>District</th>
                            <th>State</th>
                            <th>Pin Code</th>
                            <th>Contact Number 1</th>
                            <th>Contact Number 2</th>
                            <th>Sex</th>
                            <th>Status</th>
                            <th>Education Level</th>
                            <th>Male Family Members</th>
                            <th>Female Family Members</th>
                            <th>Total Family Members</th>
                            <th>No. of Earning Members</th>
                            <th>Average Monthly Income</th>
                            <th>Applying For</th>
                            <th>Monthly Income</th>
                            <th>Recommended By</th>
                            <th>Phone Number</th>
                            <th>Type Of Application</th>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">General Project Application
          </h1>
          <button type="button" class="btn-close customclose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="viewMoreModalBody">
          
        </div>
       
      </div>
    </div>
  </div> 
  
  <!-- edit form -->
  
  <div class="modal fade" id="EditgeneralModal" tabindex="-1" aria-labelledby="EditgeneralModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">General Project Welfare Application</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
       <div class="modal-body p-4 EditgeneralModalBody">
       
        <form id="EditgeneralForm">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                            <span id="nameError" class="text-danger"></span> <!-- Error message for name -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="age">Age</label>
                            <input type="number" name="age" class="form-control" id="age">
                            <span id="ageError" class="text-danger"></span> <!-- Error message for age -->
                        </div>
                    </div>
                </div>
        
                <div class="form-group mb-3">
                    <label for="address">Current Mailing Address</label>
                    <input type="text" name="address" class="form-control" id="address">
                    <span id="addressError" class="text-danger"></span> <!-- Error message for address -->
                </div>
        
                <div class="row">
                    <div class="col-4">
                        <div class="form-group mb-3">
                            <label for="ward">Ward</label>
                            <input type="text" name="ward" class="form-control" id="ward">
                            <span id="wardError" class="text-danger"></span> <!-- Error message for ward -->
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-3">
                            <label for="po">POST</label>
                            <input type="text" name="po" class="form-control" id="po">
                            <span id="poError" class="text-danger"></span> <!-- Error message for post -->
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-3">
                            <label for="village">Village</label>
                            <input type="text" name="village" class="form-control" id="village">
                            <span id="villageError" class="text-danger"></span> <!-- Error message for village -->
                        </div>
                    </div>
                </div>
        
                <div class="form-group mb-3">
                    <label for="panchayat">Panchayat/Municipality/Corporation</label>
                    <input type="text" name="panchayat" class="form-control" id="panchayat">
                    <span id="panchayatError" class="text-danger"></span> <!-- Error message for panchayat -->
                </div>
        
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="block">Block</label>
                            <input type="text" name="block" class="form-control" id="block">
                            <span id="blockError" class="text-danger"></span> <!-- Error message for block -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="district">District</label>
                            <input type="text" name="district" class="form-control" id="district">
                            <span id="districtError" class="text-danger"></span> <!-- Error message for district -->
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="state">State</label>
                            <input type="text" name="state" class="form-control" id="state">
                            <span id="stateError" class="text-danger"></span> <!-- Error message for state -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="pin_code">Pin Code</label>
                            <input type="text" name="pin_code" class="form-control" id="pin_code">
                            <span id="pin_codeError" class="text-danger"></span> <!-- Error message for pin code -->
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="contact_1">Contact Number 1</label>
                            <input type="text" name="contact_1" class="form-control" id="contact_1">
                            <span id="contact_1Error" class="text-danger"></span> <!-- Error message for contact 1 -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="contact_2">Contact Number 2</label>
                            <input type="text" name="contact_2" class="form-control" id="contact_2">
                            <span id="contact_2Error" class="text-danger"></span> <!-- Error message for contact 2 -->
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label>Sex of Applicant</label><br>
                            <input type="radio" name="sex" value="Male" id="male">
                            <label for="male">Male</label>
                            <input type="radio" name="sex" value="Female" id="female">
                            <label for="female">Female</label>
                            <span id="sexError" class="text-danger"></span> <!-- Error message for sex -->
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="status">Status of Applicant</label>
                        <select name="status" class="form-select" id="status">
                            <option value="With family">With family</option>
                            <option value="Widow">Widow</option>
                            <option value="Single">Single</option>
                            <option value="Orphan">Orphan</option>
                            <option value="Chronic deceased">Chronic deceased</option>
                            <option value="Other">Other</option>
                        </select>
                        <span id="statusError" class="text-danger"></span> <!-- Error message for status -->
                    </div>
                </div>
        
                <div class="form-group mb-3">
                    <label for="education">Education Level of the Applicant</label>
                    <input type="text" name="education" class="form-control" id="education">
                    <span id="educationError" class="text-danger"></span> <!-- Error message for education -->
                </div>
        
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="male_members">Male Family Members</label>
                            <input type="number" name="male_members" class="form-control" id="male_members">
                            <span id="male_membersError" class="text-danger"></span> <!-- Error message for male members -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="female_members">Female Family Members</label>
                            <input type="number" name="female_members" class="form-control" id="female_members">
                            <span id="female_membersError" class="text-danger"></span> <!-- Error message for female members -->
                        </div>
                    </div>
                </div>
        
                <div class="form-group mb-3">
                    <label for="total_members">Total Family Members</label>
                    <input type="number" name="total_members" class="form-control" id="total_members">
                    <span id="total_membersError" class="text-danger"></span> <!-- Error message for total members -->
                </div>
        
                <div class="form-group mb-3">
                    <label for="earning_members">No. of Earning Members in the Family</label>
                    <input type="number" name="earning_members" class="form-control" id="earning_members">
                    <span id="earning_membersError" class="text-danger"></span> <!-- Error message for earning members -->
                </div>
        
                <div class="form-group mb-3">
                    <label for="average_income">Average Monthly Income</label>
                    <input type="number" name="average_income" class="form-control" id="average_income">
                    <span id="average_incomeError" class="text-danger"></span> <!-- Error message for average income -->
                </div>
        
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="applying_for">Applying for</label>
                            <input type="text" name="applying_for" class="form-control" id="applying_for">
                            <span id="applying_forError" class="text-danger"></span> <!-- Error message for applying for -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="monthly_income">Monthly Income</label>
                            <input type="number" name="monthly_income" class="form-control" id="monthly_income">
                            <span id="monthly_incomeError" class="text-danger"></span> <!-- Error message for monthly income -->
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="recommended_by">Recommended by</label>
                            <input type="text" name="recommended_by" class="form-control" id="recommended_by">
                            <span id="recommended_byError" class="text-danger"></span> <!-- Error message for recommended by -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number">
                            <span id="phone_numberError" class="text-danger"></span> <!-- Error message for phone number -->
                        </div>
                    </div>
                </div>
        
                @if(Auth::user()->role === 1 || Auth::user()->role === 2)
                <h4 style="width:250px;margin-left:250px">For Office Use Only</h4>
                <div class="row d-flex">
                    <div class="col-10">
                        <select name="type_of_application" id="" class="form-select">
                            <option value="">Select Type Of Application</option>
                            @foreach($types as $type)
                            <option value="{{ $type->typeId }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                        <span id="type_of_applicationError" class="text-danger"></span> <!-- Error message for type of application -->
                    </div>
                    <div class="col-2 mt-0">
                        <button type="button" class="btn but rounded-circle" data-bs-toggle="modal" data-bs-target="#TypeOfApp">
                            <i class="bi bi-plus-lg fs-4"></i>
                        </button>
                    </div>
                </div>
                @endif
        
                <div class="row mt-3">
                    <div class="col-5"></div>
                    <div class="col-4">
                        <input type="hidden" name="generalId">
                        <button type="submit" class="btn but">Submit</button>
                    </div>
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
    $('#generalTable').DataTable({
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
            url: `{{ url('/user/application/general/project/datatable') }}`,
            type: 'GET',
            dataSrc: 'data',
        },
        columns: [       
            { data: 'name' },
            { data: 'age' },
            { data: 'address' },
            { data: 'ward' },
            { data: 'po' },
            { data: 'village' },
            { data: 'panchayat' },
            { data: 'block' },
            { data: 'district' },
            { data: 'state' },
            { data: 'pin_code' },
            { data: 'contact_1' },
            { data: 'contact_2' },
            { data: 'sex' },
            { data: 'status' },
            { data: 'education' },
            { data: 'male_members' },
            { data: 'female_members' },
            { data: 'total_members' },
            { data: 'earning_members' },
            { data: 'average_income' },
            { data: 'applying_for' },
            { data: 'monthly_income' },
            { data: 'recommended_by' },
            { data: 'phone_number' },
            { data: 'type_of_application' }, // Include welfare_assistance field
         
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return `
                    <div class="dd d-flex">
                        <button class="btn btn-primary btn-sm view-more me-1" data-id="${row.generalId}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <button class="btn btn-warning btn-sm edit me-1" data-id="${row.generalId}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete" data-id="${row.generalId}" data-name="${row.name}">
                            <i class="bi bi-trash"></i>
                        </button>                       
                    </div>`;
                } 
            },
        ]
    });
});

    $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#apptypeForm').on('submit', function(e) {
        e.preventDefault();

        // Clear previous error messages
        $('.text-danger').text('');

        $.ajax({
            url: `{{ url('/user/application/general/type/new') }}`,
            type: 'POST',
            data: $(this).serialize(), // Serialize form data
            
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#TypeOfApp').modal('hide');
                // Optionally refresh a data table or perform another action
                // $('#sweetwaterTable').DataTable().ajax.reload();
            },
            error: function(response) {
                if (response.status === 422) { // Validation errors
                    let errors = response.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('#' + key + 'Error').text(value[0]); // Display error message
                    });
                } else {
                    toastr.error('An unexpected error occurred. Please try again.', 'Error');
                }
            }
        });
    });
});

//do general project 

    $(document).ready(function() {
    $('#generalForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = $(this).serialize();

        $.ajax({
            url: `{{ url('/user/application/general/project/new') }}`, // Your endpoint
            type: 'POST',
            data: formData,
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#generalModal').modal('hide');
                $('#generalTable').DataTable().ajax.reload();
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
   
//view more general project

$(document).on('click', '.view-more', function() {
    const generalId = $(this).data('id');
    console.log('Clicked family ID:', generalId);

    if (generalId !== undefined) {
        $.ajax({
            url: `{{ url('/user/application/general/project/view/more/') }}/${generalId}`, // Laravel route
            method: 'GET',
            success: function(response) {
                console.log('Response data:', response);

                 const data = response;
     const requiredKeys = [
    'name',
    'age',
    'address',
    'ward',
    'po',
    'village',
    'panchayat',
    'block',
    'district',
    'state',
    'pin_code',
    'contact_1',
    'contact_2',
    'sex',
    'status',
    'education',
    'male_members',
    'female_members',
    'total_members',
    'earning_members',
    'average_income',
    'applying_for',
    'monthly_income',
    'recommended_by',
    'phone_number',
   'type_of_application',
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


//edit general project
$(document).on('click', '.edit', function() {
const generalId = $(this).data('id'); // Assuming the edit button has a data-id attribute
$.get(`{{ url('/user/application/general/project/edit') }}/${generalId}`, function(data) {
// Fill the form with data
$('input[name="generalId"]').val(data.generalId);
$('input[name="name"]').val(data.name);
$('input[name="age"]').val(data.age);
$('input[name="address"]').val(data.address);
$('input[name="ward"]').val(data.ward);
$('input[name="po"]').val(data.po);
$('input[name="village"]').val(data.village);
$('input[name="panchayat"]').val(data.panchayat);
$('input[name="block"]').val(data.block);
$('input[name="district"]').val(data.district);
$('input[name="state"]').val(data.state);
$('input[name="pin_code"]').val(data.pin_code);
$('input[name="contact_1"]').val(data.contact_1);
$('input[name="contact_2"]').val(data.contact_2);
$('input[name="sex"][value="' + data.sex + '"]').prop('checked', true); // For radio buttons
$('select[name="status"]').val(data.status);
$('input[name="education"]').val(data.education);
$('input[name="male_members"]').val(data.male_members);
$('input[name="female_members"]').val(data.female_members);
$('input[name="total_members"]').val(data.total_members);
$('input[name="earning_members"]').val(data.earning_members);
$('input[name="average_income"]').val(data.average_income);
$('input[name="applying_for"]').val(data.applying_for);
$('input[name="monthly_income"]').val(data.monthly_income);
$('input[name="recommended_by"]').val(data.recommended_by);
$('input[name="phone_number"]').val(data.phone_number);
$('select[name="type_of_application"]').val(data.type_of_application);
$('#EditgeneralModal').modal('show'); // Ensure the modal ID matches
});
}); 

// update general project 
$(document).ready(function() {
    $('#EditgeneralForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        let formData = $(this).serializeArray();

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('user.updateGeneral') }}",
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


//delete general project
$(document).on('click', '.delete', function() {
    const generalId = $(this).data('id');
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
            url: `{{ url('/user/application/general/project/delete/') }}/${generalId}`,
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
                $('#generalTable').DataTable().ajax.reload();
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





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
            <a href="{{ route('user.getConstruction')}}" class="btn btn-success btn-sm rounded-circle"><i class="bi bi-box-arrow-in-left fs-4 ms-1"></i></a>
        </div>
        <div class="float-end d-none d-md-block">
            <button type="button" class="btn btn-success mb-1 me-3 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#houseModal">
                <i class="bi bi-person-plus-fill fs-5"></i>
            </button>
        </div>
    </div>
            <div class="row">
                <div class="col-12">
        
          
        <div class="modal fade" id="houseModal" tabindex="-1" aria-labelledby="houseModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header box">
                        <h1 class="modal-title fs-5 text-light" id="houseModalLabel">Dream Home Application Form</h1>
                        <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
               <div class="modal-body p-4 houseModalBody">
    <form id="houseForm" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" id="name">
                    <span id="nameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="age">Age:</label>
                    <input type="number" name="age" class="form-control" id="age">
                    <span id="ageError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="fathersName">Father's Name:</label>
                    <input type="text" name="fathersName" class="form-control" id="fathersName">
                    <span id="fathersNameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="mothersName">Mother's Name:</label>
                    <input type="text" name="mothersName" class="form-control" id="mothersName">
                    <span id="mothersNameError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="houseName">House Name:</label>
                    <input type="text" name="houseName" class="form-control" id="houseName">
                    <span id="houseNameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="location">Location:</label>
                    <input type="text" name="location" class="form-control" id="location">
                    <span id="locationError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="panchayat">Panchayat:</label>
                    <input type="text" name="panchayat" class="form-control" id="panchayat">
                    <span id="panchayatError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="po">P.O.:</label>
                    <input type="text" name="po" class="form-control" id="po">
                    <span id="poError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="form-group mb-3">
                    <label for="state">District</label>
                    <input type="text" name="district" class="form-control" id="district">
                    <span id="districtError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    <label for="state">State:</label>
                    <input type="text" name="state" class="form-control" id="state">
                    <span id="stateError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    <label for="pinCode">Pin Code:</label>
                    <input type="text" name="pinCode" class="form-control" id="pinCode">
                    <span id="pinCodeError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="mobile1">Mobile 1:</label>
                    <input type="tel" name="mobile1" class="form-control" id="mobile1">
                    <span id="mobile1Error" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="mobile2">Mobile 2:</label>
                    <input type="tel" name="mobile2" class="form-control" id="mobile2">
                    <span id="mobile2Error" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label>Applicant:</label><br>
                    <input type="radio" id="male" name="applicant" value="male" class="form-check-input">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="applicant" value="female" class="form-check-input">
                    <label for="female">Female</label><br>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="education">Educational Qualification:</label>
                    <input type="text" name="education" class="form-control" id="education">
                    <span id="educationError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label>Married:</label><br>
                    <input type="radio" id="marriedYes" name="married" value="yes" class="form-check-input">
                    <label for="marriedYes">Yes</label><br>
                    <input type="radio" id="marriedNo" name="married" value="no" class="form-check-input">
                    <label for="marriedNo">No</label><br>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="childrenCount">Number of Children:</label>
                    <input type="number" name="childrenCount" class="form-control" id="childrenCount">
                    <span id="childrenCountError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="maleChildren">Male Children:</label>
                    <input type="number" name="maleChildren" class="form-control" id="maleChildren">
                    <span id="maleChildrenError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="femaleChildren">Female Children:</label>
                    <input type="number" name="femaleChildren" class="form-control" id="femaleChildren">
                    <span id="femaleChildrenError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label>Occupation:</label><br>
                    <input type="radio" id="occupationYes" name="occupation" value="yes" class="form-check-input">
                    <label for="occupationYes">Yes</label><br>
                    <input type="radio" id="occupationNo" name="occupation" value="no" class="form-check-input">
                    <label for="occupationNo">No</label><br>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="monthlyIncome">Monthly Income:</label>
                    <input type="number" name="monthlyIncome" class="form-control" id="monthlyIncome">
                    <span id="monthlyIncomeError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="otherIncome">Other Source of Income:</label>
                    <input type="text" name="otherIncome" class="form-control" id="otherIncome">
                    <span id="otherIncomeError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="healthStatus">Health Status:</label>
                    <select name="healthStatus" class="form-control" id="healthStatus">
                        <option value="satisfactory">Satisfactory</option>
                        <option value="chronically ill">Chronically Ill</option>
                        <option value="differently abled">Differently Abled</option>
                    </select>
                    <span id="healthStatusError" class="text-danger"></span>
                </div>
            </div>         

        </div>
        <div class="row">
            <div class="col-12">
              
                    <div class="form-group mb-3">
                        <label for="otherIncome">Explanation if daily treatment is required</label>
                        <textarea name="dailyTreatment" id=""  class="form-control" cols="30" rows="5"></textarea>
                        <span id="dailytreatmentError" class="text-danger"></span>
                 
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="accommodation">Accommodation Details:</label>
                    <select name="accommodation" class="form-control" id="accommodation">
                        <option value="own house">Own House</option>
                        <option value="ancestral home">Ancestral Home</option>
                        <option value="rental home">Rental Home</option>
                        <option value="other">Other</option>
                    </select>
                    <span id="accommodationError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label>Have your own place?</label><br>
                    <input type="radio" id="ownPlaceYes" name="ownPlace" value="yes" class="form-check-input">
                    <label for="ownPlaceYes">Yes</label><br>
                    <input type="radio" id="ownPlaceNo" name="ownPlace" value="no" class="form-check-input">
                    <label for="ownPlaceNo">No</label><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="form-group mb-3">
                    <label for="typeOfLand">If So How Many</label>
                    <input type="text" name="measureOfLand" class="form-control" id="measureOfLand">
                    <span id="measureOfLandError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    <label for="typeOfLand">Type of Land:</label>
                    <input type="text" name="typeOfLand" class="form-control" id="typeOfLand">
                    <span id="typeOfLandError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group mb-3">
                    <label for="desiredModel">Desired Model:</label>
                    <select name="desiredModel" class="form-select">
                        <option value="">Select Desired Model</option>
                        <option value="1 BHK">1 BHK</option>
                        <option value="2 BHK">2 BHK</option>
                        <option value="3 BHK">3 BHK</option>
                    </select>
                    <span id="desiredModelError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="totalSqrFt">Total Sqr ft:</label>
                    <input type="number" name="totalSqrFt" class="form-control" id="totalSqrFt">
                    <span id="totalSqrFtError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="expectedAmount">Expected Amount:</label>
                    <input type="number" name="expectedAmount" class="form-control" id="expectedAmount">
                    <span id="expectedAmountError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="permission">Permission:</label><br>
                    <input type="radio" id="permissionYes" name="permission" value="yes" class="form-check-input">
                    <label for="permissionYes">Yes</label><br>
                    <input type="radio" id="permissionNo" name="permission" value="no" class="form-check-input">
                    <label for="permissionNo">No</label><br>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="formOfIntendedHouse">Form of Intended House:</label>
                    <select name="formOfIntendedHouse" class="form-control" id="formOfIntendedHouse">
                        <option value="sheet">Sheet</option>
                        <option value="concrete">Concrete</option>
                        <option value="2bhk">Oat House</option>
                        <option value="flat">Flat</option>
                    </select>
                    <span id="formOfIntendedHouseError" class="text-danger"></span>
                </div>
            </div>
        </div>
        @if(Auth::user()->role ===1 || Auth::user()->role ===2)
        <div class="row">
            <div class="col-6">
                <label for="">For Officec Use</label>
                <select name="officeUse" id="" class="form-select">
                    <option value="Build house">Build house</option>
                    <option value="Rennovation">Rennovation</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
        @endif

        <div class="text-center mt-4">
            <div class="row">
                <div class="col-4"></div>
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
            </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                         
                            <div class="row">
                            
                                <div class="col-12">
            
                                    <h4 class="but p-3 rounded fw-bold border border-success text-center" style="color:white;">DREAM HOME PROJECT APPLICATIONS</h4>
                        
                                </div>
                            </div>
                        </div>
                        <div class="card-body">               
                               <table id="houseTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Father's Name</th>
                                        <th>Mother's Name</th>
                                        <th>House Name</th>
                                        <th>Location</th>
                                        <th>Panchayat</th>
                                        <th>P.O.</th>
                                        <th>District</th>
                                        <th>State</th>
                                        <th>Pin Code</th>
                                        <th>Mobile 1</th>
                                        <th>Mobile 2</th>
                                        <th>Applicant</th>
                                        <th>Education</th>
                                        <th>Married</th>
                                        <th>Number of Children</th>
                                        <th>Male Children</th>
                                        <th>Female Children</th>
                                        <th>Occupation</th>
                                        <th>Monthly Income</th>
                                        <th>Other Source of Income</th>
                                        <th>Health Status</th>
                                        <th>Daily Treatment Explanation</th>
                                        <th>Accommodation Details</th>
                                        <th>Own Place</th>
                                        <th>Measure of Land</th>
                                        <th>Type of Land</th>
                                        <th>Desired Model</th>
                                        <th>Total Sqr Ft</th>
                                        <th>Expected Amount</th>
                                        <th>Permission</th>
                                        <th>Form of Intended House</th>
                                        <th>Office Use</th>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">HouseWelfare Application
          </h1>
          <button type="button" class="btn-close customclose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="viewMoreModalBody">
          
        </div>
       
      </div>
    </div>
  </div>  


<!-- Edit shop and others -->
<div class="modal fade" id="EdithouseModal" tabindex="-1" aria-labelledby="EdithouseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">house and Others Under Construction</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
       <div class="modal-body p-4 EdithouseModalBody">


<h4 style="margin-left: 200px">Applicant/Committee Description Form</h4>
<form id="EdithouseForm" method="post">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name">
                <span id="nameError" class="text-danger"></span>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="age">Age:</label>
                <input type="number" name="age" class="form-control" id="age">
                <span id="ageError" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="fathersName">Father's Name:</label>
                <input type="text" name="fathersName" class="form-control" id="fathersName">
                <span id="fathersNameError" class="text-danger"></span>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="mothersName">Mother's Name:</label>
                <input type="text" name="mothersName" class="form-control" id="mothersName">
                <span id="mothersNameError" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="houseName">House Name:</label>
                <input type="text" name="houseName" class="form-control" id="houseName">
                <span id="houseNameError" class="text-danger"></span>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="location">Location:</label>
                <input type="text" name="location" class="form-control" id="location">
                <span id="locationError" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="panchayat">Panchayat:</label>
                <input type="text" name="panchayat" class="form-control" id="panchayat">
                <span id="panchayatError" class="text-danger"></span>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="po">P.O.:</label>
                <input type="text" name="po" class="form-control" id="po">
                <span id="poError" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="state">District</label>
                <input type="text" name="district" class="form-control" id="district">
                <span id="districtError" class="text-danger"></span>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="state">State:</label>
                <input type="text" name="state" class="form-control" id="state">
                <span id="stateError" class="text-danger"></span>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="pinCode">Pin Code:</label>
                <input type="text" name="pinCode" class="form-control" id="pinCode">
                <span id="pinCodeError" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="mobile1">Mobile 1:</label>
                <input type="tel" name="mobile1" class="form-control" id="mobile1">
                <span id="mobile1Error" class="text-danger"></span>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="mobile2">Mobile 2:</label>
                <input type="tel" name="mobile2" class="form-control" id="mobile2">
                <span id="mobile2Error" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label>Applicant:</label><br>
                <input type="radio" id="male" name="applicant" value="male" class="form-check-input">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="applicant" value="female" class="form-check-input">
                <label for="female">Female</label><br>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="education">Educational Qualification:</label>
                <input type="text" name="education" class="form-control" id="education">
                <span id="educationError" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label>Married:</label><br>
                <input type="radio" id="marriedYes" name="married" value="yes" class="form-check-input">
                <label for="marriedYes">Yes</label><br>
                <input type="radio" id="marriedNo" name="married" value="no" class="form-check-input">
                <label for="marriedNo">No</label><br>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="childrenCount">Number of Children:</label>
                <input type="number" name="childrenCount" class="form-control" id="childrenCount">
                <span id="childrenCountError" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="maleChildren">Male Children:</label>
                <input type="number" name="maleChildren" class="form-control" id="maleChildren">
                <span id="maleChildrenError" class="text-danger"></span>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="femaleChildren">Female Children:</label>
                <input type="number" name="femaleChildren" class="form-control" id="femaleChildren">
                <span id="femaleChildrenError" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label>Occupation:</label><br>
                <input type="radio" id="occupationYes" name="occupation" value="yes" class="form-check-input">
                <label for="occupationYes">Yes</label><br>
                <input type="radio" id="occupationNo" name="occupation" value="no" class="form-check-input">
                <label for="occupationNo">No</label><br>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="monthlyIncome">Monthly Income:</label>
                <input type="number" name="monthlyIncome" class="form-control" id="monthlyIncome">
                <span id="monthlyIncomeError" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="otherIncome">Other Source of Income:</label>
                <input type="text" name="otherIncome" class="form-control" id="otherIncome">
                <span id="otherIncomeError" class="text-danger"></span>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="healthStatus">Health Status:</label>
                <select name="healthStatus" class="form-control" id="healthStatus">
                    <option value="satisfactory">Satisfactory</option>
                    <option value="chronically ill">Chronically Ill</option>
                    <option value="differently abled">Differently Abled</option>
                </select>
                <span id="healthStatusError" class="text-danger"></span>
            </div>
        </div>         

    </div>
    <div class="row">
        <div class="col-12">
          
                <div class="form-group mb-3">
                    <label for="otherIncome">Explanation if daily treatment is required</label>
                    <textarea name="dailyTreatment" id=""  class="form-control" cols="30" rows="5"></textarea>
                    <span id="dailytreatmentError" class="text-danger"></span>
             
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="accommodation">Accommodation Details:</label>
                <select name="accommodation" class="form-control" id="accommodation">
                    <option value="own house">Own House</option>
                    <option value="ancestral home">Ancestral Home</option>
                    <option value="rental home">Rental Home</option>
                    <option value="other">Other</option>
                </select>
                <span id="accommodationError" class="text-danger"></span>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label>Have your own place?</label><br>
                <input type="radio" id="ownPlaceYes" name="ownPlace" value="yes" class="form-check-input">
                <label for="ownPlaceYes">Yes</label><br>
                <input type="radio" id="ownPlaceNo" name="ownPlace" value="no"class="form-check-input">
                <label for="ownPlaceNo">No</label><br>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="typeOfLand">If So How Many</label>
                <input type="text" name="measureOfLand" class="form-control" id="measureOfLand">
                <span id="measureOfLandError" class="text-danger"></span>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="typeOfLand">Type of Land:</label>
                <input type="text" name="typeOfLand" class="form-control" id="typeOfLand">
                <span id="typeOfLandError" class="text-danger"></span>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="desiredModel">Desired Model:</label>
                <select name="desiredModel" class="form-select">
                    <option value="">Select Desired Model</option>
                    <option value="1 BHK">1 BHK</option>
                    <option value="2 BHK">2 BHK</option>
                    <option value="3 BHK">3 BHK</option>
                </select>
                <span id="desiredModelError" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="totalSqrFt">Total Sqr ft:</label>
                <input type="number" name="totalSqrFt" class="form-control" id="totalSqrFt">
                <span id="totalSqrFtError" class="text-danger"></span>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="expectedAmount">Expected Amount:</label>
                <input type="number" name="expectedAmount" class="form-control" id="expectedAmount">
                <span id="expectedAmountError" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="permission">Permission:</label><br>
                <input type="radio" id="permissionYes" name="permission" value="yes" class="form-check-input">
                <label for="permissionYes">Yes</label><br>
                <input type="radio" id="permissionNo" name="permission" value="no" class="form-check-input">
                <label for="permissionNo">No</label><br>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="formOfIntendedHouse">Form of Intended House:</label>
                <select name="formOfIntendedHouse" class="form-control" id="formOfIntendedHouse">
                    <option value="sheet">Sheet</option>
                    <option value="concrete">Concrete</option>
                    <option value="2bhk">Oat House</option>
                    <option value="flat">Flat</option>
                </select>
                <span id="formOfIntendedHouseError" class="text-danger"></span>
            </div>
        </div>
    </div>
    @if(Auth::user()->role ===1 || Auth::user()->role ===2)
    <div class="row">
        <div class="col-6">
            <label for="">For Officec Use</label>
            <select name="officeUse" id="" class="form-select">
                <option value="Build house">Build house</option>
                <option value="Rennovation">Rennovation</option>
                <option value="Others">Others</option>
            </select>
        </div>
    </div>
    @endif

    <div class="text-center mt-4">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <input type="hidden" name="houseId">
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
    $('#houseTable').DataTable({
        select: true,
        serverSide: false, 
        dom: 'Bfrtlip',
        buttons: [
            {
                extend: 'csvHtml5',
                text: 'Download Excel',
                title: 'Dream house Application',
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
            url: `{{ url('/user/construction/project/house/datatable') }}`,
            type: 'GET',
            dataSrc: 'data',
        },
        columns: [
          
    { data: 'name' },
    { data: 'age' },
    { data: 'fathersName' },
    { data: 'mothersName' },
    { data: 'houseName' },
    { data: 'location' },
    { data: 'panchayat' },
    { data: 'po' },
    { data: 'district' },
    { data: 'state' },
    { data: 'pinCode' },
    { data: 'mobile1' },
    { data: 'mobile2' },
    { data: 'applicant' },
    { data: 'education' },
    { data: 'married' },
    { data: 'childrenCount' },
    { data: 'maleChildren' },
    { data: 'femaleChildren' },
    { data: 'occupation' },
    { data: 'monthlyIncome' },
    { data: 'otherIncome' },
    { data: 'healthStatus' },
    { data: 'dailyTreatment' },
    { data: 'accommodation' },
    { data: 'ownPlace' },
    { data: 'measureOfLand' },
    { data: 'typeOfLand' },
    { data: 'desiredModel' },
    { data: 'totalSqrFt' },
    { data: 'expectedAmount' },
    { data: 'permission' },
    { data: 'formOfIntendedHouse' },
    { data: 'officeUse' },
    {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return `
                    <div class="dd d-flex">
                        <button class="btn btn-primary btn-sm view-more me-1" data-id="${row.houseId}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <button class="btn btn-warning btn-sm edit me-1" data-id="${row.houseId}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete" data-id="${row.houseId}" data-name="${row.name}">
                            <i class="bi bi-trash"></i>
                        </button>                       
                    </div>`;
                } 
            },
        ]
    });
});
  $(document).ready(function() {
    $('#houseForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = $(this).serialize();

        $.ajax({
            url: `{{ url('user/construction/project/house/new') }}`, // Your endpoint
            type: 'POST',
            data: formData,
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#houseModal').modal('hide');
                // $('#familyTable').DataTable().ajax.reload();
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

//view more 

$(document).on('click', '.view-more', function() {
    const houseId = $(this).data('id');
    console.log('Clicked HouseID:', houseId);

    if (houseId !== undefined) {
        $.ajax({
            url: `{{ url('/user/construction/project/house/view/more') }}/${houseId}`, // Laravel route
            method: 'GET',
            success: function(response) {
                console.log('Response data:', response);

                 const data = response;
                 const requiredKeys = [
    'name',
    'age',
    'fathersName',
    'mothersName',
    'houseName',
    'location',
    'panchayat',
    'po',
    'district',
    'state',
    'pinCode',
    'mobile1',
    'mobile2',
    'applicant',
    'education',
    'married',
    'childrenCount',
    'maleChildren',
    'femaleChildren',
    'occupation',
    'monthlyIncome',
    'otherIncome',
    'healthStatus',
    'dailyTreatment',
    'accommodation',
    'ownPlace',
    'measureOfLand',
    'typeOfLand',
    'desiredModel',
    'totalSqrFt',
    'expectedAmount',
    'permission',
    'formOfIntendedHouse',
    'officeUse',
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


//edit house 

$(document).on('click', '.edit', function() {
    const houseId = $(this).data('id'); // Assuming the edit button has a data-id attribute

$.get(`{{ url('/user/construction/project/house/edit') }}/${houseId}`, function(data) {
$('input[name="houseId"]').val(data.houseId);
$('input[name="name"]').val(data.name);
$('input[name="age"]').val(data.age);
$('input[name="fathersName"]').val(data.fathersName);
$('input[name="mothersName"]').val(data.mothersName);
$('input[name="houseName"]').val(data.houseName);
$('input[name="location"]').val(data.location);
$('input[name="panchayat"]').val(data.panchayat);
$('input[name="po"]').val(data.po);
$('input[name="district"]').val(data.district);
$('input[name="state"]').val(data.state);
$('input[name="pinCode"]').val(data.pinCode);
$('input[name="mobile1"]').val(data.mobile1);
$('input[name="mobile2"]').val(data.mobile2);
$('input[name="applicant"][value="' + data.applicant + '"]').prop('checked', true);
$('input[name="education"]').val(data.education);
$('input[name="married"][value="' + data.married + '"]').prop('checked', true);
$('input[name="childrenCount"]').val(data.childrenCount);
$('input[name="maleChildren"]').val(data.maleChildren);
$('input[name="femaleChildren"]').val(data.femaleChildren);
$('input[name="occupation"][value="' + data.occupation + '"]').prop('checked', true);
$('input[name="monthlyIncome"]').val(data.monthlyIncome);
$('input[name="otherIncome"]').val(data.otherIncome);
$('select[name="healthStatus"]').val(data.healthStatus);
$('textarea[name="dailyTreatment"]').val(data.dailyTreatment);
$('select[name="accommodation"]').val(data.accommodation);
$('input[name="ownPlace"][value="' + data.ownPlace + '"]').prop('checked', true);
$('input[name="measureOfLand"]').val(data.measureOfLand);
$('input[name="typeOfLand"]').val(data.typeOfLand);
$('select[name="desiredModel"]').val(data.desiredModel);
$('input[name="totalSqrFt"]').val(data.totalSqrFt);
$('input[name="expectedAmount"]').val(data.expectedAmount);
$('input[name="permission"][value="' + data.permission + '"]').prop('checked', true);
$('select[name="formOfIntendedHouse"]').val(data.formOfIntendedHouse);
$('select[name="officeUse"]').val(data.officeUse);
$('#EdithouseModal').modal('show');
    });
}); 

// update house form 

$(document).ready(function() {
    $('#EdithouseForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        let formData = $(this).serializeArray();

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('user.updateHouse') }}",
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
                    $('#EdithouseModal').modal('hide');
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

//delete house application 
$(document).on('click', '.delete', function() {
    const houseId = $(this).data('id');
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
            url: `{{ url('/user/construction/project/house/delete') }}/${houseId}`,
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
                $('#houseTable').DataTable().ajax.reload();
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




@extends('layouts.master')

@section('css')

<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('body')
    <body data-sidebar="light">
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('page_title') Data Tables @endslot
        @slot('subtitle') Tables @endslot
    @endcomponent 
    <div class="row">
        <div class="col-12">
    <div class="float-end d-none d-md-block"> 
        <button type="button" class="btn btn-success mb-1 float-end rounded-circle me-3" data-bs-toggle="modal" data-bs-target="#EducationCenterModal">
            <i class="bi bi-person-plus-fill fs-5"></i>
        </button>  
    </div>
        </div>       
    
        <div class="row">
            <div class="col-12">

    <!-- Modal -->
    <div class="modal fade" id="EducationCenterModal" tabindex="-1" aria-labelledby="MarkazOrphanCareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header box">
                    <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Education Center Application</h1>
                    <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <form id="EducationCentreApplicationForm" method="POST">
                        @csrf
                        <!-- Applicant Information -->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="applicantName">Name of Applicant</label>
                                    <input type="text" id="applicantName" name="applicantName" class="form-control">
                                    <span id="applicantNameError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="committeeName">Name of Committee</label>
                                    <input type="text" id="committeeName" name="committeeName" class="form-control">
                                    <span id="committeeNameError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="regNumber">Reg. Number</label>
                                    <input type="text" id="regNumber" name="regNumber" class="form-control">
                                    <span id="regNumberError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="year">Year</label>
                                    <input type="text" id="year" name="year" class="form-control">
                                    <span id="yearError" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="location">Location</label>
                                    <input type="text" id="location" name="location" class="form-control">
                                    <span id="locationError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="village">Village</label>
                                    <input type="text" id="village" name="village" class="form-control">
                                    <span id="villageError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="post">Post</label>
                                    <input type="text" id="post" name="post" class="form-control">
                                    <span id="postError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="panchayath">Panchayath</label>
                                    <input type="text" id="panchayath" name="panchayath" class="form-control">
                                    <span id="panchayathError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="district">District</label>
                                    <input type="text" id="district" name="district" class="form-control">
                                    <span id="districtError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" class="form-control">
                                    <span id="stateError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="contact1">Contact Number 1</label>
                                    <input type="text" id="contact1" name="contact1" class="form-control">
                                    <span id="contact1Error" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="contact2">Contact Number 2</label>
                                    <input type="text" id="contact2" name="contact2" class="form-control">
                                    <span id="contact2Error" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Previous Applications and Support -->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="submittedApplication">Submitted Application Before</label>
                                    <input type="text" id="submittedApplication" name="submittedApplication" class="form-control">
                                    <span id="submittedApplicationError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="financialSupport">Received Financial Support from RCFI</label>
                                    <input type="text" id="financialSupport" name="financialSupport" class="form-control">
                                    <span id="financialSupportError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Locality Details -->
                        <h5>Details of Locality of Proposed Project:</h5>
                    
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="mahalluName">Name of the Mahallu</label>
                                    <input type="text" id="mahalluName" name="mahalluName" class="form-control">
                                    <span id="mahalluNameError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="mahalluLocation">Location</label>
                                    <input type="text" id="mahalluLocation" name="mahalluLocation" class="form-control">
                                    <span id="mahalluLocationError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="mahalluVillage">Village</label>
                                    <input type="text" id="mahalluVillage" name="mahalluVillage" class="form-control">
                                    <span id="mahalluVillageError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="mahalluDistrict">District</label>
                                    <input type="text" id="mahalluDistrict" name="mahalluDistrict" class="form-control">
                                    <span id="mahalluDistrictError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="mahalluState">State</label>
                                    <input type="text" id="mahalluState" name="mahalluState" class="form-control">
                                    <span id="mahalluStateError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="noOfFamiliesInMahallu">No Of Families In Mahallu</label>
                                    <input type="text" id="noOfFamiliesInMahallu" name="noOfFamiliesInMahallu" class="form-control">
                                    <span id="noOfFamiliesInMahalluError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="requirementRepairing">Requirement (Repairing / New construction)</label>
                                    <input type="text" id="requirementRepairing" name="requirementRepairing" class="form-control">
                                    <span id="requirementRepairingError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <h5>Current Status:</h5>
                    
                        <div class="row">
                            <div class="col-6">
                                <label for="">Proposed Site Has Building</label><br>
                                <div class="col-6 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input type="radio" name="proposedSiteBuilding" id="proposedSiteBuildingYes" class="form-check-input" value="Yes"> 
                                        <label class="form-check-label" for="proposedSiteBuildingYes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="proposedSiteBuilding" id="proposedSiteBuildingNo" class="form-check-input" value="No">
                                        <label class="form-check-label" for="proposedSiteBuildingNo">
                                            No
                                        </label>
                                    </div>                 
                                </div>
                                <span id="proposedSiteBuildingError" class="text-danger" ></span>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="currentBuildingStatus">Status of Current Building</label>
                                    <input type="text" id="currentBuildingStatus" name="currentBuildingStatus" class="form-control">
                                    <span id="currentBuildingStatusError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label for="studentsNumber">Number of Students</label>
                                    <input type="text" id="studentsNumber" name="studentsNumber" class="form-control">
                                    <span id="studentsNumberError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label for="boysNumber">Boys</label>
                                    <input type="text" id="boysNumber" name="boysNumber" class="form-control">
                                    <span id="boysNumberError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label for="girlsNumber">Girls</label>
                                    <input type="text" id="girlsNumber" name="girlsNumber" class="form-control">
                                    <span id="girlsNumberError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label for="educationCenterNearby">Education Center Nearby</label>
                                    <input type="text" id="educationCenterNearby" name="educationCenterNearby" class="form-control">
                                    <span id="educationCenterNearbyError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="culturalCentreDistance">Distance to Nearby Cultural Centre (KM)</label>
                                    <input type="text" id="culturalCentreDistance" name="culturalCentreDistance" class="form-control">
                                    <span id="culturalCentreDistanceError" class="text-danger" ></span>
                                </div>
                            </div> 
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="syllabus">Syllabus</label>
                                    <input type="text" id="syllabus" name="syllabus" class="form-control">
                                    <span id="syllabusError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <h5>Proposed Project Details:</h5>
                    
                        <div class="row">                            
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <select id="projectType" name="projectType" class="form-select">
                                        <option value="">Select Project Type</option>
                                        <option value="orphanage">Orphanage</option>
                                        <option value="classRoom">Class Room</option>
                                        <option value="educationAcademy">Education Academy</option>
                                    </select>
                                    <span id="projectTypeError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="buildingArea">Area of Proposed Project - Building (Sq)</label>
                                    <input type="text" id="buildingArea" name="buildingArea" class="form-control">
                                    <span id="buildingAreaError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="landArea">Land Area (Sq)</label>
                                    <input type="text" id="landArea" name="landArea" class="form-control">
                                    <span id="landAreaError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="classroomsNumber">Number of Classrooms</label>
                                    <input type="text" id="classroomsNumber" name="classroomsNumber" class="form-control">
                                    <span id="classroomsNumberError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="numberOfStudents">Number of Students</label>
                                    <input type="text" id="numberOfStudents" name="numberOfStudents" class="form-control">
                                    <span id="numberOfStudentsError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="proposedBudget">Proposed Budget</label>
                                    <input type="text" id="proposedBudget" name="proposedBudget" class="form-control">
                                    <span id="proposedBudgetError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="legalApprovals">Status of Legal Approvals</label>
                                    <input type="text" id="legalApprovals" name="legalApprovals" class="form-control">
                                    <span id="legalApprovalsError" class="text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="area">Area</label>
                                    <input type="text" id="area" name="area" class="form-control">
                                    <span id="areaError" class="text-danger" ></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-1">
                                <button class="btn box mt-2" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>


<!-- view more Education Centre Application -->
<div class="modal fade" id="EducationCentreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header custommodal">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Education Centre Application</h1>
          <button type="button" class="btn-close customclose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="EducationCentreModalBody">
          
        </div>
       
      </div>
    </div>
  </div> 

  
<!--Edit Education Centre Application-->
<div class="modal fade" id="EditEducationCenterModal" tabindex="-1" aria-labelledby="EditEducationCenterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="EditEducationCenterModalLabel">Education Center Application</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5" id="EditEducationCenterModalBody">
                <form id="EditEducationCentreApplicationForm" method="POST">
                    @csrf
                    <!-- Applicant Information -->
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <input type="hidden" name="educationcentreId">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="applicantName">Name of Applicant</label>
                                <input type="text" id="applicantName" name="applicantName" class="form-control">
                                <span id="applicantNameError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="committeeName">Name of Committee</label>
                                <input type="text" id="committeeName" name="committeeName" class="form-control">
                                <span id="committeeNameError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="regNumber">Reg. Number</label>
                                <input type="text" id="regNumber" name="regNumber" class="form-control">
                                <span id="regNumberError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="year">Year</label>
                                <input type="text" id="year" name="year" class="form-control">
                                <span id="yearError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location" class="form-control">
                                <span id="locationError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="village">Village</label>
                                <input type="text" id="village" name="village" class="form-control">
                                <span id="villageError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="post">Post</label>
                                <input type="text" id="post" name="post" class="form-control">
                                <span id="postError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="panchayath">Panchayath</label>
                                <input type="text" id="panchayath" name="panchayath" class="form-control">
                                <span id="panchayathError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="district">District</label>
                                <input type="text" id="district" name="district" class="form-control">
                                <span id="districtError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" class="form-control">
                                <span id="stateError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="contact1">Contact Number 1</label>
                                <input type="text" id="contact1" name="contact1" class="form-control">
                                <span id="contact1Error" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="contact2">Contact Number 2</label>
                                <input type="text" id="contact2" name="contact2" class="form-control">
                                <span id="contact2Error" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <!-- Previous Applications and Support -->
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="submittedApplication">Submitted Application Before</label>
                                <input type="text" id="submittedApplication" name="submittedApplication" class="form-control">
                                <span id="submittedApplicationError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="financialSupport">Received Financial Support from RCFI</label>
                                <input type="text" id="financialSupport" name="financialSupport" class="form-control">
                                <span id="financialSupportError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <!-- Locality Details -->
                    <h5>Details of Locality of Proposed Project:</h5>
                
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="mahalluName">Name of the Mahallu</label>
                                <input type="text" id="mahalluName" name="mahalluName" class="form-control">
                                <span id="mahalluNameError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluLocation">Location</label>
                                <input type="text" id="mahalluLocation" name="mahalluLocation" class="form-control">
                                <span id="mahalluLocationError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluVillage">Village</label>
                                <input type="text" id="mahalluVillage" name="mahalluVillage" class="form-control">
                                <span id="mahalluVillageError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluDistrict">District</label>
                                <input type="text" id="mahalluDistrict" name="mahalluDistrict" class="form-control">
                                <span id="mahalluDistrictError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluState">State</label>
                                <input type="text" id="mahalluState" name="mahalluState" class="form-control">
                                <span id="mahalluStateError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="noOfFamiliesInMahallu">No Of Families In Mahallu</label>
                                <input type="text" id="noOfFamiliesInMahallu" name="noOfFamiliesInMahallu" class="form-control">
                                <span id="noOfFamiliesInMahalluError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="requirementRepairing">Requirement (Repairing / New construction)</label>
                                <input type="text" id="requirementRepairing" name="requirementRepairing" class="form-control">
                                <span id="requirementRepairingError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <h5>Current Status:</h5>
                
                    <div class="row">
                        <div class="col-6">
                            <label for="">Proposed Site Has Building</label><br>
                            <div class="col-6 d-flex justify-content-between">
                                <div class="form-check">
                                    <input type="radio" name="proposedSiteBuilding" id="proposedSiteBuildingYes" class="form-check-input" value="Yes"> 
                                    <label class="form-check-label" for="proposedSiteBuildingYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="proposedSiteBuilding" id="proposedSiteBuildingNo" class="form-check-input" value="No">
                                    <label class="form-check-label" for="proposedSiteBuildingNo">
                                        No
                                    </label>
                                </div>                 
                            </div>
                            <span id="proposedSiteBuildingError" class="text-danger" ></span>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="currentBuildingStatus">Status of Current Building</label>
                                <input type="text" id="currentBuildingStatus" name="currentBuildingStatus" class="form-control">
                                <span id="currentBuildingStatusError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label for="studentsNumber">Number of Students</label>
                                <input type="text" id="studentsNumber" name="studentsNumber" class="form-control">
                                <span id="studentsNumberError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label for="boysNumber">Boys</label>
                                <input type="text" id="boysNumber" name="boysNumber" class="form-control">
                                <span id="boysNumberError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label for="girlsNumber">Girls</label>
                                <input type="text" id="girlsNumber" name="girlsNumber" class="form-control">
                                <span id="girlsNumberError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group mb-3">
                                <label for="educationCenterNearby">Education Center Nearby</label>
                                <input type="text" id="educationCenterNearby" name="educationCenterNearby" class="form-control">
                                <span id="educationCenterNearbyError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="culturalCentreDistance">Distance to Nearby Cultural Centre (KM)</label>
                                <input type="text" id="culturalCentreDistance" name="culturalCentreDistance" class="form-control">
                                <span id="culturalCentreDistanceError" class="text-danger" ></span>
                            </div>
                        </div> 
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="syllabus">Syllabus</label>
                                <input type="text" id="syllabus" name="syllabus" class="form-control">
                                <span id="syllabusError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <h5>Proposed Project Details:</h5>
                
                    <div class="row">                            
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <select id="projectType" name="projectType" class="form-select">
                                    <option value="">Select Project Type</option>
                                    <option value="orphanage">Orphanage</option>
                                    <option value="classRoom">Class Room</option>
                                    <option value="educationAcademy">Education Academy</option>
                                </select>
                                <span id="projectTypeError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="buildingArea">Area of Proposed Project - Building (Sq)</label>
                                <input type="text" id="buildingArea" name="buildingArea" class="form-control">
                                <span id="buildingAreaError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="landArea">Land Area (Sq)</label>
                                <input type="text" id="landArea" name="landArea" class="form-control">
                                <span id="landAreaError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="classroomsNumber">Number of Classrooms</label>
                                <input type="text" id="classroomsNumber" name="classroomsNumber" class="form-control">
                                <span id="classroomsNumberError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="numberOfStudents">Number of Students</label>
                                <input type="text" id="numberOfStudents" name="numberOfStudents" class="form-control">
                                <span id="numberOfStudentsError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="proposedBudget">Proposed Budget</label>
                                <input type="text" id="proposedBudget" name="proposedBudget" class="form-control">
                                <span id="proposedBudgetError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="legalApprovals">Status of Legal Approvals</label>
                                <input type="text" id="legalApprovals" name="legalApprovals" class="form-control">
                                <span id="legalApprovalsError" class="text-danger" ></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="area">Area</label>
                                <input type="text" id="area" name="area" class="form-control">
                                <span id="areaError" class="text-danger" ></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-5"></div>
                        <div class="col-1">
                            <button class="btn box mt-2" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>


<!--delete confirmation modal -->
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

<!--data table view -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">

                    </div> 
                    <div class="col-4">

                        <h4 class="but p-1 rounded fw-bold border border-success" style="width:360px;color:white;">EDUCATION CENTRE APPLICATIONS</h4>
            
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="EducationCentreDataTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name of Applicant</th>
                            <th>Committee Name</th>
                            <th>Reg. Number</th>
                            <th>Year</th>
                            <th>Location</th>
                            <th>Village</th>
                            <th>Post</th>
                            <th>Panchayath</th>
                            <th>District</th>
                            <th>State</th>
                            <th>Contact 1</th>
                            <th>Contact 2</th>
                            <th>Submitted Application</th>
                            <th>Financial Support</th>
                            <th>Mahallu Name</th>
                            <th>Mahallu Location</th>
                            <th>Mahallu Village</th>
                            <th>Mahallu District</th>
                            <th>Mahallu State</th>
                            <th>No Of Families In Mahallu</th>
                            <th>Requirement</th>
                            <th>Proposed Site Building</th>
                            <th>Current Building Status</th>
                            <th>Number of Students</th>
                            <th>Boys Number</th>
                            <th>Girls Number</th>
                            <th>Education Center Nearby</th>
                            <th>Cultural Centre Distance</th>
                            <th>Syllabus</th>
                            <th>Project Type</th>
                            <th>Building Area</th>
                            <th>Land Area</th>
                            <th>Classrooms Number</th>
                            <th>Number Of Students</th>
                            <th>Proposed Budget</th>
                            <th>Legal Approvals</th>
                            <th>Area</th>
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


@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
 <!-- Peity chart-->
 <script src="{{ asset('assets/libs/peity/peity.min.js') }}"></script>

 <!-- Plugin Js-->
 <script src="{{ asset('assets/libs/chartist/chartist.min.js') }}"></script>
 <script src="{{ asset('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltips.min.js') }}"></script>


<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>


<script>
    $(document).ready(function() {
    $('#EducationCentreDataTable').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            searching: true,
            dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-4'l><'col-sm-8'ip>>",
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Download Excel',
                    title: 'Education Centre Application',
                    titleAttr: 'Export to CSV',
                    className: 'custombutton',
                    exportOptions: {

                        columns: function (idx, data, node) {
                // Return all columns
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
                url: `{{ url('/admin/education/centre/application/datatable') }}`,
                type: 'GET',
                dataSrc: 'data',
                
            },  
            columns: [
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) 
                {
                    return meta.row + 1; // Serial number starts from 1
                }
            },
            { data: 'applicantName' },
            { data: 'committeeName' },
            { data: 'regNumber'},
            { data: 'year'},
            { data: 'location'},
            { data: 'village'},
            { data: 'post'},
            { data: 'panchayath'},
            { data: 'district'},
            { data: 'state'},
            { data: 'contact1'},
            { data: 'contact2' },
            { data: 'submittedApplication' },
            { data: 'financialSupport' },
            { data: 'mahalluName' },
            { data: 'mahalluLocation'},
            { data: 'mahalluVillage' },
            { data: 'mahalluDistrict' },
            { data: 'mahalluState' },
            { data: 'noOfFamiliesInMahallu' },
            { data: 'requirementRepairing'},
            { data: 'proposedSiteBuilding' },
            { data: 'currentBuildingStatus' },
            { data: 'studentsNumber' },
            { data: 'boysNumber' },
            { data: 'girlsNumber'},
            { data: 'educationCenterNearby'},
            { data: 'culturalCentreDistance' },
            { data: 'syllabus' },
            { data: 'projectType'},
            { data: 'buildingArea'},
            { data: 'landArea' },
            { data: 'classroomsNumber' },
            { data: 'numberOfStudents'},
            { data: 'proposedBudget' },
            { data: 'legalApprovals' },
            { data: 'area' },            
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                                      
                    return `
                    <div class="dd d-flex">
                        <button class="btn btn-primary btn-sm view-more me-1" data-id="${row.educationcentreId}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <button class="btn btn-warning btn-sm edit me-1" data-id="${row.educationcentreId}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete" data-id="${row.educationcentreId}" data-name="${row.applicantName}">
                            <i class="bi bi-trash"></i>
                        </button>                       
                       
                    `;
                } 
            },
                    
                ]
            });
        });


  //submit   

$(document).ready(function() {
            $('#EducationCentreApplicationForm').on('submit', function(e) {
                e.preventDefault();

                // Clear previous error messages
                $('.text-danger').text('');

                var formData = $(this).serialize();

                $.ajax({
                    url: `{{ url('admin/education/centre/application/new') }}`,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        toastr.success(response.message, 'Success');
                        $('#EducationCenterModal').modal('hide');                     
                        $('#EducationCentreDataTable').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        let errors = response.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // Find the span associated with the input field and display the error message
                            $('#' + key + 'Error').text(value[0]);
                        });
                        toastr.error('Please check the form and correct the errors.', 'Error');
                    }
                });
            });
        });   

        
//view more 
$(document).on('click', '.view-more', function() {
    const educationCentreId = $(this).data('id');
    console.log('Clicked orphan care ID:', educationCentreId);

    if (educationCentreId !== undefined) {
        $.ajax({
            url: `{{ url('/admin/education/centre/application/view/more')}}/${educationCentreId}`, // Laravel route
            method: 'GET',
            success: function(data) {
                console.log('Response data:', data);
            // Define the list of required keys
const requiredKeys = [
    'applicantName', 'committeeName', 'regNumber', 'year', 'location', 'village', 'post',
    'panchayath', 'district', 'state', 'contact1', 'contact2', 'submittedApplication',
    'financialSupport', 'mahalluName', 'mahalluLocation', 'mahalluVillage', 'mahalluDistrict',
    'mahalluState', 'noOfFamiliesInMahallu', 'requirementRepairing', 'proposedSiteBuilding',
    'currentBuildingStatus', 'studentsNumber', 'boysNumber', 'girlsNumber', 'educationCenterNearby',
    'culturalCentreDistance', 'syllabus', 'projectType', 'buildingArea', 'landArea',
    'classroomsNumber', 'numberOfStudents', 'proposedBudget', 'legalApprovals', 'area'
];


                // Target the modal body
                const $modalBody = $('#EducationCentreModalBody');
                $modalBody.empty(); // Clear existing content

                // Create a Bootstrap row to hold the key-value pairs
                let gridHtml = '<div class="row">';

                // Iterate over the required keys and create grid columns
                requiredKeys.forEach((key, index) => {
                    const capitalizedKey = key.replace(/([A-Z])/g, ' $1').replace(/^./, str => str.toUpperCase()); // Convert camel case to sentence case with first letter capitalized
                    const value = data[key] !== undefined ? data[key] : 'Not Available';

                    // Add a new column for every 2 key-value pairs
                    if (index % 2 === 0 && index !== 0) {
                        gridHtml += '</div><div class="row">';
                    }

                    gridHtml += `
                      <ul class="list-group list-group-horizontal-md">             
            
                        <div class="col-6">
                          <li class="list-group-item">  <strong>${capitalizedKey}</strong></li> 
                        </div>
                        <div class="col-6">
                          <li class="list-group-item">  <strong>${value}</strong></li> 
                        </div>

                        </ul>
                    `;
                });

                gridHtml += '</div>'; // Close the last row

                // Append the constructed HTML to the modal body
                $modalBody.append(gridHtml);

                // Show the modal
                $('#EducationCentreModal').modal('show');
            },
            error: function(xhr) {
                console.error('An error occurred:', xhr.responseText);
            }
        });
    }
}); 


//Edit Education form application 
$(document).on('click', '.edit', function() {
    const educationCentreId = $(this).data('id');
  
    $.get(`{{ url('/admin/education/centre/application/edit') }}/${educationCentreId}`, function(data) {
        // Fill the form with data
        $('input[name="educationcentreId"]').val(data.educationcentreId);
        $('input[name="applicantName"]').val(data.applicantName);
        $('input[name="committeeName"]').val(data.committeeName);
        $('input[name="regNumber"]').val(data.regNumber);
        $('input[name="year"]').val(data.year);
        $('input[name="location"]').val(data.location);
        $('input[name="village"]').val(data.village);
        $('input[name="post"]').val(data.post);
        $('input[name="panchayath"]').val(data.panchayath);
        $('input[name="district"]').val(data.district);
        $('input[name="state"]').val(data.state);
        $('input[name="contact1"]').val(data.contact1);
        $('input[name="contact2"]').val(data.contact2);
        $('input[name="submittedApplication"]').val(data.submittedApplication);
        $('input[name="financialSupport"]').val(data.financialSupport);
        $('input[name="mahalluName"]').val(data.mahalluName);
        $('input[name="mahalluLocation"]').val(data.mahalluLocation);
        $('input[name="mahalluVillage"]').val(data.mahalluVillage);
        $('input[name="mahalluDistrict"]').val(data.mahalluDistrict);
        $('input[name="mahalluState"]').val(data.mahalluState);
        $('input[name="noOfFamiliesInMahallu"]').val(data.noOfFamiliesInMahallu);
        $('input[name="requirementRepairing"]').val(data.requirementRepairing);
        $('input[name="proposedSiteBuilding"][value="' + data.proposedSiteBuilding + '"]').prop('checked', true);
        $('input[name="currentBuildingStatus"]').val(data.currentBuildingStatus);
        $('input[name="studentsNumber"]').val(data.studentsNumber);
        $('input[name="boysNumber"]').val(data.boysNumber);
        $('input[name="girlsNumber"]').val(data.girlsNumber);
        $('input[name="educationCenterNearby"]').val(data.educationCenterNearby);
        $('input[name="culturalCentreDistance"]').val(data.culturalCentreDistance);
        $('input[name="syllabus"]').val(data.syllabus);
        $('select[name="projectType"]').val(data.projectType);
        $('input[name="buildingArea"]').val(data.buildingArea);
        $('input[name="landArea"]').val(data.landArea);
        $('input[name="classroomsNumber"]').val(data.classroomsNumber);
        $('input[name="numberOfStudents"]').val(data.numberOfStudents);
        $('input[name="proposedBudget"]').val(data.proposedBudget);
        $('input[name="legalApprovals"]').val(data.legalApprovals);
        $('input[name="area"]').val(data.area);
        
        // Show the modal
        $('#EditEducationCenterModal').modal('show');
    });
});


//update Education Centre Application
$(document).ready(function() {
    $('#EditEducationCentreApplicationForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        let formData = $(this).serializeArray();

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.updateEducationCentreApplication') }}",
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
                    $('#EditEducationCenterModal').modal('hide');
                    $('#EditEducationCentreApplicationForm')[0].reset();
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


//delete Education Centre Application
$(document).on('click', '.delete', function() {
    const educationId = $(this).data('id');
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
            url: `{{ url('/admin/education/centre/application/delete') }}/${educationId}`,
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
                $('#EducationCentreDataTable').DataTable().ajax.reload();
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

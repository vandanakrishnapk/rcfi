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
@slot('page_title') Application Form @endslot
@slot('subtitle') New Project Application @endslot
@endcomponent

<div class="row">
    <div class="col-12">
<div class="float-end d-none d-md-block"> 
    <button type="button" class="btn btn-success mb-1 float-end rounded-circle me-3" data-bs-toggle="modal" data-bs-target="#CulturalCenterApplicationModal">
        <i class="bi bi-person-plus-fill fs-5"></i>
    </button>  
</div>
    </div>      
    <div class="row">
    <div class="col-12">
   

<div class="modal fade" id="CulturalCenterApplicationModal" tabindex="-1" aria-labelledby="ProjectApplicationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="ProjectApplicationModalLabel">Cultural Centre Application</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <form id="CulturalCentreApplication">
                    @csrf
                    <!-- Applicant Details -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="applicantName">Name of Applicant</label>
                                <input type="text" id="applicantName" name="applicantName" class="form-control">
                                <span id="applicantNameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="committeeName">Name of Committee</label>
                                <input type="text" id="committeeName" name="committeeName" class="form-control">
                                <span id="committeeNameError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="regNumber">Reg. Number</label>
                                <input type="text" id="regNumber" name="regNumber" class="form-control">
                                <span id="regNumberError" class="text-danger"></span>
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
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location" class="form-control">
                                <span id="locationError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="village">Village</label>
                                <input type="text" id="village" name="village" class="form-control">
                                <span id="villageError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="post">Post</label>
                                <input type="text" id="post" name="post" class="form-control">
                                <span id="postError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="panchayath">Panchayath</label>
                                <input type="text" id="panchayath" name="panchayath" class="form-control">
                                <span id="panchayathError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="district">District</label>
                                <input type="text" id="district" name="district" class="form-control">
                                <span id="districtError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" class="form-control">
                                <span id="stateError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="contactNumber1">Contact Number 1</label>
                                <input type="text" id="contactNumber1" name="contactNumber1" class="form-control">
                                <span id="contactNumber1Error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="contactNumber2">Contact Number 2</label>
                                <input type="text" id="contactNumber2" name="contactNumber2" class="form-control">
                                <span id="contactNumber2Error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="submittedBefore">Have you submitted any applications before?</label>
                                <input type="text" id="submittedBefore" name="submittedBefore" class="form-control">
                                <span id="submittedBeforeError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="receivedSupport">Have they received any financial support from RCFI?</label>
                                <input type="text" id="receivedSupport" name="receivedSupport" class="form-control">
                                <span id="receivedSupportError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <!-- Details of Locality of Proposed Project -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <h5>Details of Locality of Proposed Project</h5>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluName">Name of the Mahallu</label>
                                <input type="text" id="mahalluName" name="mahalluName" class="form-control">
                                <span id="mahalluNameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluLocation">Location</label>
                                <input type="text" id="mahalluLocation" name="mahalluLocation" class="form-control">
                                <span id="mahalluLocationError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluVillage">Village</label>
                                <input type="text" id="mahalluVillage" name="mahalluVillage" class="form-control">
                                <span id="mahalluVillageError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluDistrict">District</label>
                                <input type="text" id="mahalluDistrict" name="mahalluDistrict" class="form-control">
                                <span id="mahalluDistrictError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluState">State</label>
                                <input type="text" id="mahalluState" name="mahalluState" class="form-control">
                                <span id="mahalluStateError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="noOfFamilies">No. of Families in Mahallu</label>
                                <input type="text" id="noOfFamilies" name="noOfFamilies" class="form-control">
                                <span id="noOfFamiliesError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="requirement">Requirement (Repairing / New Construction)</label>
                                <input type="text" id="requirement" name="requirement" class="form-control">
                                <span id="requirementError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="hasBuilding">Does the proposed site already have a building?</label>
                                <input type="text" id="hasBuilding" name="hasBuilding" class="form-control">
                                <span id="hasBuildingError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="buildingStatus">If yes, Status of Current Building</label>
                                <input type="text" id="buildingStatus" name="buildingStatus" class="form-control">
                                <span id="buildingStatusError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="culturalCenter">Is there a cultural center nearby?</label>
                                <input type="text" id="culturalCenter" name="culturalCenter" class="form-control">
                                <span id="culturalCenterError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="distanceToCulturalCenter">Distance to the closest Cultural Centre (KM)</label>
                                <input type="text" id="distanceToCulturalCenter" name="distanceToCulturalCenter" class="form-control">
                                <span id="distanceToCulturalCenterError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="benefitedHouseholds">Total benefited households from the current structure</label>
                                <input type="text" id="benefitedHouseholds" name="benefitedHouseholds" class="form-control">
                                <span id="benefitedHouseholdsError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <!-- Project Details -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <h5>Project Details</h5>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="projectType">Type of project</label>
                                <select id="projectType" name="projectType" class="form-control">
                                    <option value="">Select Project Type</option>
                                    <option value="CC only">CC only</option>
                                    <option value="CC & Education Centre">CC & Education Centre</option>
                                    <option value="CC & Shopping Complex">CC & Shopping Complex</option>
                                    <option value="CC, Edu. Centre & Shopping Complex">CC, Edu. Centre & Shopping Complex</option>
                                </select>
                                <span id="projectTypeError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="buildingArea">Area of proposed project - building (Sqft)</label>
                                <input type="text" id="buildingArea" name="buildingArea" class="form-control">
                                <span id="buildingAreaError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="landArea">Land Area (Sqft)</label>
                                <input type="text" id="landArea" name="landArea" class="form-control">
                                <span id="landAreaError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="proposedBudget">Proposed Budget</label>
                                <input type="text" id="proposedBudget" name="proposedBudget" class="form-control">
                                <span id="proposedBudgetError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="proposedBeneficiary">Proposed Beneficiary (Household)</label>
                                <input type="text" id="proposedBeneficiary" name="proposedBeneficiary" class="form-control">
                                <span id="proposedBeneficiaryError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="legalApprovals">Status of Legal Approvals</label>
                                <input type="text" id="legalApprovals" name="legalApprovals" class="form-control">
                                <span id="legalApprovalsError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="area">Area</label>
                                <input type="text" id="area" name="area" class="form-control">
                                <span id="areaError" class="text-danger"></span>
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

<!--view more -->


<div class="modal fade" id="CulturalCentreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header custommodal">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Cultural Centre Application</h1>
          <button type="button" class="btn-close customclose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="CulturalCentreModalBody">
          
        </div>
       
      </div>
    </div>
  </div>   

  <!--Edit Cultural Centre Application -->
  
<div class="modal fade" id="EditCulturalCenterApplicationModal" tabindex="-1" aria-labelledby="ProjectApplicationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="ProjectApplicationModalLabel">Edit Cultural Centre Application</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <form id="EditCulturalCentreForm" method="POST">
                    @csrf
                    <!-- Applicant Details -->
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="culturalcentreId">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="applicantName">Name of Applicant</label>
                                <input type="text" id="applicantName" name="applicantName" class="form-control">
                                <span id="applicantNameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="committeeName">Name of Committee</label>
                                <input type="text" id="committeeName" name="committeeName" class="form-control">
                                <span id="committeeNameError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="regNumber">Reg. Number</label>
                                <input type="text" id="regNumber" name="regNumber" class="form-control">
                                <span id="regNumberError" class="text-danger"></span>
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
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location" class="form-control">
                                <span id="locationError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="village">Village</label>
                                <input type="text" id="village" name="village" class="form-control">
                                <span id="villageError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="post">Post</label>
                                <input type="text" id="post" name="post" class="form-control">
                                <span id="postError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="panchayath">Panchayath</label>
                                <input type="text" id="panchayath" name="panchayath" class="form-control">
                                <span id="panchayathError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="district">District</label>
                                <input type="text" id="district" name="district" class="form-control">
                                <span id="districtError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" class="form-control">
                                <span id="stateError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="contactNumber1">Contact Number 1</label>
                                <input type="text" id="contactNumber1" name="contactNumber1" class="form-control">
                                <span id="contactNumber1Error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="contactNumber2">Contact Number 2</label>
                                <input type="text" id="contactNumber2" name="contactNumber2" class="form-control">
                                <span id="contactNumber2Error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="submittedBefore">Have you submitted any applications before?</label>
                                <input type="text" id="submittedBefore" name="submittedBefore" class="form-control">
                                <span id="submittedBeforeError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="receivedSupport">Have they received any financial support from RCFI?</label>
                                <input type="text" id="receivedSupport" name="receivedSupport" class="form-control">
                                <span id="receivedSupportError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <!-- Details of Locality of Proposed Project -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <h5>Details of Locality of Proposed Project</h5>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluName">Name of the Mahallu</label>
                                <input type="text" id="mahalluName" name="mahalluName" class="form-control">
                                <span id="mahalluNameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluLocation">Location</label>
                                <input type="text" id="mahalluLocation" name="mahalluLocation" class="form-control">
                                <span id="mahalluLocationError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluVillage">Village</label>
                                <input type="text" id="mahalluVillage" name="mahalluVillage" class="form-control">
                                <span id="mahalluVillageError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluDistrict">District</label>
                                <input type="text" id="mahalluDistrict" name="mahalluDistrict" class="form-control">
                                <span id="mahalluDistrictError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluState">State</label>
                                <input type="text" id="mahalluState" name="mahalluState" class="form-control">
                                <span id="mahalluStateError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="noOfFamilies">No. of Families in Mahallu</label>
                                <input type="text" id="noOfFamilies" name="noOfFamilies" class="form-control">
                                <span id="noOfFamiliesError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="requirement">Requirement (Repairing / New Construction)</label>
                                <input type="text" id="requirement" name="requirement" class="form-control">
                                <span id="requirementError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="hasBuilding">Does the proposed site already have a building?</label>
                                <input type="text" id="hasBuilding" name="hasBuilding" class="form-control">
                                <span id="hasBuildingError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="buildingStatus">If yes, Status of Current Building</label>
                                <input type="text" id="buildingStatus" name="buildingStatus" class="form-control">
                                <span id="buildingStatusError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="culturalCenter">Is there a cultural center nearby?</label>
                                <input type="text" id="culturalCenter" name="culturalCenter" class="form-control">
                                <span id="culturalCenterError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="distanceToCulturalCenter">Distance to the closest Cultural Centre (KM)</label>
                                <input type="text" id="distanceToCulturalCenter" name="distanceToCulturalCenter" class="form-control">
                                <span id="distanceToCulturalCenterError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="benefitedHouseholds">Total benefited households from the current structure</label>
                                <input type="text" id="benefitedHouseholds" name="benefitedHouseholds" class="form-control">
                                <span id="benefitedHouseholdsError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <!-- Project Details -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <h5>Project Details</h5>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="projectType">Type of project</label>
                                <select id="projectType" name="projectType" class="form-control">
                                    <option value="">Select Project Type</option>
                                    <option value="CC only">CC only</option>
                                    <option value="CC & Education Centre">CC & Education Centre</option>
                                    <option value="CC & Shopping Complex">CC & Shopping Complex</option>
                                    <option value="CC, Edu. Centre & Shopping Complex">CC, Edu. Centre & Shopping Complex</option>
                                </select>
                                <span id="projectTypeError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="buildingArea">Area of proposed project - building (Sqft)</label>
                                <input type="text" id="buildingArea" name="buildingArea" class="form-control">
                                <span id="buildingAreaError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="landArea">Land Area (Sqft)</label>
                                <input type="text" id="landArea" name="landArea" class="form-control">
                                <span id="landAreaError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="proposedBudget">Proposed Budget</label>
                                <input type="text" id="proposedBudget" name="proposedBudget" class="form-control">
                                <span id="proposedBudgetError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="proposedBeneficiary">Proposed Beneficiary (Household)</label>
                                <input type="text" id="proposedBeneficiary" name="proposedBeneficiary" class="form-control">
                                <span id="proposedBeneficiaryError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="legalApprovals">Status of Legal Approvals</label>
                                <input type="text" id="legalApprovals" name="legalApprovals" class="form-control">
                                <span id="legalApprovalsError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="area">Area</label>
                                <input type="text" id="area" name="area" class="form-control">
                                <span id="areaError" class="text-danger"></span>
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
<!-- Data Table to Display Submitted Form Data -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">

                    </div> 
                    <div class="col-4">

                        <h4 class="but p-1 rounded fw-bold border border-success" style="width:350px;color:white;">CULTURAL CENTRE APPLICATIONS</h4>
            
                    </div>
                </div>
            </div>

            <div class="card-body">
    <table id="CulturalTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>  
                <th>S.No</th>             
                <th>Name of Applicant</th>
                <th>Name of Committee</th>
                <th>Reg. Number</th>
                <th>Year</th>
                <th>Location</th>
                <th>Village</th>
                <th>Post</th>
                <th>Panchayath</th>
                <th>District</th>
                <th>State</th>
                <th>Contact Number 1</th>
                <th>Contact Number 2</th>
                <th>Submitted Before</th>
                <th>Received Support</th>
                <th>Name of Mahallu</th>
                <th>Mahallu Location</th>
                <th>Mahallu Village</th>
                <th>Mahallu District</th>
                <th>Mahallu State</th>
                <th>No. of Families</th>
                <th>Requirement</th>
                <th>Has Building</th>
                <th>Building Status</th>
                <th>Cultural Centre Nearby</th>
                <th>Distance to Cultural Centre (KM)</th>
                <th>Benefited Households</th>
                <th>Project Type</th>
                <th>Building Area (Sqft)</th>
                <th>Land Area (Sqft)</th>
                <th>Proposed Budget</th>
                <th>Proposed Beneficiary (Household)</th>
                <th>Legal Approvals</th>
                <th>Area</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data rows will be appended here by JavaScript -->
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
<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>
<script>
$(document).ready(function() {
    $('#CulturalTable').DataTable({
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
                title: 'Cultural Centre Application',
                titleAttr: 'Export to CSV',
                className: 'custombutton',
                exportOptions: { columns: function (idx, data, node) {
                // Return all columns
                return true;
            } }
            }
        ],
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 Applications', '25 Applications', '50 Applications', 'All Applications']
        ],
        ajax: {
            url: `{{ url('admin/cultural/centre/application/datatable') }}`,
            type: 'GET',
            dataSrc: 'data',
        },
        columns: [ 
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return meta.row + 1; // Serial number starts from 1
                }
            },         
            { data: 'applicantName' },
            { data: 'committeeName' },
            { data: 'regNumber' },
            { data: 'year' },
            { data: 'location' },
            { data: 'village' },
            { data: 'post' },
            { data: 'panchayath' },
            { data: 'district' },
            { data: 'state' },
            { data: 'contactNumber1' },
            { data: 'contactNumber2' },
            { data: 'submittedBefore' },
            { data: 'receivedSupport' },
            { data: 'mahalluName' },
            { data: 'mahalluLocation' },
            { data: 'mahalluVillage' },
            { data: 'mahalluDistrict' },
            { data: 'mahalluState' },
            { data: 'noOfFamilies' },
            { data: 'requirement' },
            { data: 'hasBuilding' },
            { data: 'buildingStatus' },
            { data: 'culturalCenter' },
            { data: 'distanceToCulturalCenter' },
            { data: 'benefitedHouseholds' },
            { data: 'projectType' },
            { data: 'buildingArea' },
            { data: 'landArea' },
            { data: 'proposedBudget' },
            { data: 'proposedBeneficiary' },
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
                            <button class="btn btn-primary btn-sm view-more me-1" data-id="${row.culturalcentreId}">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <button class="btn btn-warning btn-sm edit me-1" data-id="${row.culturalcentreId}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-danger btn-sm delete" data-id="${row.culturalcentreId}" data-name="${row.applicantName}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>`;
                }
            },
        ]
    });
});


//submit cultural form 
$(document).ready(function() {
            $('#CulturalCentreApplication').on('submit', function(e) {
                e.preventDefault();

                // Clear previous error messages
                $('.text-danger').text('');

                var formData = $(this).serialize();

                $.ajax({
                    url: `{{ url('admin/cultural/centre/application/new') }}`,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        toastr.success(response.message, 'Success');
                        $('#CulturalCenterApplicationModal').modal('hide');
                        $('#CulturalTable').DataTable().ajax.reload();
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


//view more cultural center 

$(document).on('click', '.view-more', function() {
    const culturalCentreId = $(this).data('id');
    console.log('Clicked cultural centre ID:', culturalCentreId);

    if (culturalCentreId !== undefined) {
        $.ajax({
            url: `{{ url('/admin/cultural/centre/application/view/more') }}/${culturalCentreId}`, // Laravel route
            method: 'GET',
            success: function(data) {
                console.log('Response data:', data);

                // Define the list of required keys
                const requiredKeys = [
                    'applicantName', 'committeeName', 'regNumber', 'year', 'location', 'village', 'post',
                    'panchayath', 'district', 'state', 'contactNumber1', 'contactNumber2', 'submittedBefore',
                    'receivedSupport', 'mahalluName', 'mahalluLocation', 'mahalluVillage', 'mahalluDistrict',
                    'mahalluState', 'noOfFamilies', 'requirement', 'hasBuilding', 'buildingStatus',
                    'culturalCenter', 'distanceToCulturalCenter', 'benefitedHouseholds', 'projectType',
                    'buildingArea', 'landArea', 'proposedBudget', 'proposedBeneficiary', 'legalApprovals', 'area'
                ];

                // Target the modal body
                const $modalBody = $('#CulturalCentreModalBody');
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
                $('#CulturalCentreModal').modal('show');
            },
            error: function(xhr) {
                console.error('An error occurred:', xhr.responseText);
            }
        });
    }
});  

//edit cultural centre application 

$(document).on('click', '.edit', function() {
    const culturalCentreId = $(this).data('id');

    $.ajax({
        url: `{{ url('/admin/cultural/centre/application/edit') }}/${culturalCentreId}`,
        method: 'GET',
        success: function(data) {
            // Fill the form with data
            $('input[name="culturalcentreId"]').val(data.culturalcentreId);
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
            $('input[name="contactNumber1"]').val(data.contactNumber1);
            $('input[name="contactNumber2"]').val(data.contactNumber2);
            $('input[name="submittedBefore"]').val(data.submittedBefore);
            $('input[name="receivedSupport"]').val(data.receivedSupport);
            $('input[name="mahalluName"]').val(data.mahalluName);
            $('input[name="mahalluLocation"]').val(data.mahalluLocation);
            $('input[name="mahalluVillage"]').val(data.mahalluVillage);
            $('input[name="mahalluDistrict"]').val(data.mahalluDistrict);
            $('input[name="mahalluState"]').val(data.mahalluState);
            $('input[name="noOfFamilies"]').val(data.noOfFamilies);
            $('input[name="requirement"]').val(data.requirement);
            $('input[name="hasBuilding"]').val(data.hasBuilding);
            $('input[name="buildingStatus"]').val(data.buildingStatus);
            $('input[name="culturalCenter"]').val(data.culturalCenter);
            $('input[name="distanceToCulturalCenter"]').val(data.distanceToCulturalCenter);
            $('input[name="benefitedHouseholds"]').val(data.benefitedHouseholds);
            const $select = $('select[name="projectType"]');
            $select.find('option').removeAttr('selected');
            $select.find('option[value="' + data.projectType + '"]').attr('selected', 'selected');
            $('input[name="buildingArea"]').val(data.buildingArea);
            $('input[name="landArea"]').val(data.landArea);
            $('input[name="proposedBudget"]').val(data.proposedBudget);
            $('input[name="proposedBeneficiary"]').val(data.proposedBeneficiary);
            $('input[name="legalApprovals"]').val(data.legalApprovals);
            $('input[name="area"]').val(data.area);

            // Show the modal
            $('#EditCulturalCenterApplicationModal').modal('show');
        },
        error: function(xhr) {
            console.error('An error occurred:', xhr.responseText);
        }
    });
});  


//update Cultural Centre Application
$(document).ready(function() {
    $('#EditCulturalCentreForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        let formData = $(this).serializeArray();

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:`{{ url('/admin/cultural/centre/application/update')}}`,
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
                    $('#EditCulturalCenterApplicationModal').modal('hide');
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


//delete Cultural Centre Application

$(document).on('click', '.delete', function() {
    const culturalId = $(this).data('id');
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
            url: `{{ url('/admin/cultural/centre/application/delete') }}/${culturalId}`,
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
                $('#CulturalTable').DataTable().ajax.reload();
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

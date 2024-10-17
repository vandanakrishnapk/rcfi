@extends('user.template.master')
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
<!-- Bootstrap Css -->
@endsection

@section('body')
<body data-sidebar="light">
@endsection

@section('content')
<div class="row mt-3">
    <div class="col-12">
        <div class="float-start">
            <a href="{{ route('user.getApplications')}}" class="btn btn-success btn-sm rounded-circle"><i class="bi bi-box-arrow-in-left fs-4 ms-1"></i></a>
        </div>
<div class="float-end d-none d-md-block"> 
    <button type="button" class="btn btn-success mb-1 float-end rounded-circle me-3" data-bs-toggle="modal" data-bs-target="#SweetWaterProjectModal">
        <i class="bi bi-person-plus-fill fs-5"></i>
    </button>  
</div>
    </div>  
    <div class="row">
        <div class="col-12">
            <div class="modal fade" id="SweetWaterProjectModal" tabindex="-1" aria-labelledby="MarkazOrphanCareModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header box">
                            <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Sweet Water Project</h1>
                            <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-5" id="MarkazOrphanCare">
                           
    <form id="SweetWaterProjectForm">
        @csrf 
        <div class="row">
            <div class="col-6">
                <!-- Name of Applicant -->
                <div class="mb-3">
                    <label for="applicantName" class="form-label">Name of Applicant</label>
                    <input type="text" id="applicantName" name="applicantName" class="form-control">
                    <span id="applicantNameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <!-- Location -->
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" id="location" name="location" class="form-control">
                    <span id="locationError" class="text-danger"></span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <!-- Address -->
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea id="address" name="address" class="form-control" rows="3"></textarea>
                    <span id="addressError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <!-- Village -->
                <div class="mb-3">
                    <label for="village" class="form-label">Village</label>
                    <input type="text" id="village" name="village" class="form-control">
                    <span id="villageError" class="text-danger"></span>
                </div>
            </div>

            <div class="col-4">
                <!-- Post -->
                <div class="mb-3">
                    <label for="post" class="form-label">Post</label>
                    <input type="text" id="post" name="post" class="form-control">
                    <span id="postError" class="text-danger"></span>
                </div>
            </div>

            <div class="col-4">
                <!-- Panchayath -->
                <div class="mb-3">
                    <label for="panchayath" class="form-label">Panchayath</label>
                    <input type="text" id="panchayath" name="panchayath" class="form-control">
                    <span id="panchayathError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <!-- District -->
                <div class="mb-3">
                    <label for="district" class="form-label">District</label>
                    <input type="text" id="district" name="district" class="form-control">
                    <span id="districtError" class="text-danger"></span>
                </div>
            </div>

            <div class="col-4">
                <!-- State -->
                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" id="state" name="state" class="form-control">
                    <span id="stateError" class="text-danger"></span>
                </div>
            </div>

            <div class="col-4">
                <!-- Pin -->
                <div class="mb-3">
                    <label for="pin" class="form-label">Pin</label>
                    <input type="text" id="pin" name="pin" class="form-control">
                    <span id="pinError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <!-- Contact 1 -->
                <div class="mb-3">
                    <label for="contact1" class="form-label">Contact 1</label>
                    <input type="text" id="contact1" name="contact1" class="form-control">
                    <span id="contact1Error" class="text-danger"></span>
                </div>
            </div>

            <div class="col-6">
                <!-- Contact 2 -->
                <div class="mb-3">
                    <label for="contact2" class="form-label mt-2">Contact 2</label>
                    <input type="text" id="contact2" name="contact2" class="form-control">
                    <span id="contact2Error" class="text-danger"></span>
                </div>
            </div>
        </div>

        <!-- Beneficiaries -->
        <div class="row">
            <div class="col-12">
                <h5>Details Of Beneficiaries</h5>
                <div id="beneficiary-fields">
                    <div class="beneficiary-row row mb-2">
                        <div class="col-6">
                            <input type="text" name="beneficiaryName[]" class="form-control" placeholder="Name">
                            <span class="beneficiaryNameError text-danger"></span>
                        </div>
                        <div class="col-5">
                            <input type="text" name="beneficiaryPhone[]" class="form-control" placeholder="Phone Number">
                            <span class="beneficiaryPhoneError text-danger"></span>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-warning btn-sm remove-btn" onclick="removeBeneficiary(this)">-</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-success btn-sm mt-2 mb-2" onclick="addBeneficiary()">+</button>
            </div>
        </div>

        <!-- No. Of Benefited People, Total Male, Female -->
        <div class="row mb-3">
            <div class="col-4">
                <label for="noOfBenefitedPeople" class="form-label">No. Of Benefited People</label>
                <input type="text" id="noOfBenefitedPeople" name="noOfBenefitedPeople" class="form-control">
                <span id="noOfBenefitedPeopleError" class="text-danger"></span>
            </div>
            <div class="col-4">
                <label for="totalMale" class="form-label">Total Male</label>
                <input type="text" id="totalMale" name="totalMale" class="form-control">
                <span id="totalMaleError" class="text-danger"></span>
            </div>
            <div class="col-4">
                <label for="totalFemale" class="form-label">Total Female</label>
                <input type="text" id="totalFemale" name="totalFemale" class="form-control">
                <span id="totalFemaleError" class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <!-- Job of Applicant -->
                <div class="mb-3">
                    <label for="jobOfApplicant" class="form-label">Job of Applicant</label>
                    <input type="text" id="jobOfApplicant" name="jobOfApplicant" class="form-control">
                    <span id="jobOfApplicantError" class="text-danger"></span>
                </div>
            </div>

            <div class="col-6">
                <!-- Average Monthly Income -->
                <div class="mb-3">
                    <label for="averageMonthlyIncome" class="form-label mt-2">Average Monthly Income</label>
                    <input type="text" id="averageMonthlyIncome" name="averageMonthlyIncome" class="form-control">
                    <span id="averageMonthlyIncomeError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <!-- Owner of the Proposed Land -->
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="ownerOfLand" class="form-label">Owner of the Proposed Land</label>
                    <textarea id="ownerOfLand" name="ownerOfLand" class="form-control" rows="3"></textarea>
                    <span id="ownerOfLandError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <!-- Address of Land Owner -->
                <div class="mb-3">
                    <label for="addressOfLandOwner" class="form-label">Address of Land Owner</label>
                    <textarea id="addressOfLandOwner" name="addressOfLandOwner" class="form-control" rows="3"></textarea>
                    <span id="addressOfLandOwnerError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-4">
                <!-- Place -->
                <div class="mb-3">
                    <label for="place" class="form-label">Place</label>
                    <input type="text" id="place" name="place" class="form-control">
                    <span id="placeError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-4">
                <!-- Post -->
                <div class="mb-3">
                    <label for="postLandOwner" class="form-label">Post</label>
                    <input type="text" id="postLandOwner" name="postLandOwner" class="form-control">
                    <span id="postLandOwnerError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <!-- Place, Post, Panchayath, District -->
            <div class="col-4">
                <label for="panchayathLandOwner" class="form-label">Panchayath</label>
                <input type="text" id="panchayathLandOwner" name="panchayathLandOwner" class="form-control">
                <span id="panchayathLandOwnerError" class="text-danger"></span>
            </div>
            <div class="col-4">
                <label for="districtLandOwner" class="form-label">District</label>
                <input type="text" id="districtLandOwner" name="districtLandOwner" class="form-control">
                <span id="districtLandOwnerError" class="text-danger"></span>
            </div>
            <div class="col-4">
                <label for="mobileLandOwner" class="form-label">Mobile</label>
                <input type="text" id="mobileLandOwner" name="mobileLandOwner" class="form-control">
                <span id="mobileLandOwnerError" class="text-danger"></span>
            </div>
        </div>

        <!-- Type of Well -->
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Type of Well</label>
                    <select id="typeOfWell" name="typeOfWell" class="form-select">
                        <option value="boreWell">Bore Well</option>
                        <option value="openWell">Open Well</option>
                        <option value="indiaMark2HandPump">India Mark 2 Hand Pump</option>
                        <option value="mazraWell">Mazra Well</option>
                        <option value="personalHygieneCorner">Personal Hygiene Corner</option>
                    </select>
                    <span id="typeOfWellError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <!-- Expected Depth, Diameter, Budget Estimated -->
        <div class="row mb-3">
            <div class="col-4">
                <label for="expectedDepth" class="form-label">Expected Depth of the Well (Feet)</label>
                <input type="text" id="expectedDepth" name="expectedDepth" class="form-control">
                <span id="expectedDepthError" class="text-danger"></span>
            </div>
            <div class="col-4">
                <label for="diameter" class="form-label">Diameter</label>
                <input type="text" id="diameter" name="diameter" class="form-control">
                <span id="diameterError" class="text-danger"></span>
            </div>
            <div class="col-4">
                <label for="budgetEstimated" class="form-label">Budget Estimated</label>
                <input type="text" id="budgetEstimated" name="budgetEstimated" class="form-control">
                <span id="budgetEstimatedError" class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <!-- Nature of Land -->
                <div class="mb-3">
                    <label for="natureOfLand" class="form-label">Nature of Land</label>
                    <input type="text" id="natureOfLand" name="natureOfLand" class="form-control">
                    <span id="natureOfLandError" class="text-danger"></span>
                </div>
            </div>

            <div class="col-6">
                <!-- Current Water Source -->
                <div class="mb-3">
                    <label for="currentWaterSource" class="form-label">How you are getting drinking water now?</label>
                    <textarea id="currentWaterSource" name="currentWaterSource" class="form-control" rows="3"></textarea>
                    <span id="currentWaterSourceError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <!-- Need of Electric Pump -->
                <div class="mb-3">
                    <label class="form-label">Need of Electric Pump</label>
                    <select id="needElectricPump" name="needElectricPump" class="form-select">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <span id="needElectricPumpError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <!-- Whether the Well Used for Agriculture -->
                <div class="mb-3">
                    <label class="form-label">Whether the Well Used for Agriculture Purposes?</label>
                    <select id="usedForAgriculture" name="usedForAgriculture" class="form-select">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <span id="usedForAgricultureError" class="text-danger"></span>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row">
            <div class="col-5"></div>
            <div class="col-1">
                <button type="submit" class="btn box mt-2">Submit</button>
            </div>
        </div>
    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    


<!-- view more-->
<div class="modal fade" id="SweetWaterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header custommodal">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Sweet Water Application</h1>
          <button type="button" class="btn-close customclose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="SweetWaterModalBody">
          
        </div>
       
      </div>
    </div>
  </div>    

<!--Edit Sweet water project-->
<div class="modal fade" id="EditSweetWaterProjectModal" tabindex="-1" aria-labelledby="editSweetWaterLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">EditSweet Water Project</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5" id="EditSweetModalBody">
               
<form id="EditSweetWaterProjectForm">
@csrf  
<div class="row">
    <div class="col-12">
        <input type="hidden" name="sweetwaterId">
    </div>
</div>
<div class="row">
<div class="col-6">
    <!-- Name of Applicant -->
    <div class="mb-3">
        <label for="applicantName" class="form-label">Name of Applicant</label>
        <input type="text" id="applicantName" name="applicantName" class="form-control">
        <span id="applicantNameError" class="text-danger"></span>
    </div>
</div>
<div class="col-6">
    <!-- Location -->
    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" id="location" name="location" class="form-control">
        <span id="locationError" class="text-danger"></span>
    </div>
</div>
</div>

<div class="row">
<div class="col-12">
    <!-- Address -->
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea id="address" name="address" class="form-control" rows="3"></textarea>
        <span id="addressError" class="text-danger"></span>
    </div>
</div>
</div>

<div class="row">
<div class="col-4">
    <!-- Village -->
    <div class="mb-3">
        <label for="village" class="form-label">Village</label>
        <input type="text" id="village" name="village" class="form-control">
        <span id="villageError" class="text-danger"></span>
    </div>
</div>

<div class="col-4">
    <!-- Post -->
    <div class="mb-3">
        <label for="post" class="form-label">Post</label>
        <input type="text" id="post" name="post" class="form-control">
        <span id="postError" class="text-danger"></span>
    </div>
</div>

<div class="col-4">
    <!-- Panchayath -->
    <div class="mb-3">
        <label for="panchayath" class="form-label">Panchayath</label>
        <input type="text" id="panchayath" name="panchayath" class="form-control">
        <span id="panchayathError" class="text-danger"></span>
    </div>
</div>
</div>

<div class="row">
<div class="col-4">
    <!-- District -->
    <div class="mb-3">
        <label for="district" class="form-label">District</label>
        <input type="text" id="district" name="district" class="form-control">
        <span id="districtError" class="text-danger"></span>
    </div>
</div>

<div class="col-4">
    <!-- State -->
    <div class="mb-3">
        <label for="state" class="form-label">State</label>
        <input type="text" id="state" name="state" class="form-control">
        <span id="stateError" class="text-danger"></span>
    </div>
</div>

<div class="col-4">
    <!-- Pin -->
    <div class="mb-3">
        <label for="pin" class="form-label">Pin</label>
        <input type="text" id="pin" name="pin" class="form-control">
        <span id="pinError" class="text-danger"></span>
    </div>
</div>
</div>

<div class="row">
<div class="col-6">
    <!-- Contact 1 -->
    <div class="mb-3">
        <label for="contact1" class="form-label">Contact 1</label>
        <input type="text" id="contact1" name="contact1" class="form-control">
        <span id="contact1Error" class="text-danger"></span>
    </div>
</div>

<div class="col-6">
    <!-- Contact 2 -->
    <div class="mb-3">
        <label for="contact2" class="form-label mt-2">Contact 2</label>
        <input type="text" id="contact2" name="contact2" class="form-control">
        <span id="contact2Error" class="text-danger"></span>
    </div>
</div>
</div>

<!-- Beneficiaries -->
<div class="row">
<div class="col-12">
    <h5>Details Of Beneficiaries</h5>
    <div id="Editbeneficiary-fields">
        <div class="beneficiary-row row mb-2">
            <div class="col-6">
                <input type="text" name="beneficiaryName[]" class="form-control" placeholder="Name">
                <span class="beneficiaryNameError text-danger"></span>
            </div>
            <div class="col-5">
                <input type="text" name="beneficiaryPhone[]" class="form-control" placeholder="Phone Number">
                <span class="beneficiaryPhoneError text-danger"></span>
            </div>
            <div class="col-1">
                <button type="button" class="btn btn-warning btn-sm remove-btn" onclick="removeBeneficiaryedit(this)">-</button>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-success btn-sm mt-2 mb-2" onclick="addBeneficiaryedit()">+</button>
</div>
</div>

<!-- No. Of Benefited People, Total Male, Female -->
<div class="row mb-3">
<div class="col-4">
    <label for="noOfBenefitedPeople" class="form-label">No. Of Benefited People</label>
    <input type="text" id="noOfBenefitedPeople" name="noOfBenefitedPeople" class="form-control">
    <span id="noOfBenefitedPeopleError" class="text-danger"></span>
</div>
<div class="col-4">
    <label for="totalMale" class="form-label">Total Male</label>
    <input type="text" id="totalMale" name="totalMale" class="form-control">
    <span id="totalMaleError" class="text-danger"></span>
</div>
<div class="col-4">
    <label for="totalFemale" class="form-label">Total Female</label>
    <input type="text" id="totalFemale" name="totalFemale" class="form-control">
    <span id="totalFemaleError" class="text-danger"></span>
</div>
</div>

<div class="row">
<div class="col-6">
    <!-- Job of Applicant -->
    <div class="mb-3">
        <label for="jobOfApplicant" class="form-label">Job of Applicant</label>
        <input type="text" id="jobOfApplicant" name="jobOfApplicant" class="form-control">
        <span id="jobOfApplicantError" class="text-danger"></span>
    </div>
</div>

<div class="col-6">
    <!-- Average Monthly Income -->
    <div class="mb-3">
        <label for="averageMonthlyIncome" class="form-label mt-2">Average Monthly Income</label>
        <input type="text" id="averageMonthlyIncome" name="averageMonthlyIncome" class="form-control">
        <span id="averageMonthlyIncomeError" class="text-danger"></span>
    </div>
</div>
</div>

<!-- Owner of the Proposed Land -->
<div class="row">
<div class="col-12">
    <div class="mb-3">
        <label for="ownerOfLand" class="form-label">Owner of the Proposed Land</label>
        <textarea id="ownerOfLand" name="ownerOfLand" class="form-control" rows="3"></textarea>
        <span id="ownerOfLandError" class="text-danger"></span>
    </div>
</div>
</div>

<div class="row">
<div class="col-4">
    <!-- Address of Land Owner -->
    <div class="mb-3">
        <label for="addressOfLandOwner" class="form-label">Address of Land Owner</label>
        <textarea id="addressOfLandOwner" name="addressOfLandOwner" class="form-control" rows="3"></textarea>
        <span id="addressOfLandOwnerError" class="text-danger"></span>
    </div>
</div>
<div class="col-4">
    <!-- Place -->
    <div class="mb-3">
        <label for="place" class="form-label">Place</label>
        <input type="text" id="place" name="place" class="form-control">
        <span id="placeError" class="text-danger"></span>
    </div>
</div>
<div class="col-4">
    <!-- Post -->
    <div class="mb-3">
        <label for="postLandOwner" class="form-label">Post</label>
        <input type="text" id="postLandOwner" name="postLandOwner" class="form-control">
        <span id="postLandOwnerError" class="text-danger"></span>
    </div>
</div>
</div>

<div class="row mb-3">
<!-- Place, Post, Panchayath, District -->
<div class="col-4">
    <label for="panchayathLandOwner" class="form-label">Panchayath</label>
    <input type="text" id="panchayathLandOwner" name="panchayathLandOwner" class="form-control">
    <span id="panchayathLandOwnerError" class="text-danger"></span>
</div>
<div class="col-4">
    <label for="districtLandOwner" class="form-label">District</label>
    <input type="text" id="districtLandOwner" name="districtLandOwner" class="form-control">
    <span id="districtLandOwnerError" class="text-danger"></span>
</div>
<div class="col-4">
    <label for="mobileLandOwner" class="form-label">Mobile</label>
    <input type="text" id="mobileLandOwner" name="mobileLandOwner" class="form-control">
    <span id="mobileLandOwnerError" class="text-danger"></span>
</div>
</div>

<!-- Type of Well -->
<div class="row">
<div class="col-12">
    <div class="mb-3">
        <label class="form-label">Type of Well</label>
        <select id="typeOfWell" name="typeOfWell" class="form-select">
            <option value="boreWell">Bore Well</option>
            <option value="openWell">Open Well</option>
            <option value="indiaMark2HandPump">India Mark 2 Hand Pump</option>
            <option value="mazraWell">Mazra Well</option>
            <option value="personalHygieneCorner">Personal Hygiene Corner</option>
        </select>
        <span id="typeOfWellError" class="text-danger"></span>
    </div>
</div>
</div>

<!-- Expected Depth, Diameter, Budget Estimated -->
<div class="row mb-3">
<div class="col-4">
    <label for="expectedDepth" class="form-label">Expected Depth of the Well (Feet)</label>
    <input type="text" id="expectedDepth" name="expectedDepth" class="form-control">
    <span id="expectedDepthError" class="text-danger"></span>
</div>
<div class="col-4">
    <label for="diameter" class="form-label">Diameter</label>
    <input type="text" id="diameter" name="diameter" class="form-control">
    <span id="diameterError" class="text-danger"></span>
</div>
<div class="col-4">
    <label for="budgetEstimated" class="form-label">Budget Estimated</label>
    <input type="text" id="budgetEstimated" name="budgetEstimated" class="form-control">
    <span id="budgetEstimatedError" class="text-danger"></span>
</div>
</div>

<div class="row">
<div class="col-6">
    <!-- Nature of Land -->
    <div class="mb-3">
        <label for="natureOfLand" class="form-label">Nature of Land</label>
        <input type="text" id="natureOfLand" name="natureOfLand" class="form-control">
        <span id="natureOfLandError" class="text-danger"></span>
    </div>
</div>

<div class="col-6">
    <!-- Current Water Source -->
    <div class="mb-3">
        <label for="currentWaterSource" class="form-label">How you are getting drinking water now?</label>
        <textarea id="currentWaterSource" name="currentWaterSource" class="form-control" rows="3"></textarea>
        <span id="currentWaterSourceError" class="text-danger"></span>
    </div>
</div>
</div>

<div class="row">
<div class="col-6">
    <!-- Need of Electric Pump -->
    <div class="mb-3">
        <label class="form-label">Need of Electric Pump</label>
        <select id="needElectricPump" name="needElectricPump" class="form-select">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        <span id="needElectricPumpError" class="text-danger"></span>
    </div>
</div>
<div class="col-6">
    <!-- Whether the Well Used for Agriculture -->
    <div class="mb-3">
        <label class="form-label">Whether the Well Used for Agriculture Purposes?</label>
        <select id="usedForAgriculture" name="usedForAgriculture" class="form-select">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        <span id="usedForAgricultureError" class="text-danger"></span>
    </div>
</div>
</div>

<!-- Submit Button -->
<div class="row">
<div class="col-5"></div>
<div class="col-1">
    <button type="submit" class="btn box mt-2">Submit</button>
</div>
</div>
</form>
            </div>
        </div>
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

    
<!--data table -->
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
              
                <div class="col-12">

                    <h4 class="but p-3 text-center rounded fw-bold border border-success" style="color:white;">SWEET WATER PROJECT APPLICATIONS</h4>
        
                </div>
            </div>
        </div>

        <div class="card-body">

<table id="sweetwaterTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
          <th>ApplicationId</th>
            <th>Applicant Name</th>
            <th>Location</th>
            <th>Address</th>
            <th>Village</th>
            <th>Post</th>
            <th>Panchayath</th>
            <th>District</th>
            <th>State</th>
            <th>Pin</th>
            <th>Contact 1</th>
            <th>Contact 2</th>
            <th>No Of Benefited People</th>
            <th>Total Male</th>
            <th>Total Female</th>
            <th>Job Of Applicant</th>
            <th>Average Monthly Income</th>
            <th>Owner Of Land</th>
            <th>Address Of Land Owner</th>
            <th>Place</th>
            <th>Post Land Owner</th>
            <th>Panchayath Land Owner</th>
            <th>District Land Owner</th>
            <th>Mobile Land Owner</th>
            <th>Type Of Well</th>
            <th>Expected Depth</th>
            <th>Diameter</th>
            <th>Budget Estimated</th>
            <th>Nature Of Land</th>
            <th>Current Water Source</th>
            <th>Need Electric Pump</th>
            <th>Used For Agriculture</th>
            <th>Beneficiaries</th>
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
@push('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>

<script> 

$(document).ready(function() {
    $('#sweetwaterTable').DataTable({
        select: true,
        serverSide: false, // Set this to true if you’re using server-side processing
        dom: 'Bfrtlip',
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Download Excel',
                    title: 'sweet water project',
                    titleAttr: 'Export to Excel',
                    className: 'custombutton',
                    exportOptions: { 
                        columns: function (idx, data, node)
                         {               
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
                url: `{{ url('/user/sweetwater/project/datatable') }}`,
                type: 'GET',
                dataSrc: 'data',
                
            },
                "columns": [
       
                     
            { data: 'applicationId' },       
            { data: 'applicantName' },
            { data: 'location' },
            { data: 'address' },
            { data: 'village' },
            { data: 'post' },
            { data: 'panchayath' },
            { data: 'district' },
            { data: 'state' },
            { data: 'pin' },
            { data: 'contact1' },
            { data: 'contact2' },
            { data: 'noOfBenefitedPeople' },
            { data: 'totalMale' },
            { data: 'totalFemale' },
            { data: 'jobOfApplicant' },
            { data: 'averageMonthlyIncome' },
            { data: 'ownerOfLand' },
            { data: 'addressOfLandOwner' },
            { data: 'place' },
            { data: 'postLandOwner' },
            { data: 'panchayathLandOwner' },
            { data: 'districtLandOwner' },
            { data: 'mobileLandOwner' },
            { data: 'typeOfWell' },
            { data: 'expectedDepth' },
            { data: 'diameter' },
            { data: 'budgetEstimated' },
            { data: 'natureOfLand' },
            { data: 'currentWaterSource' },
            { data: 'needElectricPump' },
            { data: 'usedForAgriculture' },
            { data: 'beneficiaries' }, // Column for beneficiaries
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                                      
                    return `
                    <div class="dd d-flex">
                        <button class="btn btn-primary btn-sm view-more me-1" data-id="${row.sweetwaterId}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <button class="btn btn-warning btn-sm edit me-1" data-id="${row.sweetwaterId}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete" data-id="${row.sweetwaterId}" data-name="${row.applicantName}">
                            <i class="bi bi-trash"></i>
                        </button>                       
                       
                    `;
                } 
            },
                    
                ]
            });
        });

function addBeneficiary() {
    const beneficiaryFields = document.getElementById('beneficiary-fields');
    const newRow = document.createElement('div');
    newRow.className = 'beneficiary-row row mb-2';
    newRow.innerHTML = `
        <div class="col-6">
            <input type="text" name="beneficiaryName[]" class="form-control" placeholder="Name">
        </div>
        <div class="col-5">
            <input type="text" name="beneficiaryPhone[]" class="form-control" placeholder="Phone Number">
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-warning btn-sm remove-btn" onclick="removeBeneficiary(this)">-</button>
        </div>
    `;
    beneficiaryFields.appendChild(newRow);
}

function removeBeneficiary(button) {
    button.parentElement.parentElement.remove();
}


</script> 
<script>
function getBeneficiaries() {
    let beneficiaries = [];
    $('.beneficiary-row').each(function() {
        let name = $(this).find('input[name="beneficiaryName[]"]').val();
        let phone = $(this).find('input[name="beneficiaryPhone[]"]').val();
        if (name && phone) {
            beneficiaries.push({
                name: name,
                phone_number: phone
            });
        }
    });
    return beneficiaries;
}



$(document).ready(function() {
    $('#SweetWaterProjectForm').on('submit', function(e) {
        e.preventDefault();

        // Clear previous error messages
        $('.text-danger').text('');

        // Create a FormData object from the form
        var formData = new FormData(this);

        // Append the beneficiaries data
        formData.append('beneficiaries', JSON.stringify(getBeneficiaries()));

        $.ajax({
            url: `{{ url('/user/sweetwater/project/new') }}`,
            type: 'POST',
            data: formData,
            processData: false, // Important: Do not process the data
            contentType: false, // Important: Do not set content type
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#SweetWaterProjectModal').modal('hide');
                $('#sweetwaterTable').DataTable().ajax.reload();
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
    const sweetwaterId = $(this).data('id');
    console.log('Clicked sweet water care ID:', sweetwaterId);

    if (sweetwaterId !== undefined) {
        $.ajax({
            url: `{{ url('/user/sweetwater/project/view/more') }}/${sweetwaterId}`, // Laravel route
            method: 'GET',
            success: function(response) {
                console.log('Response data:', response);

                const data = response.data;
                // Define the list of required keys
                const requiredKeys = [
                    'applicantName', 'location', 'address', 'village', 'post', 'panchayath', 'district',
                    'state', 'pin', 'contact1', 'contact2', 'beneficiaries', 'noOfBenefitedPeople',
                    'totalMale', 'totalFemale', 'jobOfApplicant', 'averageMonthlyIncome', 'ownerOfLand',
                    'addressOfLandOwner', 'place', 'postLandOwner', 'panchayathLandOwner', 'districtLandOwner',
                    'mobileLandOwner', 'typeOfWell', 'expectedDepth', 'diameter', 'budgetEstimated',
                    'natureOfLand', 'currentWaterSource', 'needElectricPump', 'usedForAgriculture'
                ];

                // Target the modal body
                const $modalBody = $('#SweetWaterModalBody');
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
                $('#SweetWaterModal').modal('show');
            },
            error: function(xhr) {
                console.error('An error occurred:', xhr.responseText);
            }
        });
    }
});

// edit 

$(document).on('click', '.edit', function() {
    const sweetWaterProjectId = $(this).data('id');
    $.get(`{{ url('/user/sweetwater/project/edit') }}/${sweetWaterProjectId}`, function(data) {
        // Check the structure of the received data
        console.log(data); // Check the structure in the console

        // Fill the form with data
        $('input[name="sweetwaterId"]').val(data.sweetwaterId);
        $('input[name="applicantName"]').val(data.applicantName);
        $('input[name="location"]').val(data.location);
        $('textarea[name="address"]').val(data.address);
        $('input[name="village"]').val(data.village);
        $('input[name="post"]').val(data.post);
        $('input[name="panchayath"]').val(data.panchayath);
        $('input[name="district"]').val(data.district);
        $('input[name="state"]').val(data.state);
        $('input[name="pin"]').val(data.pin);
        $('input[name="contact1"]').val(data.contact1);
        $('input[name="contact2"]').val(data.contact2);
        $('input[name="noOfBenefitedPeople"]').val(data.noOfBenefitedPeople);
        $('input[name="totalMale"]').val(data.totalMale);
        $('input[name="totalFemale"]').val(data.totalFemale);
        $('input[name="jobOfApplicant"]').val(data.jobOfApplicant);
        $('input[name="averageMonthlyIncome"]').val(data.averageMonthlyIncome);
        $('textarea[name="ownerOfLand"]').val(data.ownerOfLand);
        $('textarea[name="addressOfLandOwner"]').val(data.addressOfLandOwner);
        $('input[name="place"]').val(data.place);
        $('input[name="postLandOwner"]').val(data.postLandOwner);
        $('input[name="panchayathLandOwner"]').val(data.panchayathLandOwner);
        $('input[name="districtLandOwner"]').val(data.districtLandOwner);
        $('input[name="mobileLandOwner"]').val(data.mobileLandOwner);
        $('input[name="expectedDepth"]').val(data.expectedDepth);
        $('input[name="diameter"]').val(data.diameter);
        $('input[name="budgetEstimated"]').val(data.budgetEstimated);
        $('input[name="natureOfLand"]').val(data.natureOfLand);
        $('textarea[name="currentWaterSource"]').val(data.currentWaterSource);

        // Set select fields
        $('#typeOfWell').val(data.typeOfWell);
        $('#needElectricPump').val(data.needElectricPump);
        $('#usedForAgriculture').val(data.usedForAgriculture);

        // Populate beneficiaries dynamically
        $('#Editbeneficiary-fields').empty();
        if (Array.isArray(data.beneficiaries)) {
            data.beneficiaries.forEach(function(beneficiary) {
                $('#Editbeneficiary-fields').append(`
                    <div class="beneficiary-row row mb-2">
                        <div class="col-6">
                            <input type="text" name="beneficiaryName[]" class="form-control" placeholder="Name" value="${escapeHtml(beneficiary.name)}">
                            <span class="beneficiaryNameError text-danger"></span>
                        </div>
                        <div class="col-5">
                            <input type="text" name="beneficiaryPhone[]" class="form-control" placeholder="Phone Number" value="${escapeHtml(beneficiary.phone_number)}">
                            <span class="beneficiaryPhoneError text-danger"></span>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-warning btn-sm remove-btn" onclick="removeBeneficiaryedit(this)">-</button>
                        </div>
                        
               
                    </div>
                `);
            });
        } else {
            console.error('Beneficiaries data is not an array:', data.beneficiaries);
        }

        // Show the modal
        $('#EditSweetWaterProjectModal').modal('show');
    }).fail(function(xhr, status, error) {
        console.error('Error fetching data:', status, error);
    });
});

// Function to escape HTML entities
function escapeHtml(text) {
    if (text === null) {
        return '';
    }
    return text.toString().replace(/&/g, "&amp;")
                           .replace(/</g, "&lt;")
                           .replace(/>/g, "&gt;")
                           .replace(/"/g, "&quot;")
                           .replace(/'/g, "&#039;");
}


function addBeneficiaryedit() {
    const beneficiaryFields = document.getElementById('Editbeneficiary-fields');
    const newRow = document.createElement('div');
    newRow.className = 'beneficiary-row row mb-2';
    newRow.innerHTML = `
        <div class="col-6">
            <input type="text" name="beneficiaryName[]" class="form-control" placeholder="Name">
        </div>
        <div class="col-5">
            <input type="text" name="beneficiaryPhone[]" class="form-control" placeholder="Phone Number">
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-warning btn-sm remove-btn" onclick="removeBeneficiary(this)">-</button>
        </div>
    `;
    beneficiaryFields.appendChild(newRow);
}

function removeBeneficiaryedit(button) {
    button.parentElement.parentElement.remove();
}



// update sweet water project 
$(document).ready(function() {
    $('#EditSweetWaterProjectForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;

        // Gather form data
        let formData = $(this).serializeArray();
        // Add beneficiaries data to formData
        let beneficiaries = getBeneficiariesUpdate();
        formData.push({ name: 'beneficiaries', value: JSON.stringify(beneficiaries) });

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('user.updateSweetWaterProject') }}",
            data: formData,
            dataType: 'json',
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },
            success: function(data) {
                if (data.status == 0) {
                    // Handle validation errors or other issues
                    $.each(data.error, function(prefix, val) {
                        $('#' + prefix + 'Error').text(val[0]);
                    });
                } else {
                    // Hide the modal and reset the form on success
                    $('#EditSweetWaterProjectModal').modal('hide');
                    $('#Editbeneficiary-fields').empty(); // Clear beneficiaries fields
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

// Function to get beneficiaries data from the form
function getBeneficiariesUpdate() {
    let beneficiaries = [];
    $('.beneficiary-row').each(function() {
        let name = $(this).find('input[name="beneficiaryName[]"]').val();
        let phone = $(this).find('input[name="beneficiaryPhone[]"]').val();
        if (name && phone) {
            beneficiaries.push({
                name: name,
                phone_number: phone
            });
        }
    });
    return beneficiaries;
} 

//delete sweet water
$(document).on('click', '.delete', function() {
    const sweetwaterId = $(this).data('id');
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
            url: `{{ url('/user/sweetwater/project/delete') }}/${sweetwaterId}`,
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
                $('#SweetWaterTable').DataTable().ajax.reload();
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

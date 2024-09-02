@extends('layouts.master')
@section('css')
<link href="{{ asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css">
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

<div class="float-end d-none d-md-block">
    <button type="button" class="btn box btn-sm mb-1 float-end" data-bs-toggle="modal" data-bs-target="#ProjectApplicationModal">
        Add
    </button>
</div>

<div class="modal fade" id="ProjectApplicationModal" tabindex="-1" aria-labelledby="ProjectApplicationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="ProjectApplicationModalLabel">Project Application Form</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <form>
                    <!-- Applicant Details -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="applicantName">Name of Applicant</label>
                                <input type="text" id="applicantName" name="applicantName" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="committeeName">Name of Committee</label>
                                <input type="text" id="committeeName" name="committeeName" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="regNumber">Reg. Number</label>
                                <input type="text" id="regNumber" name="regNumber" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="year">Year</label>
                                <input type="text" id="year" name="year" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="village">Village</label>
                                <input type="text" id="village" name="village" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="post">Post</label>
                                <input type="text" id="post" name="post" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="panchayath">Panchayath</label>
                                <input type="text" id="panchayath" name="panchayath" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="district">District</label>
                                <input type="text" id="district" name="district" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="contactNumber1">Contact Number 1</label>
                                <input type="text" id="contactNumber1" name="contactNumber1" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="contactNumber2">Contact Number 2</label>
                                <input type="text" id="contactNumber2" name="contactNumber2" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="submittedBefore">Have you submitted any applications before?</label>
                                <input type="text" id="submittedBefore" name="submittedBefore" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="receivedSupport">Have they received any financial support from RCFI?</label>
                                <input type="text" id="receivedSupport" name="receivedSupport" class="form-control">
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
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluLocation">Location</label>
                                <input type="text" id="mahalluLocation" name="mahalluLocation" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluVillage">Village</label>
                                <input type="text" id="mahalluVillage" name="mahalluVillage" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluDistrict">District</label>
                                <input type="text" id="mahalluDistrict" name="mahalluDistrict" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="mahalluState">State</label>
                                <input type="text" id="mahalluState" name="mahalluState" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="noOfFamilies">No. of Families in Mahallu</label>
                                <input type="text" id="noOfFamilies" name="noOfFamilies" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="requirement">Requirement (Repairing / New Construction)</label>
                                <input type="text" id="requirement" name="requirement" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="hasBuilding">Does the proposed site already have a building?</label>
                                <input type="text" id="hasBuilding" name="hasBuilding" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="buildingStatus">If yes, Status of Current Building</label>
                                <input type="text" id="buildingStatus" name="buildingStatus" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="culturalCenter">Is there a cultural center nearby?</label>
                                <input type="text" id="culturalCenter" name="culturalCenter" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="distanceToCulturalCenter">Distance to the closest Cultural Centre (KM)</label>
                                <input type="text" id="distanceToCulturalCenter" name="distanceToCulturalCenter" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="benefitedHouseholds">Total benefited households from the current structure</label>
                                <input type="text" id="benefitedHouseholds" name="benefitedHouseholds" class="form-control">
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
                                    <option value="CC only">CC only</option>
                                    <option value="CC & Education Centre">CC & Education Centre</option>
                                    <option value="CC & Shopping Complex">CC & Shopping Complex</option>
                                    <option value="CC, Edu. Centre & Shopping Complex">CC, Edu. Centre & Shopping Complex</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="buildingArea">Area of proposed project - building (Sqft)</label>
                                <input type="text" id="buildingArea" name="buildingArea" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="landArea">Land Area (Sqft)</label>
                                <input type="text" id="landArea" name="landArea" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="proposedBudget">Proposed Budget</label>
                                <input type="text" id="proposedBudget" name="proposedBudget" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="proposedBeneficiary">Proposed Beneficiary (Household)</label>
                                <input type="text" id="proposedBeneficiary" name="proposedBeneficiary" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="legalApprovals">Status of Legal Approvals</label>
                                <input type="text" id="legalApprovals" name="legalApprovals" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="area">Area</label>
                                <input type="text" id="area" name="area" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5"></div>
                        <div class="col-1">
                            <button class="btn box mt-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

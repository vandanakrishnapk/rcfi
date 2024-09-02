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

    <div class="float-end d-none d-md-block">
        <button type="button" class="btn box btn-sm mb-1 float-end" data-bs-toggle="modal" data-bs-target="#MarkazOrphanCareModal">
            Add
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="MarkazOrphanCareModal" tabindex="-1" aria-labelledby="MarkazOrphanCareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header box">
                    <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Education Center Application</h1>
                    <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">
                    <form>
                        <!-- Applicant Information -->
                        <div class="row">
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

                        <div class="row">
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

                        <div class="row">
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

                        <div class="row">
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

                        <div class="row">
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

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="contact1">Contact Number 1</label>
                                    <input type="text" id="contact1" name="contact1" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="contact2">Contact Number 2</label>
                                    <input type="text" id="contact2" name="contact2" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Previous Applications and Support -->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="submittedApplication">Submitted Application Before</label>
                                    <input type="text" id="submittedApplication" name="submittedApplication" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="financialSupport">Received Financial Support from RCFI</label>
                                    <input type="text" id="financialSupport" name="financialSupport" class="form-control">
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
                                </div>
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="location">Location</label>
                                        <input type="text" id="location" name="mahalluLocation" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="village">Village</label>
                                        <input type="text" id="village" name="mahalluVillage" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="district">District</label>
                                        <input type="text" id="district" name="mahalluDistrict" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="state">State</label>
                                        <input type="text" id="state" name="mahalluState" class="form-control">
                                    </div>
                                </div>
                            </div> 


                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="district">No Of Families In Mahallu</label>
                                        <input type="text" id="district" name="noOfFamiliesInMahallu" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="state">Requirement ( Repairing / New construction)</label>
                                        <input type="text" id="state" name="reuirementRepairing" class="form-control">
                                    </div>
                                </div>
                            </div> 

    
    
                        
                        <h5>Current Status:</h5>


                        <div class="row">
                            <div class="col-6">
                                
                                <label for="">Proposed Site Has Building</label><br>
                                <div class="col-6 d-flex justify-content-between">
                                   
                                    <div class="form-check">
                                       
                                        <input type="radio" name="proposedSiteBuilding" class="form-check-input" value="Yes"> 
                                        <label class="form-check-label" for="flexCheckDefault">
                                           <span> Yes</span>
                                          </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="da" name="proposedSiteBuilding" class="form-check-input" value="No">
                                        <label class="form-check-label" for="flexCheckDefault">
                                           No
                                          </label>
                                    </div>                 
                             </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="currentBuildingStatus">Status of Current Building</label>
                                    <input type="text" id="currentBuildingStatus" name="currentBuildingStatus" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label for="studentsNumber">Number of Students</label>
                                    <input type="text" id="studentsNumber" name="studentsNumber" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label for="boysNumber">Boys</label>
                                    <input type="text" id="boysNumber" name="boysNumber" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label for="girlsNumber">Girls</label>
                                    <input type="text" id="girlsNumber" name="girlsNumber" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group mb-3">
                                    <label for="educationCenterNearby">Education Center Nearby</label>
                                    <input type="text" id="educationCenterNearby" name="educationCenterNearby" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                           
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="culturalCentreDistance">Distance to Nearby Cultural Centre (KM)</label>
                                    <input type="text" id="culturalCentreDistance" name="culturalCentreDistance" class="form-control">
                                </div>
                            </div> 
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="syllabus">Syllabus</label>
                                    <input type="text" id="syllabus" name="syllabus" class="form-control">
                                </div>
                            </div>
                        </div>

                        <h5>Proposed Project Details:</h5>


                        <div class="row">                            
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="projectType">Type of Project</label>
                                    <select id="projectType" name="projectType" class="form-control">
                                        <option value="orphanage">Orphanage</option>
                                        <option value="classRoom">Class Room</option>
                                        <option value="educationAcademy">Education Academy</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="buildingArea">Area of Proposed Project - Building (Sq)</label>
                                    <input type="text" id="buildingArea" name="buildingArea" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="landArea">Land Area (Sq)</label>
                                    <input type="text" id="landArea" name="landArea" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="classroomsNumber">Number of Classrooms</label>
                                    <input type="text" id="classroomsNumber" name="classroomsNumber" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="classroomsNumber">Number of Students</label>
                                    <input type="text" id="noOfStudents" name="numberOfStudents" class="form-control">
                                </div>
                            </div> 


                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="proposedBudget">Proposed Budget</label>
                                    <input type="text" id="proposedBudget" name="proposedBudget" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="legalApprovals">Status of Legal Approvals</label>
                                    <input type="text" id="legalApprovals" name="legalApprovals" class="form-control">
                                </div>
                            </div>
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

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
@slot('page_title') Data tables @endslot
@slot('subtitle') Tables @endslot
@endcomponent

<div class="float-end d-none d-md-block">
    <button type="button" class="btn box btn-sm mb-1 float-end" data-bs-toggle="modal" data-bs-target="#MarkazOrphanCareModal">
        Add
    </button>
    <div class="row">
        <div class="col-12">
            <div class="modal fade" id="MarkazOrphanCareModal" tabindex="-1" aria-labelledby="MarkazOrphanCareModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header box">
                            <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Sweet Water Project</h1>
                            <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-5" id="MarkazOrphanCare">
                            <form>
                                @csrf 
                                <div class="row">
                                    <div class="col-6">
                                         <!-- Name of Applicant -->
                                <div class="mb-3">
                                    <label for="applicantName" class="form-label">Name of Applicant</label>
                                    <input type="text" id="applicantName" name="applicantName" class="form-control" >
                                </div>
                                    </div>
                                    <div class="col-6">
                                         <!-- Location -->
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" id="location" name="location" class="form-control">
                                </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                         <!-- Address -->
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea id="address" name="address" class="form-control" rows="3" ></textarea>
                                </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <!-- Village -->
                                <div class="mb-3">
                                    <label for="village" class="form-label">Village</label>
                                    <input type="text" id="village" name="village" class="form-control">
                                </div>
                                    </div>

                                    <div class="col-4">
                                            <!-- Post -->
                                <div class="mb-3">
                                    <label for="post" class="form-label">Post</label>
                                    <input type="text" id="post" name="post" class="form-control">
                                </div>
                                    </div>

                                    <div class="col-4">
                                        <!-- Panchayath -->
                                <div class="mb-3">
                                    <label for="panchayath" class="form-label">Panchayath</label>
                                    <input type="text" id="panchayath" name="panchayath" class="form-control">
                                </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-4">
                                                   <!-- District -->
                                <div class="mb-3">
                                    <label for="district" class="form-label">District</label>
                                    <input type="text" id="district" name="district" class="form-control">
                                </div>
                                    </div>

                                    <div class="col-4">
                                          <!-- State -->
                                <div class="mb-3">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" id="state" name="state" class="form-control">
                                </div>
                                    </div>

                                    <div class="col-4">
                                        
                                <!-- Pin -->
                                <div class="mb-3">
                                    <label for="pin" class="form-label">Pin</label>
                                    <input type="text" id="pin" name="pin" class="form-control">
                                </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">


                                <!-- Contact 1 & 2 -->
                                <div class="mb-3">
                                    <label for="contact1" class="form-label">Contact 1</label>
                                    <input type="text" id="contact1" name="contact1" class="form-control">
                                </div>

                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                        <label for="contact2" class="form-label mt-2">Contact 2</label>
                                        <input type="text" id="contact2" name="contact2" class="form-control">
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
                                                </div>
                                                <div class="col-5">
                                                    <input type="text" name="beneficiaryPhone[]" class="form-control" placeholder="Phone Number">
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
                                    </div>
                                    <div class="col-4">
                                        <label for="totalMale" class="form-label">Total Male</label>
                                        <input type="text" id="totalMale" name="totalMale" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label for="totalFemale" class="form-label">Total Female</label>
                                        <input type="text" id="totalFemale" name="totalFemale" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <!-- Job of Applicant, Average Monthly Income -->
                                <div class="mb-3">
                                    <label for="jobOfApplicant" class="form-label">Job of Applicant</label>
                                    <input type="text" id="jobOfApplicant" name="jobOfApplicant" class="form-control">
                                </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3">
                                        <label for="averageMonthlyIncome" class="form-label mt-2">Average Monthly Income</label>
                                        <input type="text" id="averageMonthlyIncome" name="averageMonthlyIncome" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="col-12">
                                           <!-- Owner of the proposed land -->
                                <div class="mb-3">
                                    <label for="ownerOfLand" class="form-label">Owner of the Proposed Land</label>
                                    <textarea id="ownerOfLand" name="ownerOfLand" class="form-control" rows="3"></textarea>
                                </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                                   <!-- Address of Land Owner -->
                                        <div class="mb-3">
                                            <label for="addressOfLandOwner" class="form-label">Address of Land Owner</label>
                                            <textarea id="addressOfLandOwner" name="addressOfLandOwner" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="place" class="form-label">Place</label>
                                        <input type="text" id="place" name="place" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label for="postLandOwner" class="form-label">Post</label>
                                        <input type="text" id="postLandOwner" name="postLandOwner" class="form-control">
                                    </div>
                                </div>
                             

                     
                               

                                <!-- Place, Post, Panchayath, District -->
                                <div class="row mb-3">
                                 
                                   
                                    <div class="col-4">
                                        <label for="panchayathLandOwner" class="form-label">Panchayath</label>
                                        <input type="text" id="panchayathLandOwner" name="panchayathLandOwner" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label for="districtLandOwner" class="form-label">District</label>
                                        <input type="text" id="districtLandOwner" name="districtLandOwner" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label for="mobileLandOwner" class="form-label">Mobile</label>
                                        <input type="text" id="mobileLandOwner" name="mobileLandOwner" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                         <!-- Type of Well -->
                                <div class="mb-3">
                                    <label class="form-label">Type of Well</label>
                                    <select id="typeOfWell" name="typeOfWell" class="form-select">
                                        <option value="boreWell">Bore Well</option>
                                        <option value="openWell">Open Well</option>
                                        <option value="indiaMark2HandPump">India Mark 2 Hand Pump</option>
                                        <option value="mazraWell">Mazra Well</option>
                                        <option value="personalHygieneCorner">Personal Hygiene Corner</option>
                                    </select>
                                </div>
                                    </div>
                                </div>

                               

                                <!-- Expected Depth, Diameter, Budget Estimated -->
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label for="expectedDepth" class="form-label">Expected Depth of the Well (Feet)</label>
                                        <input type="text" id="expectedDepth" name="expectedDepth" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label for="diameter" class="form-label">Diameter</label>
                                        <input type="text" id="diameter" name="diameter" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label for="budgetEstimated" class="form-label">Budget Estimated</label>
                                        <input type="text" id="budgetEstimated" name="budgetEstimated" class="form-control">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <!-- Nature of Land -->
                                <div class="mb-3">
                                    <label for="natureOfLand" class="form-label">Nature of Land</label>
                                    <input type="text" id="natureOfLand" name="natureOfLand" class="form-control">
                                </div>
                                    </div>

                                    <div class="col-6">
                                          <!-- Current Water Source -->
                                <div class="mb-3">
                                    <label for="currentWaterSource" class="form-label">How you are getting drinking water now?</label>
                                    <textarea id="currentWaterSource" name="currentWaterSource" class="form-control" rows="3"></textarea>
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
                                </div>
                                </div>
                              </div>                          

                               

                                <!-- Submit Button -->
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
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
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
@endsection

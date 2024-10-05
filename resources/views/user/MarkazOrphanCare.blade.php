@extends('user.template.master')
@section('css')
<!-- DataTables -->
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection
@section('body') <body data-sidebar="light"> @endsection
    @section('content')
   
    <div class="row mt-3">
        <div class="col-12">
            <div class="float-start">
                <a href="{{ route('user.getApplications')}}" class="btn btn-success btn-sm rounded-circle"><i class="bi bi-box-arrow-in-left fs-4 ms-1"></i></a>
            </div>
            <div class="float-end d-none d-md-block">
                <button type="button" class="btn btn-success mb-1 me-3 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#MarkazOrphanCareModal">
                    <i class="bi bi-person-plus-fill fs-5"></i>
                </button>
            </div>
        </div>
                <div class="row">
                    <div class="col-12">
            
              
            <div class="modal fade" id="MarkazOrphanCareModal" tabindex="-1" aria-labelledby="MarkazOrphanCareModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header box">
                            <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Markaz Orphan Care</h1>
                            <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-5" id="MarkazOrphanCare">
                         
                            <form id="orphanForm">
                            @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Name Of Orphan</label>
                                            <input type="text" name="nameOfOrphan" class="form-control">
                                            <span id="nameOfOrphanError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Name Of Father</label>
                                            <input type="text" name="nameOfFather" class="form-control">
                                            <span id="nameOfFatherError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Name Of GrandFather</label>
                                            <input type="text" name="nameOfGrandFather" class="form-control">
                                            <span id="nameOfGrandFatherError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Name Of Mother</label>
                                            <input type="text" name="nameOfMother" class="form-control">
                                            <span id="nameOfMotherError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Name Of MothersFather</label>
                                            <input type="text" name="nameOfMothersFather" class="form-control">
                                            <span id="nameOfMothersFatherError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Male/Female</label>
                                            <input type="text" name="maleOrFemale" class="form-control">
                                            <span id="maleOrFemaleError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group mb-3">
                                            <label for="">Date of Birth</label>
                                            <input type="text" name="dateOfBirth" class="form-control">
                                            <span id="dateOfBirthError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group mb-3">
                                            <label for="">Age</label>
                                            <input type="text" name="Age" class="form-control">
                                            <span id="AgeError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group mb-3">
                                            <label for="">Aadhar Number</label>
                                            <input type="text" name="aadharNumber" class="form-control">
                                            <span id="aadharNumberError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Name Of Present Guardian</label>
                                            <input type="text" name="nameOfPresentGuardian" class="form-control">
                                            <span id="nameOfPresentGuardianError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Relation with Orphan</label>
                                            <input type="text" name="relationWithOrphan" class="form-control">
                                            <span id="relationWithOrphanError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Date of Death(Father)</label>
                                            <input type="text" name="dateOfDeathOfFather" class="form-control">
                                            <span id="dateOfDeathOfFatherError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Cause Of Death</label>
                                            <input type="text" name="causeOfDeath" class="form-control">
                                            <span id="causeOfDeathError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Mother Alive/Not</label>
                                            <input type="text" name="motherAliveOrNot" class="form-control">
                                            <span id="motherAliveOrNotError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">If Not/Date Of Death</label>
                                            <input type="text" name="motherDateOfDeath" class="form-control">
                                            <span id="motherDateOfDeathError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Cause Of Death</label>
                                            <input type="text" name="motherCauseOfDeath" class="form-control">
                                            <span id="motherCauseOfDeathError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Mother Re-Married/not</label>
                                            <input type="text" name="motherReMarriedOrNot" class="form-control">
                                            <span id="motherReMarriedOrNotError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-5">
                                        <div class="form-group mb-3">
                                            <label for="">No Of Brothers And Sisters</label>
                                            <input type="text" name="noOfBrothersAndSisters" class="form-control">
                                            <span id="noOfBrothersAndSistersError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group mb-3">
                                            <label for="">Male</label>
                                            <input type="text" name="maleSiblings" class="form-control">
                                            <span id="maleSiblingsError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group mb-3">
                                            <label for="">Female</label>
                                            <input type="text" name="femaleSiblings" class="form-control">
                                            <span id="femaleSiblingsError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Monthly Income</label>
                                            <input type="text" name="monthlyIncome" class="form-control">
                                            <span id="monthlyIncomeError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Monthly Expense</label>
                                            <input type="text" name="monthlyExpense" class="form-control">
                                            <span id="monthlyExpenseError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <label for="">Type Of House</label><br>
                                    <div class="col-6 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input type="radio" name="typeOfHouse" class="form-check-input" value="Own House"> 
                                            <label class="form-check-label" for="typeOfHouseOwn">
                                                <span> Own House</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="typeOfHouse" class="form-check-input" value="Rental">
                                            <label class="form-check-label" for="typeOfHouseRental">
                                                Rental
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="typeOfHouse" class="form-check-input" value="Flat">
                                            <label class="form-check-label" for="typeOfHouseFlat">
                                                Flat
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="typeOfHouse" class="form-check-input" value="Others">
                                            <label class="form-check-label" for="typeOfHouseOthers">
                                                Others
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-10">
                                        <div class="form-group mb-3">
                                            <label for="">Name Of School</label>
                                            <input type="text" name="nameOfSchool" class="form-control">
                                            <span id="nameOfSchoolError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group mb-3">
                                            <label for="">Class</label>
                                            <input type="text" name="classSchool" class="form-control">
                                            <span id="ClassError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Name Of Madrassa</label>
                                            <input type="text" name="nameOfMadrassa" class="form-control">
                                            <span id="nameOfMadrassaError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Class</label>
                                            <input type="text" name="classMadrassa" class="form-control">
                                            <span id="classMadrassaError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="">If Not Studying, Reason</label>
                                            <input type="text" name="notStudyReason" class="form-control">
                                            <span id="notStudyReasonError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="">Health Status</label>
                                            <input type="text" name="healthStatus" class="form-control">
                                            <span id="healthStatusError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="">Sponsorship Details If Any</label>
                                            <input type="text" name="sponsershipDetails" class="form-control">
                                            <span id="sponsorshipDetailsError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">House Name</label>
                                            <input type="text" name="houseName" class="form-control">
                                            <span id="houseNameError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Place</label>
                                            <input type="text" name="place" class="form-control">
                                            <span id="placeError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Town</label>
                                            <input type="text" name="town" class="form-control">
                                            <span id="townError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Post Office</label>
                                            <input type="text" name="postOffice" class="form-control">
                                            <span id="postOfficeError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group mb-3">
                                            <label for="">District</label>
                                            <input type="text" name="district" class="form-control">
                                            <span id="districtError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group mb-3">
                                            <label for="">State</label>
                                            <input type="text" name="state" class="form-control">
                                            <span id="stateError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group mb-3">
                                            <label for="">Pin Code</label>
                                            <input type="text" name="pinCode" class="form-control">
                                            <span id="pinCodeError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Mobile 1</label>
                                            <input type="text" name="mobile1" class="form-control">
                                            <span id="mobile1Error" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">Mobile 2</label>
                                            <input type="text" name="mobile2" class="form-control">
                                            <span id="mobile2Error" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                
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
           
<!-- view more markaz orphan care -->


  <div class="modal fade" id="markazOrphanCareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header custommodal">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Markaz Orphan Care</h1>
          <button type="button" class="btn-close customclose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="markazOrphanCareModalBody">
          
        </div>
       
      </div>
    </div>
  </div> 

  <!--edit markaz form modal -->

  <div class="modal fade" id="EditmarkazOrphanCareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header custommodal">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Markaz Orphan Care</h1>
          <button type="button" class="btn-close customclose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="EditmarkazOrphanCareModalBody">
            <form id="EditorphanForm">
                @csrf
                    <div class="row"> 
                        <div class="col-12">
                            <div class="form-group mb-3">
                               
                                <input type="text" name="orphancareId" class="form-control">

                            </div>
                        </div>
                        <div class="col-6">
                            
                            <div class="form-group mb-3">
                                <label for="">Name Of Orphan</label>
                                <input type="text" name="nameOfOrphan" class="form-control">
                                <span id="nameOfOrphanError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Name Of Father</label>
                                <input type="text" name="nameOfFather" class="form-control">
                                <span id="nameOfFatherError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Name Of GrandFather</label>
                                <input type="text" name="nameOfGrandFather" class="form-control">
                                <span id="nameOfGrandFatherError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Name Of Mother</label>
                                <input type="text" name="nameOfMother" class="form-control">
                                <span id="nameOfMotherError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Name Of MothersFather</label>
                                <input type="text" name="nameOfMothersFather" class="form-control">
                                <span id="nameOfMothersFatherError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Male/Female</label>
                                <input type="text" name="maleOrFemale" class="form-control">
                                <span id="maleOrFemaleError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group mb-3">
                                <label for="">Date of Birth</label>
                                <input type="text" name="dateOfBirth" class="form-control">
                                <span id="dateOfBirthError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group mb-3">
                                <label for="">Age</label>
                                <input type="text" name="Age" class="form-control">
                                <span id="AgeError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group mb-3">
                                <label for="">Aadhar Number</label>
                                <input type="text" name="aadharNumber" class="form-control">
                                <span id="aadharNumberError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Name Of Present Guardian</label>
                                <input type="text" name="nameOfPresentGuardian" class="form-control">
                                <span id="nameOfPresentGuardianError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Relation with Orphan</label>
                                <input type="text" name="relationWithOrphan" class="form-control">
                                <span id="relationWithOrphanError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Date of Death(Father)</label>
                                <input type="text" name="dateOfDeathOfFather" class="form-control">
                                <span id="dateOfDeathOfFatherError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Cause Of Death</label>
                                <input type="text" name="causeOfDeath" class="form-control">
                                <span id="causeOfDeathError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Mother Alive/Not</label>
                                <input type="text" name="motherAliveOrNot" class="form-control">
                                <span id="motherAliveOrNotError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">If Not/Date Of Death</label>
                                <input type="text" name="motherDateOfDeath" class="form-control">
                                <span id="motherDateOfDeathError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Cause Of Death</label>
                                <input type="text" name="motherCauseOfDeath" class="form-control">
                                <span id="motherCauseOfDeathError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Mother Re-Married/not</label>
                                <input type="text" name="motherReMarriedOrNot" class="form-control">
                                <span id="motherReMarriedOrNotError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group mb-3">
                                <label for="">No Of Brothers And Sisters</label>
                                <input type="text" name="noOfBrothersAndSisters" class="form-control">
                                <span id="noOfBrothersAndSistersError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group mb-3">
                                <label for="">Male</label>
                                <input type="text" name="maleSiblings" class="form-control">
                                <span id="maleSiblingsError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group mb-3">
                                <label for="">Female</label>
                                <input type="text" name="femaleSiblings" class="form-control">
                                <span id="femaleSiblingsError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Monthly Income</label>
                                <input type="text" name="monthlyIncome" class="form-control">
                                <span id="monthlyIncomeError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Monthly Expense</label>
                                <input type="text" name="monthlyExpense" class="form-control">
                                <span id="monthlyExpenseError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label for="">Type Of House</label><br>
                        <div class="col-6 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="radio" name="typeOfHouse" class="form-check-input" value="Own House"> 
                                <label class="form-check-label" for="typeOfHouseOwn">
                                    <span> Own House</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="typeOfHouse" class="form-check-input" value="Rental">
                                <label class="form-check-label" for="typeOfHouseRental">
                                    Rental
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="typeOfHouse" class="form-check-input" value="Flat">
                                <label class="form-check-label" for="typeOfHouseFlat">
                                    Flat
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="typeOfHouse" class="form-check-input" value="Others">
                                <label class="form-check-label" for="typeOfHouseOthers">
                                    Others
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group mb-3">
                                <label for="">Name Of School</label>
                                <input type="text" name="nameOfSchool" class="form-control">
                                <span id="nameOfSchoolError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group mb-3">
                                <label for="">Class</label>
                                <input type="text" name="classSchool" class="form-control">
                                <span id="ClassError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Name Of Madrassa</label>
                                <input type="text" name="nameOfMadrassa" class="form-control">
                                <span id="nameOfMadrassaError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Class</label>
                                <input type="text" name="classMadrassa" class="form-control">
                                <span id="classMadrassaError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="">If Not Studying, Reason</label>
                                <input type="text" name="notStudyReason" class="form-control">
                                <span id="notStudyReasonError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="">Health Status</label>
                                <input type="text" name="healthStatus" class="form-control">
                                <span id="healthStatusError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="">Sponsorship Details If Any</label>
                                <input type="text" name="sponsershipDetails" class="form-control">
                                <span id="sponsorshipDetailsError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">House Name</label>
                                <input type="text" name="houseName" class="form-control">
                                <span id="houseNameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Place</label>
                                <input type="text" name="place" class="form-control">
                                <span id="placeError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Town</label>
                                <input type="text" name="town" class="form-control">
                                <span id="townError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Post Office</label>
                                <input type="text" name="postOffice" class="form-control">
                                <span id="postOfficeError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="">District</label>
                                <input type="text" name="district" class="form-control">
                                <span id="districtError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="">State</label>
                                <input type="text" name="state" class="form-control">
                                <span id="stateError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="">Pin Code</label>
                                <input type="text" name="pinCode" class="form-control">
                                <span id="pinCodeError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Mobile 1</label>
                                <input type="text" name="mobile1" class="form-control">
                                <span id="mobile1Error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="">Mobile 2</label>
                                <input type="text" name="mobile2" class="form-control">
                                <span id="mobile2Error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
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

    
<!-- data table Markaz Orphan care -->
 <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
             
                <div class="row">
                
                    <div class="col-12">

                        <h4 class="but p-3 rounded fw-bold border border-success text-center" style="color:white;">MARKAZ OPEN CARE APPLICATIONS</h4>
            
                    </div>
                </div>
            </div>
            <div class="card-body">
               
                <table id="orphanTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Application ID</th>
                            <th>Name of Orphan</th>
                            <th>Father's Name</th>
                            <th>Grandfather's Name</th>
                            <th>Mother's Name</th>
                            <th>Mother's Father Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Age</th>
                            <th>Aadhar Number</th>
                            <th>Present Guardian</th>
                            <th>Relation with Orphan</th>
                            <th>Date of Father's Death</th>
                            <th>Cause of Death</th>
                            <th>Mother Alive</th>
                            <th>Mother's Date of Death</th>
                            <th>Mother's Cause of Death</th>
                            <th>Mother Re-married</th>
                            <th>No of Siblings</th>
                            <th>Male Siblings</th>
                            <th>Female Siblings</th>
                            <th>Monthly Income</th>
                            <th>Monthly Expense</th>
                            <th>Type of House</th>
                            <th>School Name</th>
                            <th>Class in School</th>
                            <th>Madrassa Name</th>
                            <th>Class in Madrassa</th>
                            <th>Reason for Not Studying</th>
                            <th>Health Status</th>
                            <th>Sponsorship Details</th>
                            <th>House Name</th>
                            <th>Place</th>
                            <th>Town</th>
                            <th>Post Office</th>
                            <th>District</th>
                            <th>State</th>
                            <th>Pin Code</th>
                            <th>Mobile 1</th>
                            <th>Mobile 2</th>
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

@push('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>

<script>
//data table 
$(document).ready(function() {
    $('#orphanTable').DataTable({
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
                    title: 'Markaz Orphan Care',
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
                url: `{{ url('/user/markaz/orphan/care/datatable/view') }}`,
                type: 'GET',
                dataSrc: 'data',
                
            },
                "columns": [
                    { "data": "applicationId",},                  
                    { "data": "nameOfOrphan" },
                    { "data": "nameOfFather" },
                    { "data": "nameOfGrandFather" },
                    { "data": "nameOfMother" },
                    { "data": "nameOfMothersFather" },
                    { "data": "maleOrFemale" },
                    { "data": "dateOfBirth" },
                    { "data": "age" },
                    { "data": "aadharNumber" },
                    { "data": "nameOfPresentGuardian" },
                    { "data": "relationWithOrphan" },
                    { "data": "dateOfDeathOfFather" },
                    { "data": "causeOfDeath" },
                    { "data": "motherAliveOrNot" },
                    { "data": "motherDateOfDeath" },
                    { "data": "motherCauseOfDeath" },
                    { "data": "motherReMarriedOrNot" },
                    { "data": "noOfBrothersAndSisters" },
                    { "data": "maleSiblings" },
                    { "data": "femaleSiblings" },
                    { "data": "monthlyIncome" },
                    { "data": "monthlyExpense" },
                    { "data": "typeOfHouse" },
                    { "data": "nameOfSchool" },
                    { "data": "classSchool" },
                    { "data": "nameOfMadrassa" },
                    { "data": "classMadrassa" },
                    { "data": "notStudyReason" },
                    { "data": "healthStatus" },
                    { "data": "sponsershipDetails" },
                    { "data": "houseName" },
                    { "data": "place" },
                    { "data": "town" },
                    { "data": "postOffice" },
                    { "data": "district" },
                    { "data": "state" },
                    { "data": "pinCode" },
                    { "data": "mobile1" },
                    { "data": "mobile2" },
                    {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                                      
                    return `
                    <div class="dd d-flex">
                        <button class="btn btn-primary btn-sm view-more me-1" data-id="${row.orphancareId}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <button class="btn btn-warning btn-sm edit me-1" data-id="${row.orphancareId}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete" data-id="${row.orphancareId}" data-name="${row.nameOfOrphan}">
                            <i class="bi bi-trash"></i>
                        </button>                       
                       
                    `;
                } 
            },
                    
                ]
            });
        });


     $(document).ready(function() {
            $('#orphanForm').on('submit', function(e) {
                e.preventDefault();

                // Clear previous error messages
                $('.text-danger').text('');

                var formData = $(this).serialize();

                $.ajax({
                    url: `{{ url('user/markaz/orphan/care/new') }}`,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        toastr.success(response.message, 'Success');
                        $('#MarkazOrphanCareModal').modal('hide');
                        $('#orphanTable').DataTable().ajax.reload();
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
    const orphanCareId = $(this).data('id');
    console.log('Clicked orphan care ID:', orphanCareId);

    if (orphanCareId !== undefined) {
        $.ajax({
            url: `{{ url('/user/markaz/orphan/care/view/more')}}/${orphanCareId}`, // Laravel route
            method: 'GET',
            success: function(data) {
                console.log('Response data:', data);
                
                // Define the list of required keys
                const requiredKeys = [
                    'nameOfOrphan', 'nameOfFather', 'nameOfGrandFather', 'nameOfMother', 'nameOfMothersFather',
                    'maleOrFemale', 'dateOfBirth', 'age', 'aadharNumber', 'nameOfPresentGuardian', 'relationWithOrphan',
                    'dateOfDeathOfFather', 'causeOfDeath', 'motherAliveOrNot', 'motherDateOfDeath', 'motherCauseOfDeath',
                    'motherReMarriedOrNot', 'noOfBrothersAndSisters', 'maleSiblings', 'femaleSiblings', 'monthlyIncome',
                    'monthlyExpense', 'typeOfHouse', 'nameOfSchool', 'classSchool', 'nameOfMadrassa', 'classMadrassa',
                    'notStudyReason', 'healthStatus', 'sponsershipDetails', 'houseName', 'place', 'town', 'postOffice',
                    'district', 'state', 'pinCode', 'mobile1', 'mobile2',
                ];

                // Target the modal body
                const $modalBody = $('#markazOrphanCareModalBody');
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
                $('#markazOrphanCareModal').modal('show');
            },
            error: function(xhr) {
                console.error('An error occurred:', xhr.responseText);
            }
        });
    }
});
//edit markaz open care
 $(document).on('click', '.edit', function() {
    const orphanCareId = $(this).data('id');
    
    $.get(`{{ url('/user/markaz/orphan/care/edit') }}/${orphanCareId}`, function(data) {
        // Fill the form with data
        // Set text inputs
        $('input[name="orphancareId"]').val(data.orphancareId);
        $('input[name="nameOfOrphan"]').val(data.nameOfOrphan);
        $('input[name="nameOfFather"]').val(data.nameOfFather);
        $('input[name="nameOfGrandFather"]').val(data.nameOfGrandFather);
        $('input[name="nameOfMother"]').val(data.nameOfMother);
        $('input[name="nameOfMothersFather"]').val(data.nameOfMothersFather);
        $('input[name="maleOrFemale"]').val(data.maleOrFemale);
        $('input[name="dateOfBirth"]').val(data.dateOfBirth);
        $('input[name="Age"]').val(data.age);  // Fixed name here
        $('input[name="aadharNumber"]').val(data.aadharNumber);
        $('input[name="nameOfPresentGuardian"]').val(data.nameOfPresentGuardian);
        $('input[name="relationWithOrphan"]').val(data.relationWithOrphan);
        $('input[name="dateOfDeathOfFather"]').val(data.dateOfDeathOfFather);
        $('input[name="causeOfDeath"]').val(data.causeOfDeath);
        $('input[name="motherAliveOrNot"]').val(data.motherAliveOrNot);
        $('input[name="motherDateOfDeath"]').val(data.motherDateOfDeath);
        $('input[name="motherCauseOfDeath"]').val(data.motherCauseOfDeath);
        $('input[name="motherReMarriedOrNot"]').val(data.motherReMarriedOrNot);
        $('input[name="noOfBrothersAndSisters"]').val(data.noOfBrothersAndSisters);
        $('input[name="maleSiblings"]').val(data.maleSiblings);
        $('input[name="femaleSiblings"]').val(data.femaleSiblings);
        $('input[name="monthlyIncome"]').val(data.monthlyIncome);
        $('input[name="monthlyExpense"]').val(data.monthlyExpense);
        $('input[name="nameOfSchool"]').val(data.nameOfSchool);
        $('input[name="classSchool"]').val(data.classSchool);
        $('input[name="nameOfMadrassa"]').val(data.nameOfMadrassa);
        $('input[name="classMadrassa"]').val(data.classMadrassa);
        $('input[name="notStudyReason"]').val(data.notStudyReason);
        $('input[name="healthStatus"]').val(data.healthStatus);
        $('input[name="sponsershipDetails"]').val(data.sponsershipDetails);
        $('input[name="houseName"]').val(data.houseName);
        $('input[name="place"]').val(data.place);
        $('input[name="town"]').val(data.town);
        $('input[name="postOffice"]').val(data.postOffice);
        $('input[name="district"]').val(data.district);
        $('input[name="state"]').val(data.state);
        $('input[name="pinCode"]').val(data.pinCode);
        $('input[name="mobile1"]').val(data.mobile1);
        $('input[name="mobile2"]').val(data.mobile2);

        // Set radio buttons
        $('input[name="typeOfHouse"]').each(function() {
            if ($(this).val() === data.typeOfHouse) {
                $(this).prop('checked', true);
            } else {
                $(this).prop('checked', false);
            }
        });

        // Show the modal
        $('#EditmarkazOrphanCareModal').modal('show');
    });
});

//update markaz open care
$(document).ready(function() {
    $('#EditorphanForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        let formData = $(this).serializeArray();

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('user.updateMarkazOrphanCare') }}",
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
                    $('#EditMarkazOrphanCareModal').modal('hide');
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

$(document).on('click', '.delete', function() {
    const orphanCareId = $(this).data('id');
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
            url: `{{ url('/user/markaz/orphan/care/delete') }}/${orphanCareId}`,
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
                $('#orphanTable').DataTable().ajax.reload();
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
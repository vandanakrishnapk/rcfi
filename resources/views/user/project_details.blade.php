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

@section('content')

     
<ul class="nav nav-tabs d-none d-sm-flex" role="tablist">
  <!-- Highlights Tab -->
  <li class="nav-item" role="presentation">
      <a class="nav-link active" id="TabControl-Highlights" data-bs-toggle="tab" href="#tab-highlights" role="tab" tabindex="0" aria-controls="tab-highlights" aria-selected="true">
          STAGE 1
      </a>
  </li>

  <!-- Specs Tab -->
  <li class="nav-item" role="presentation">
      <a class="nav-link" id="TabControl-Specs" data-bs-toggle="tab" href="#tab-specs" role="tab" tabindex="-1" aria-controls="tab-specs" aria-selected="false">
        STAGE 2
      </a>
  </li>

  <!-- Support Tab -->
  <li class="nav-item" role="presentation">
      <a class="nav-link" id="TabControl-Support" data-bs-toggle="tab" href="#tab-support" role="tab" tabindex="-1" aria-controls="tab-support" aria-selected="false">
          STAGE 3
      </a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="TabControl-Support" data-bs-toggle="tab" href="#stage4" role="tab" tabindex="-1" aria-controls="stage4" aria-selected="false">
        STAGE 4
    </a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="TabControl-Support" data-bs-toggle="tab" href="#stage5" role="tab" tabindex="-1" aria-controls="stage5" aria-selected="false">
        STAGE 5
    </a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="TabControl-Support" data-bs-toggle="tab" href="#stage6" role="tab" tabindex="-1" aria-controls="stage5" aria-selected="false">
        STAGE 6
    </a>
  </li>
</ul>

<div class="tab-content container-fluid">
  <!-- Highlights Tab Pane -->
  <div class="tab-pane fade show active" id="tab-highlights" role="tabpanel" aria-labelledby="TabControl-Highlights">
   
      <div class="collapse show" id="pdp-highlights">
          <div class="card">
            <div class="card-header widgetcolor mt-5">
                <h2 class="p-4 mt-3">PROJECT DETAILS</h2>
            </div>
              <div class="card-body ps-4">
                 
              
                  @if((Auth::user()->role===3 || Auth::user()->role===4 || Auth::user()->role===5)) 

                      <div class="row mt-2">
                          <div class="col-4"><strong>Project ID</strong></div>
                          <div class="col-1">:</div>
                          <div class="col-4 mb-4"><strong>{{ $projectId->projectID }}</strong></div>

                          <div class="col-4"><strong>Agency Project No</strong></div>
                          <div class="col-1">:</div>
                          <div class="col-4 mb-4"><strong>{{ $projectId->agencyProjectNo }}</strong></div>

                          <div class="col-4"><strong>Donor Name</strong></div>
                          <div class="col-1">:</div>
                          <div class="col-4 mb-4"><strong>{{ $projectId->partner_name }}</strong></div>

                          <div class="col-4"><strong>Project Manager</strong></div>
                          <div class="col-1">:</div>
                          <div class="col-4 mb-4"><strong>{{ $projectId->name }}</strong></div>

                          <div class="col-4"><strong>Available Budget</strong></div>
                          <div class="col-1">:</div>
                          <div class="col-4 mb-4"><strong>{{ $projectId->availableBudget }}</strong></div>

                          <div class="col-4"><strong>Type of Project</strong></div>
                          <div class="col-1">:</div>
                          <div class="col-4 mb-4"><strong>{{ $projectId->typeOfProject }}</strong></div>

                          <div class="col-4"><strong>Remarks</strong></div>
                          <div class="col-1">:</div>
                          <div class="col-4 mb-4"><strong>{{ $projectId->remarks }}</strong></div>
                      </div>                  
                  
                     @else 
                     <div class="row">
                        <div class="col-12">
                            <div class="alert">
                                <h4>Your Project is not yet approved</h4>
                            </div>
                        </div>
                     </div>
                     @endif
                 
              </div>
          </div>
      </div>
  </div>

  <!-- Product Specs Tab Pane -->
  <div class="tab-pane fade" id="tab-specs" role="tabpanel" aria-labelledby="TabControl-Specs">
    
      <div class="collapse" id="pdp-specs">
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header widgetcolor mt-5">
                    <h2 class="p-4 mt-3">APPLICANT SELECTION</h2>
                </div>
                <div class="card-body ps-4">
                    @if(($stage1Status === 2) && (Auth::user()->role ===3 || Auth::user()->role === 4 || Auth::user()->role === 5))
                    <div class="application">
                      <form id="myForm" method="POST" action="{{ route('user.submitApplicant')}}">
                        @csrf 
                        <input type="hidden" name="proId" value="{{ $projectId->project_id}}">
                        <label for=""><h5 class="bg-dark text-white p-2 mt-4 rounded">List of Applicants under {{ $projectId->typeOfProject }} </h5></label><br>
                        <select name="applicantId" id="" class="form-select mt-5">
                          <option value="">Select Applicant ID</option>
                          @foreach($applicants as $applicant)
                          <option value="{{ $applicant }}">{{ $applicant }}</option>
                          @endforeach
                        </select> 
                        <div class="row mt-5">
                          <div class="col-10"></div>
                          <div class="col-2">
                            <button type="submit" class="btn btn-success">Submit Applicant</button>
                          </div>
                        </div>
                      </form>
                    </div>
                 
                    @if(($stage2Status === 2 || $stage2Status === 1)&& (Auth::user()->role ===3 || Auth::user()->role===4 || Auth::user()->role===5))
                     <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert alert-primary appId ms-3">
                                <h5>The Submitted Applicant ID : {{ $projectId->applicantId}}</h5>
                            </div>
                                @if($appdetOC)
                                <div class="container">
                                  <div class="row mt-4">
                                    <div class="col-12">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                               
                                            </thead>
                                            <tbody>
                                                @foreach ($requiredKeys as $key)
                                                    <tr>
                                                        <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                                                        <td><strong>{{ $appdetOC->$key }}</strong></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                  </div>
                                </div>
                                @endif
        
                                @if($appdetEC)
                                <div class="container">
                                   <div class="row mt-4">
                                    <div class="col-10">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                               
                                            </thead>
                                            <tbody>
                                                @foreach ($requiredKeys as $key)
                                                    <tr>
                                                        <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                                                        <td><strong>{{ $appdetEC->$key }}</strong></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                   </div>
                                </div>
                                @endif
        
                                @if($appdetSW)
                                <div class="container">
                                    <div class="row mt-4">
                                     <div class="col-10">
                            <table class="table table-striped table-bordered">
                            <thead>
                                                
                            </thead>
                            <tbody>
                             @foreach ($requiredKeys as $key)
                            <tr>
                                <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                                <td>
                                    @if ($key === 'beneficiaries')
                                        <ul>
                                            @foreach (json_decode($appdetSW->$key, true) as $beneficiary)
                                                <li>{{ $beneficiary['name'] }} - {{ $beneficiary['phone_number'] }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <strong>{{ $appdetSW->$key }}</strong>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                                             </tbody>
                                         </table>
                                         
                                     </div>
                                    </div>
                                 </div>
                               @endif  
        
                                @if($appdetCC)
                                <div class="container">
                                    <div class="row mt-4">
                                     <div class="col-10">
                                         <table class="table table-striped table-bordered">
                                             <thead>
                                                
                                             </thead>
                                             <tbody>
                                                 @foreach ($requiredKeys as $key)
                                                     <tr>
                                                         <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                                                         <td><strong>{{ $appdetCC->$key }}</strong></td>
                                                     </tr>
                                                 @endforeach
                                             </tbody>
                                         </table>
                                         
                                     </div>
                                    </div>
                                 </div>
                                 
                            @endif
                            @if($appdetDA)
                            <div class="container">
                                <div class="row mt-4">
                                 <div class="col-10">
                                     <table class="table table-striped table-bordered">
                                         <thead>
                                            
                                         </thead>
                                         <tbody>
                                             @foreach ($requiredKeys as $key)
                                                 <tr>
                                                     <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                                                     <td><strong>{{ $appdetDA->$key }}</strong></td>
                                                 </tr>
                                             @endforeach
                                         </tbody>
                                     </table>
                                     
                                 </div>
                                </div>
                             </div>
                             
                        @endif

                        @if($appdetFA)
                        <div class="container">
                            <div class="row mt-4">
                             <div class="col-10">
                                 <table class="table table-striped table-bordered">
                                     <thead>
                                        
                                     </thead>
                                     <tbody>
                                         @foreach ($requiredKeys as $key)
                                             <tr>
                                                 <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                                                 <td><strong>{{ $appdetFA->$key }}</strong></td>
                                             </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
                                 
                             </div>
                            </div>
                         </div>
                         
                    @endif 
                    @if($appdetGP)
                    <div class="container">
                        <div class="row mt-4">
                         <div class="col-10">
                             <table class="table table-striped table-bordered">
                                 <thead>
                                    
                                 </thead>
                                 <tbody>
                                     @foreach ($requiredKeys as $key)
                                         <tr>
                                             <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                                             <td><strong>{{ $appdetGP->$key }}</strong></td>
                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                             
                         </div>
                        </div>
                     </div>
                     
                @endif

                @if($appdetHC)
                <div class="container">
                    <div class="row mt-4">
                     <div class="col-10">
                         <table class="table table-striped table-bordered">
                             <thead>
                                
                             </thead>
                             <tbody>
                                 @foreach ($requiredKeys as $key)
                                     <tr>
                                         <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                                         <td><strong>{{ $appdetHC->$key }}</strong></td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                         
                     </div>
                    </div>
                 </div>
                 
                @endif
               
                @if($appdetSO)
                <div class="container">
                    <div class="row mt-4">
                     <div class="col-10">
                         <table class="table table-striped table-bordered">
                             <thead>
                                
                             </thead>
                             <tbody>
                                 @foreach ($requiredKeys as $key)
                                     <tr>
                                         <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                                         <td><strong>{{ $appdetSO->$key }}</strong></td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                         
                     </div>
                    </div>
                 </div>
                 
                @endif
                @if($appdetHO)
                <div class="container">
                    <div class="row mt-4">
                     <div class="col-10">
                         <table class="table table-striped table-bordered">
                             <thead>
                                
                             </thead>
                             <tbody>
                                 @foreach ($requiredKeys as $key)
                                     <tr>
                                         <td><strong>{{ ucfirst(preg_replace('/([a-z])([A-Z])/', '$1 $2', $key)) }}</strong></td>
                                         <td><strong>{{ $appdetHO->$key }}</strong></td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                         
                     </div>
                    </div>
                 </div>
                 
                @endif 
            </div>
            </div>                    
                    
@endif
             @else

                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-primary text-primary">
                                <h5>This Application is not approved by COO</h5>
                            </div>
                        </div>
                    </div>
                   
                    @endif 
                    
                </div>
            </div>
        </div>
        </div>
      
         
       
      </div>
  </div>

  <!-- Product Support Tab Pane -->
  <div class="tab-pane fade" id="tab-support" role="tabpanel" aria-labelledby="TabControl-Support">
  
      <div class="collapse" id="pdp-support">
        <div class="card">
            <div class="card-header widgetcolor mt-5">
                <h2 class="p-4 mt-3">FILE UPLOADING STAGE</h2>
            </div>
            <div class="card-body">
                @if($stage2Status === 2 && (Auth::user()->role ===3 || Auth::user()->role === 4 || Auth::user()->role === 5))
                <div class="row">
                  <div class="col-10">
                    <form id="documentUploadForm" method="POST" enctype="multipart/form-data">
                      @csrf
                    
                      <table class="table">
                        <thead>
                            <tr>
                                <th><strong>Document Name</strong></th>
                                <th><strong>Upload</strong></th>
                                <th><strong>Action</strong></th>
                             
                            </tr>
                        </thead>
      
                        <tbody>
                          <tr>
                              <td colspan="3"> <input type="hidden" name="proId" value="{{ $projectId->project_id }}" class="form-control"></td>
                          </tr>
                          
                          @foreach (['land_document', 'possession_certificate', 'recommendation_letter', 'committee_minutes', 'permit_copy', 'plan', 'tender_schedule_sheet', 'site_study', 'quotations', 'quotations_approval_form', 'work_order_letter', 'meeting_minutes_copy', 'agreement_with_contractor', 'agreement_with_committee', 'project_summary_form'] as $doc)
                          <tr>
                              <td>{{ ucfirst(str_replace('_', ' ', $doc)) }}</td>
                              <td>
                                  <input type="file" name="{{ $doc }}" class="form-control">
                                  <span id="{{ $doc }}Error" class="text-danger"></span>
                              </td>
                            
                              <td>
                                  @if(isset($projectId->$doc))
                                      <div class="d-flex">
                                          <button class="btn btn-sm btn-danger view-doc me-1" data-id="{{ $projectId->documentId }}" data-type="{{ $doc }}"><i class="bi bi-file-earmark-pdf-fill"></i></button>
                                          <button class="btn btn-warning btn-sm del-doc" data-id="{{ $projectId->documentId }}" data-type="{{ $doc }}"><i class="bi bi-x-lg"></i></button>
                                      </div>
                                  @else
                                      No File
                                  @endif
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      
                    </table>
                       <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
      
                          <button type="submit" class="btn pro">Submit</button>
                
                        </div>
                      </div>  </form>
                     </div>
                </div> 
                @else 
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary text-primary">
                            <h5>The Applicant is not approved by COO</h5>
                        </div>
                    </div>
                </div>

                @endif
            </div>
        </div>
        
      </div>
  </div>


<!-- Product Support Tab Pane -->
<div class="tab-pane fade" id="stage4" role="tabpanel" aria-labelledby="TabControl-Support">
    
    <div class="collapse" id="pdp-support">
      
            <div class="card">
                <div class="card-header widgetcolor mt-5">
                    <h2 class="p-4 mt-3">FUND ALLOCATION STAGE</h2>
                </div>
                <div class="card-body">
                    @if($stage3Status === 2 && (Auth::user()->role ===3 ||Auth::user()->role === 4 || Auth::user()->role === 5))
                    <div class="row">
                        <div class="col-11"></div>
                        <div class="col-1">
                            <button type="button" class="btn pro rounded-circle mb-2 float-end" data-bs-toggle="modal" data-bs-target="#fundModal">
                                <i class="bi bi-wallet-fill"></i>
                              </button>
                        </div>
                    </div>
                    @if(Auth::user()->role === 4 && $stage4Status === 1)
                    <div class="row">
                     <div class="col-10"></div>
                     <div class="col-2">
                         <a href="#" id="fundApprove" class="btn btn-danger mt-3 mb-3 w-100 rounded" data-id="{{ $projectId->proId }}" style="width:150px;">
                             Approve
                         </a>
                     </div>
                    
                    </div>
                    @endif
                    <div class="row">
                    <div class="col-12">                
                        <table id="fundTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Input</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Repeat for other materials -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th id="totalAmount">₹ 0</th> <!-- Placeholder for total amount -->
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        
                    <div class="modal fade" id="editFund" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header widgetcolor">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Update Fund Status</h1>
                              <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editFundForm">
                                    @csrf
                                    <input type="hidden" name="fundId" id="editFundId">
                                    <input type="hidden" name="proId" value="{{ $projectId->proId }}">
                                    <div class="form-group">
                                        <label for="editInput">Input</label>
                                        <select name="input" id="editInput" class="form-control" required>
                                            <option value="">Select Material</option>
                                            @foreach($inputs as $input)
                                            <option value="{{ $input->inputId }}">{{ $input->inputName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount">Amount/Parameter</label>
                                        <input type="number" name="amount" id="editAmount" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="remarks">Remarks</label>
                                        <input type="text" name="remarks" id="editremarks" class="form-control" required>
                                    </div>
                                    
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn but">Update Fund</button>
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
            <button type="button" class="btn pro cancel" data-dismiss="modal">Cancel</button>
            <button type="button" id="confirmDelete" class="btn btn-danger">Delete</button>
        </div>
    </div>
</div>
</div>

                <!--material form modal -->
                <div class="modal fade" id="fundModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header but">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Fund Allocation</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="materialForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="proId" value="{{ $projectId->proId }}">
                                    <label for="input">Input</label>
                                    <div class="input-group">
                                        <select name="input" id="input" class="form-control" required>
                                            <option value="">Select Material</option>
                                            @foreach($inputs as $input)
                                            <option value="{{ $input->inputId }}">{{ $input->inputName }}</option>
                                            @endforeach
                                             </select>
                                        <div class="input-group-append">
                                            <button type="button" class="btn but" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="bi bi-file-earmark-plus-fill fs-5"></i>
                                              </button>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" name="amount" id="amount" class="form-control" required>
                                </div>
                               
                                <div class="row">
                                    <div class="col-9"></div>
                                    <div class="col-3">
        
                                        <button type="submit" class="btn mt-3 but w-100">Add Material</button>
                            
                                    </div>
                                </div>
                            </form>
                        
                        </div>
                       
                      </div>
                    </div>
                  </div>
                    <!-- Modal for Adding New Input -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header widgetcolor">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Inputs</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="newInputForm">
                                    @csrf
                                    <div class="form-group">
                                       
                                        <label for="new_input">Input Name</label>
                                        <input type="text" class="form-control" id="new_input" name="inputName" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-4"></div>
                                        <div class="col-4">

                                            <button type="submit" class="btn btn-primary mt-2 pro">Add Input</button>
                               
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
    </div>
    @else 
    <div class="row">
        <div class="col-12">
            <div class="alert alert-primary text-primary">
                <h5>Please complete stage 3,Upload file is mandatory</h5>
            </div>
        </div>
    </div>
    @endif
       
    </div>
</div>


<div class="tab-pane fade" id="stage5" role="tabpanel" aria-labelledby="TabControl-Support">
    
    <div class="collapse" id="pdp-support">
      
                <div class="card">
                    <div class="card-header widgetcolor mt-5">
                        <h2 class="p-4 mt-3">IMPLEMENTATION STAGE</h2>
                    </div>
                    <div class="card-body">
                      
                  

                        @if($stage4Status === 2 && (Auth::user()->role ===3 || Auth::user()->role===4 || Auth::user()->role===5))

                      
                        <div class="row">
                            
                               
                                <div class="col-12">
                                    <div id="messageContainer" style="display: none; color: green; font-weight: bold;">
                                        <button class="btn"></button>
                                    </div>
                                </div>
                     
                            
                            <div class="col-12">  
                               

                            <table id="ImplementationTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>                             
                                        <th>Input</th>
                                        <th>Total</th>
                                        <th>Utilized</th>
                                        <th>Current</th>
                                        <th>Balance</th>
                                        <th>Previus Current</th>
                                        <th>Action</th>
                                        <th>Approve</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <!-- Repeat for other materials -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th id="totalAmounts"></th>
                                        <th id="totalUtilized"></th>
                                        <th></th>
                                        <th id="totalBalance"></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>

 <!-- Edit Current Value Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header widgetcolor">
                <h5 class="modal-title" id="editModalLabel">Request Current</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="fundId" value="">
                <input type="hidden" id="proId" value="{{ $projectId->proId }}">
                <div class="mb-3">
                    <label for="current">Current Value:</label>
                    <input type="number" name="current" id="current" class="form-control">
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn pro" id="saveChanges">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div aria-live="polite" aria-atomic="true" style="position: relative;">
    <div class="toast-container position-fixed top-0 end-0 p-3">
        
        @foreach ($notifications as $notification)
            @if (is_null($notification->read_at))
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header widgetcolor">
                        <strong class="me-auto">Notification</strong>
                        <small class="text-muted">
                            {{ \Carbon\Carbon::parse($notification->created_at)->format('d-m-Y H:i') }} <!-- Adjust format as needed -->
                        </small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-white">
                        {{ $notification->data['message'] }}
                        <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <div class="row">
                                <div class="col-8"></div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-sm but mt-3">Mark as Read</button>
                                </div>
                            </div>
                           
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>



<!--Send bill confirmation modal-->

<div id="BillModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="submitBillModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header widgetcolor">
                <h5 class="modal-title" id="submitBillModalLabel">Submit Bill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="Message"></p>
                <p>Input: <span id="Input"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn pro cancel" data-dismiss="modal">Cancel</button>
                <button type="button" id="submitBill" class="btn btn-danger">Submit</button>
            </div>
        </div>
    </div>
</div>
{{-- <!-- display status modal-->
<!-- Modal Structure -->
<div class="toast" id="statusToast" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; top: 20px; right: 20px; z-index: 1050;">
    <div class="toast-header widgetcolor">
        
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body bg-white" id="toastMessage">
        <!-- Message will be inserted here -->
    </div>
</div> --}}



        
                    </div>
                     <div class="col-3"></div>
                                <div class="col-4">
                                    <canvas id="myPieChart" style="width: 300px; height: 300px;"></canvas>
                                </div>
                </div>
                @else 
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary text-primary">
                            <h5>Please complete stage 4,Fund Allocation is mandatory</h5>
                        </div>
                    </div>
                </div>
                @endif
           </div>
           </div>
        </div>
</div>


<div class="tab-pane fade" id="stage6" role="tabpanel" aria-labelledby="TabControl-Support">
    
    <div class="collapse" id="pdp-support">
      
                <div class="card">
                    <div class="card-header widgetcolor mt-5">
                        <h2 class="p-4 mt-3"> COMPLETION STAGE</h2>
                    </div>
                    <div class="card-body">
                    @if($stage6Status === 1 && (Auth::user()->role ===3 || Auth::user()->role===4 ||Auth::user()->role===5))
                   
                          
                    <form id="completionForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Hidden Field for Project ID -->
                        <input type="hidden" name="proId" value="{{ $projectId->proId }}">                        
                      
                        <!-- File Uploads -->
                        <div>
                            <label for="completion_certificate">Completion Certificate:</label>
                            <input type="file" id="completion_certificate" name="completion_certificate" class="form-control" required>
                            <span class="text-danger" id="completion_certificateError"></span>
                        </div><br>
                        
                        <div>
                            <label for="measurement_book">Measurement Book:</label>
                            <input type="file" id="measurement_book" name="measurement_book" class="form-control">
                            <span class="text-danger" id="measurement_bookError"></span>
                        </div><br>
                        
                        <!-- Photo Uploads -->
                        <div>
                            <label for="photos">Photo Uploads:</label>
                            <input type="file" id="photos" name="photos[]" class="form-control" multiple required>
                            <span class="text-danger" id="photosError"></span>
                        </div><br>
                        <div>
                            <label for="total_amount">Total Amount:</label>
                            <input type="number" id="total_amount" name="total_amount" class="form-control" required step="0.01">
                            <span class="text-danger" id="total_amountError"></span>
                        </div><br>
                    
                        <div>
                            <label for="total_amount_paid_by_donor">Total Amount Paid by Donor:</label>
                            <input type="number" id="total_amount_paid_by_donor" name="total_amount_paid_by_donor" class="form-control" required step="0.01">
                            <span class="text-danger" id="total_amount_paid_by_donorError"></span>
                        </div><br>
                    
                        <div>
                            <label for="community_contribution">Community Contribution:</label>
                            <input type="number" id="community_contribution" name="community_contribution" class="form-control" required step="0.01">
                            <span class="text-danger" id="community_contributionError"></span>
                        </div><br>
                    
                        <div>
                            <label for="any_other">Any Other:</label>
                            <textarea id="any_other" name="any_other" class="form-control"></textarea>
                            <span class="text-danger" id="any_otherError"></span>
                        </div><br>
                    
                        <div>
                            <label for="geo_location">Geo Location:</label>
                            <input type="text" id="geo_location" name="geo_location" class="form-control">
                            <span class="text-danger" id="geo_locationError"></span>
                        </div><br>
                    
                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-5">
                                <button type="submit" class="btn pro mt-2">Submit</button>
                            </div>
                        </div>
                    </form>
                    @endif
                    @if(($stage6Status === 2 || $stage6Status === 3) && (Auth::user()->role === 3 || Auth::user()->role === 4 || Auth::user()->role === 5))         
                    <div class="completionView p-4">  
                        @if($stage6Status === 3)  
                            <div class="row">
                                <div class="col-10">
                                    <a href="{{ route('user.projectdownload') }}" class="btn btn-danger mb-3">
                                        Download Project Details as PDF
                                    </a>
                                </div>
                            </div>
                        @endif
                
                      
                        <div class="row">
                            <div class="col-4">Completion Certificate</div>
                            <div class="col-2">:</div>
                            <div class="col-4">
                                @if($com && $com->completion_certificate)
                                    <button class="btn btn-danger btn-sm view-file" data-id="{{ $projectId->documentId }}" data-type="{{ $doc }}">
                                        <i class="bi bi-file-earmark-pdf-fill"></i> 
                                    </button>
                                @else
                                    <strong>No file uploaded</strong>
                                @endif
                            </div>
                        </div><br>
                
                        <div class="row">
                            <div class="col-4">Measurement Book</div>
                            <div class="col-2">:</div>
                            <div class="col-4">
                                @if($com && $com->measurement_book)
                                    <button class="btn btn-danger btn-sm view-file" data-id="{{ $projectId->documentId }}" data-type="{{ $doc }}">
                                        <i class="bi bi-file-earmark-pdf-fill"></i> View Measurement Book
                                    </button>
                                @else
                                    <strong>No file uploaded</strong>
                                @endif
                            </div>
                        </div><br>
                
                        <div class="row border border-3 border-secondary">                          
                            <div class="col-4 border border-3 border-secondary p-4">
                                @if($com && $com->photo1)
                                    <img src="{{ asset('documents24/'.$com->photo1) }}" height="300px" width="300px" alt="Photo 1" >
                                @else
                                    <strong>No photo uploaded</strong>
                                @endif
                            </div>
                       
                            <div class="col-4 border border-3 border-secondary p-4">
                                @if($com && $com->photo2)
                                    <img src="{{ asset('documents24/'.$com->photo2) }}" height="300px" width="300px" alt="Photo 2" >
                                @else
                                    <strong>No photo uploaded</strong>
                                @endif
                            </div>
                        
               
                               <div class="col-4 border border-3 border-secondary p-4">
                                @if($com && $com->photo3)
                                    <img src="{{ asset('documents24/'.$com->photo3) }}" height="300px" width="300px" alt="Photo 3" >
                                @else
                                    <strong>No photo uploaded</strong>
                                @endif
                            </div>
                        </div>
                      <div class="row">
                            <div class="col-4 border border-3 border-secondary p-4">
                                @if($com && $com->photo4)
                                    <img src="{{ asset('documents24/'.$com->photo4) }}" height="300px" width="300px" alt="Photo 4" >
                                @else
                                    <strong>No photo uploaded</strong>
                                @endif
                            </div>
                            <div class="col-4 border border-3 border-secondary p-4">
                                @if($com && $com->photo5)
                                    <img src="{{ asset('documents24/'.$com->photo5) }}" height="300px" width="300px" alt="Photo 5" >
                                @else
                                    <strong>No photo uploaded</strong>
                                @endif
                            </div>
                        </div><br>
                
                        <div class="row">
                            <div class="col-4">Total Amount</div>
                            <div class="col-2">:</div>
                            <div class="col-4">
                                <strong>{{ $com ? $com->total_amount : 'No data available' }}</strong>
                            </div>
                        </div><br>
                
                        <div class="row">
                            <div class="col-4">Total Amount Paid by Donor</div>
                            <div class="col-2">:</div>
                            <div class="col-4">
                                <strong>{{ $com ? $com->total_amount_paid_by_donor : 'No data available' }}</strong>
                            </div>
                        </div><br>
                
                        <div class="row">
                            <div class="col-4">Community Contribution</div>
                            <div class="col-2">:</div>
                            <div class="col-4">
                                <strong>{{ $com ? $com->community_contribution : 'No data available' }}</strong>
                            </div>
                        </div><br>
                
                        <div class="row">
                            <div class="col-4">Any Other</div>
                            <div class="col-2">:</div>
                            <div class="col-4">
                                <strong>{{ $com ? $com->any_other : 'No data available' }}</strong>
                            </div>
                        </div><br>
                
                        <div class="row">
                            <div class="col-4">Geo Location</div>
                            <div class="col-2">:</div>
                            <div class="col-4">
                                <strong>{{ $com ? $com->geo_location : 'No data available' }}</strong>
                            </div>
                        </div><br>
                
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-2"></div>
                            <div class="col-4">
                                <button type="button" class="btn pro rounded edit-completion" data-bs-toggle="modal" data-bs-target="#editCompletionModal" style="width:100px" data-id="{{ $com->completionId }}">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
               
               
            </div>
            </div>
           </div>
           </div>


           <!--Edit completion modal-->
           <div class="modal fade" id="editCompletionModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header widgetcolor">
                        <h5 class="modal-title" id="editModalLabel">Edit Form</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editCompletionForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="proId" value="{{ $projectId->proId }}">                        

                            <!-- File Uploads -->
                            <div>
                                <label for="completion_certificate">Completion Certificate:</label>
                                <input type="file" id="completion_certificate" name="completion_certificate" class="form-control">
                                <span class="text-danger" id="completion_certificateError"></span>
                            </div><br>
                            
                            <div>
                                <label for="measurement_book">Measurement Book:</label>
                                <input type="file" id="measurement_book" name="measurement_book" class="form-control">
                                <span class="text-danger" id="measurement_bookError"></span>
                            </div><br>
                            
                            <!-- Photo Uploads -->
                            <div>
                                <label for="photos">Photo Uploads:</label>
                                <input type="file" id="photos" name="photos[]" class="form-control" multiple>
                                <span class="text-danger" id="photosError"></span>
                            </div><br>
                            
                            <div>
                                <label for="total_amount">Total Amount:</label>
                                <input type="number" id="total_amount" name="total_amount" class="form-control" step="0.01">
                                <span class="text-danger" id="total_amountError"></span>
                            </div><br>
                        
                            <div>
                                <label for="total_amount_paid_by_donor">Total Amount Paid by Donor:</label>
                                <input type="number" id="total_amount_paid_by_donor" name="total_amount_paid_by_donor" class="form-control" step="0.01">
                                <span class="text-danger" id="total_amount_paid_by_donorError"></span>
                            </div><br>
                        
                            <div>
                                <label for="community_contribution">Community Contribution:</label>
                                <input type="number" id="community_contribution" name="community_contribution" class="form-control" step="0.01">
                                <span class="text-danger" id="community_contributionError"></span>
                            </div><br>
                        
                            <div>
                                <label for="any_other">Any Other:</label>
                                <textarea id="any_other" name="any_other" class="form-control"></textarea>
                                <span class="text-danger" id="any_otherError"></span>
                            </div><br>
                        
                            <div>
                                <label for="geo_location">Geo Location:</label>
                                <input type="text" id="geo_location" name="geo_location" class="form-control">
                                <span class="text-danger" id="geo_locationError"></span>
                            </div><br>
                        
                            <div class="row">
                                <div class="col-5"></div>
                                <div class="col-5">
                                    <button type="submit" class="btn pro mt-2 ">Submit</button>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script> 



<script>
    $(document).ready(function() {
    
            const activeTab = localStorage.getItem('activeTab');

            function activateTab(tabId) {
                $('.tab-pane').removeClass('show active');
                $(tabId).addClass('show active');
                $('.nav-link').removeClass('active');
                $('a[href="' + tabId + '"]').addClass('active');
            }

            if (activeTab) {
                activateTab(activeTab);
            } else {
                // Set default to tab-highlights if no tab is stored
                localStorage.setItem('activeTab', '#tab-highlights');
                activateTab('#tab-highlights');
            }

            $('.nav-link').on('click', function() {
                const selectedTab = $(this).attr('href');
                localStorage.setItem('activeTab', selectedTab);
                activateTab(selectedTab);
            });
        });

    $(document).ready(function() {

    $('#fundTable').DataTable({
        select: true,
        serverSide: false, // Set this to true if you’re using server-side processing
        dom: 'Bfrtlip',
        buttons: [
            {  
                extend: 'csvHtml5',
                text: 'Download Excel',
                title: 'Fund Details',
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
            ['10 Funds', '25 Funds', '50 Funds', 'All Funds']
        ],
        ajax: {
            url: `{{ url('/user/project/details/stage5/fund/view') }}`,
            type: 'GET',
            dataSrc: function(json) {
                // Update the footer with total values from the server response
                $('#totalAmount').text('₹ ' + json.totalAmount.toFixed(2));
             // Return the data for DataTables
                return json.data;
            },
        },
        columns: [
            {
                "data": "input",
                "render": function(data, type, row) {
                    // Check the approval_status and apply styles accordingly
                    if (row.approval_status === 1) {
                        return `<span style="color: green;font-weight:bold">${data}</span>`;
                    }
                    return data; // Return the input as is if not approved
                }
            },
            {
                "data": "amount",
                "render": function(data, type, row) {
                  
                    return '₹ ' + data; // Adds the rupee symbol before the amount
                },
            }, 
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) 
                {
                    return `
                    <div class="dd d-flex">
                        <button class="btn btn-warning btn-sm edit me-1" data-id="${row.fundId}" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete" data-id="${row.fundId}" data-input="${row.input}" title="Delete">
                            <i class="bi bi-trash"></i>
                        </button>   
                    </div>`;
                } 
            },
        ],
       
    });
});


var userRole = {{ Auth::user()->role }};

        //Implementation datatable 
    $(document).ready(function() {
        
    $('#ImplementationTable').DataTable({
        select: true,
        serverSide: false, // Set this to true if you’re using server-side processing
        dom: 'Bfrtlip',
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Download Excel',
                    title: 'Fund Details',
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
                ['10 Funds', '25 Funds', '50 Funds', 'All Funds']
            ],
            ajax: {
                url: `{{ url('/user/projects/details/stage5/implementation/datatable') }}`,
                type: 'GET',
               dataSrc: function(json) {
    $('#totalAmounts').text('₹ ' + json.totalAmount.toFixed(2));
    $('#totalUtilized').text('₹ ' + json.totalUtilized.toFixed(2));
    $('#totalBalance').text('₹ ' + json.totalBalance.toFixed(2));    
    return json.data; // This is the key point
},

                
            },
                "columns": [
             
                { "data": "inputName" },
                {
                "data": "amount",
                "render": function(data, type, row) {
                  
                    return '₹ ' + data; // Adds the rupee symbol before the amount
                },
            },
                { "data": "utilized",
                    "render": function(data, type, row) {
                  
                    return '₹ ' + data; // Adds the rupee symbol before the amount
                },
                },
                { "data": "current",
                    "render": function(data, type, row) {
                  
                    return '₹ ' + data; // Adds the rupee symbol before the amount
                },
                 },
                { "data": "balance",
                    "render": function(data, type, row) {
                  
                    return '₹ ' + data; // Adds the rupee symbol before the amount
                },
            },
                { "data": "previous_current",
                    "render": function(data, type, row) {
                  
                    return '₹ ' + data; // Adds the rupee symbol before the amount
                },
                 },                   
                    {
                     data: null,
                     name: 'action',
                     orderable: false,
                     searchable: false,
                     render: function(data, type, row, meta) {
                                      
                    return `
                    <div class="dd d-flex">                      

                        <button class="btn btn-warning btn-sm info request me-1" data-id="${row.fundId}" data-input="${row.input}" title="Request">
                         Request
                        </button>  
                   
                        <button class="btn btn-info btn-sm submit" data-id="${row.fundId}" data-input="${row.inputName}" title="Submit Bill">
                          Submit
                        </button>   
                                     
                       
                    `;
                } 
            },
            {
                     data: null,
                     name: 'Approval',
                     orderable: false,
                     searchable: false,
                     render: function(data, type, row, meta) {
                      
                        if (row.stage5_status === 1 && userRole === 4) {              
                    return `                
                       

                        <button class="btn btn-danger btn-sm info PMT-approval me-1" data-id="${row.fundId}" title="Request">
                         PMT Approval
                        </button>                 
                      
                     `;
                    }
                 
                    else if(row.stage5_status && userRole === 5 && row.pmt_status===1 && row.hod_status === 1 )
                    {
                    return `       
                      <button class="btn btn-danger btn-sm info FM-approval me-1" data-id="${row.fundId}" title="Request">
                        FM Approval
                       </button>                 
                     
                    `;
                  
                    }  
                 else if(row.stage5_status === 1 && row.hod_status === 0 && userRole === 6) {
                return `<p>This Material needs approval by HOD</p>`; // Return as a string
                }                 
                    else
                    {
                    return `                                     

                    <p>This product needs an approval by pmt,hod,fm and coo</p> 
                      
                    `;
                     } 
                    }
                },
                {
                     data: null,
                     name: 'Status',
                     orderable: false,
                     searchable: false,
                     render: function(data, type, row, meta) {
    const { stage5_status, pmt_status, hod_status, fm_status, coo_status } = row;

    if ((row.stage5_status === 1|| row.stage5_status === 2)  && pmt_status === 1 && hod_status === 1 && fm_status === 1 && coo_status === 1) {
        return `<div class="badge text-bg-info">COO Approved</div>`;
    } 
    if ((row.stage5_status === 1|| row.stage5_status === 2)  && pmt_status === 1 && hod_status === 1 && fm_status === 1) {
        return `<div class="badge text-bg-info">Financial Manager Approved</div>`;
    } 
    if ((row.stage5_status === 1|| row.stage5_status === 2)  && pmt_status === 1 && hod_status === 1) {
        return `<div class="badge text-bg-info">HOD Approved</div>`;
    } 
    if ((row.stage5_status === 1|| row.stage5_status === 2)  && pmt_status === 1) {
        return `<div class="badge text-bg-info">Project Engineer Approved</div>`;
    }

    // Optionally return a message if no approval
    return `<div class="badge text-bg-secondary">Not Approved</div>`;
}

            },
            {
                "data" :"remarks",
            },
           
           
                ], 
    columnDefs: [
    {
        // Hide the column for role 3
        targets: [7],
        visible: userRole !== 3
    },
    {
        // Hide the column for roles 3, 4, and 5
        targets: [5],
        visible: ![3, 4, 5].includes(userRole)
    }
   ],

            });
        }); 


    
  $(document).ready(function() {  
      $('#myForm').on('submit', function(e) {
        e.preventDefault(); 
        // Clear previous error messages
        $('.text-danger').text('');

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: `{{ url('/user/project/details/submit/applicant/new')}}`, // Use the route name or a direct URL
            method: "POST",
            data: formData,
            success: function(response) {
                toastr.success(response.message, 'Success'); // Show success message
                $('#myForm')[0].reset(); // Optional: Reset the form
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#tab-specs');
                
             },
            error: function(xhr) {
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('#' + key + 'Error').text(value[0]); // Show error messages
                    });
                } else {
                    toastr.error('An error occurred. Please try again.', 'Error'); // Fallback error message
                }
            }
        });
    });
});


//submit documents 
$(document).ready(function() 
{
    $('#documentUploadForm').on('submit', function(e) {
        e.preventDefault();

        // Clear previous error messages
        $('.text-danger').text('');

        var formData = new FormData(this); // Use FormData to handle file uploads

        $.ajax({
            url: `{{ url('user/project/details/submit/documents') }}`,
            type: 'POST',
            data: formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting the content type
            success: function(response) {
                toastr.success(response.message, 'Success'); 
                // Delay the reload to allow the toastr message to be seen
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#tab-support');


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




  $(document).on('click', '.del-doc', function(event) {
    event.preventDefault();
    
    const id = $(this).data('id');
    const type = $(this).data('type'); // Make sure the button has data-type attribute

   
        $.ajax({
            url: `{{ url('/user/documents') }}/${id}/${type}`,
            data: {
            _token: '{{ csrf_token() }}'
            // No need to send any additional data, we're just nullifying the field
           },
            type: 'POST',
            success: function(response) {
            toastr.success(response.message, 'Success');
            setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#tab-support');


               // Remove the row from the table
            }.bind(this), // Bind 'this' to access the current context
            error: function() {
                toastr.error('Something went wrong', 'Error');
            }
        });
   
});

    $(document).ready(function() {       
        $('.view-doc').click(function() {
            event.preventDefault();
            var docId = $(this).data('id');
            var docType = $(this).data('type');

            $.ajax({
                url: `{{ url('/user/download-document')}}`, // Adjust this to your download route
                method: 'GET',
                data: {
                    id: docId,
                    type: docType
                },
                xhrFields: {
                    responseType: 'blob' // Important for downloading files
                },
                success: function(data, status, xhr) {
                    var blob = new Blob([data], { type: xhr.getResponseHeader('Content-Type') });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = docType + '.pdf'; // Change this to your desired filename
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                },
                error: function() {
                    alert('Error downloading file');
                }
            });
        });
    }); 


    $(document).ready(function() {
    $('#newInputForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Clear previous error messages
        $('.text-danger').text('');

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: `{{ url('/user/project/details/stage4/input/new') }}`, // Adjust this to your actual route
            type: 'POST',
            data: formData,
            success: function(response) {
                toastr.success(response.message, 'Success'); // Show success notification
                $('#exampleModal').modal('hide'); 
                $('#materialForm')[0].reset();// Hide the modal
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#stage4');                
            
            },
            error: function(response) {
                let errors = response.responseJSON.errors; // Get validation errors
                $.each(errors, function(key, value) {
                    $('#' + key + 'Error').text(value[0]); // Show error messages
                });
                toastr.error('Please check the form and correct the errors.', 'Error'); // Show error notification
            }
        });
    });
});


//submit fund allocation form 
$(document).ready(function() {
    $('#materialForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Clear previous error messages
        $('.text-danger').text('');

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: `{{ url('/user/project/details/stage4/fund/new') }}`, // Adjust this to your actual route for saving materials
            type: 'POST',
            data: formData,
            success: function(response) {
                toastr.success(response.message, 'Success'); // Show success notification
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#stage4');                
          
               
            },
            error: function(response) {
                let errors = response.responseJSON.errors; // Get validation errors
                $.each(errors, function(key, value) {
                    $('#' + key + 'Error').text(value[0]); // Show error messages
                });
                toastr.error('Please check the form and correct the errors.', 'Error'); // Show error notification
            }
        });
    });
});

//edit fund form 

$(document).on('click', '.edit', function() {
    const fundId = $(this).data('id');
    
    $.get(`{{ url('/user/project/details/stage5/fund/edit') }}/${fundId}`, function(data) { 

        $('#editFundId').val(data.fundId); // Set the hidden field
        $('#editInput').val(data.input); // Populate input field
        $('#editAmount').val(data.amount); // Populate amount
        $('#editUtilized').val(data.utilized); // Populate utilized
        $('#editFund').modal('show'); // Show modal
      
    });
}); 
//update fund 
$(document).ready(function() {
    $('#editFundForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        let formData = $(this).serializeArray();

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ url('/user/projects/details/stage5/fund/update')}}`,
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
                    $('#editFund').modal('hide'); 
                    $('#fundTable').DataTable().ajax.reload();
                }
            },
            error: function(xhr, status, error) {
                toastr.error('An error occurred. Please try again.'); // Display error message on request failure
            }
        });
    });
});  

//delete fund 
$(document).on('click', '.delete', function() {
    const fundId = $(this).data('id');
    const userName = $(this).data('input'); // Assuming you have the username data attribute

    // Set the user name and message in the modal
    $('#modalUserName').text(userName);
    $('#modalMessage').text('Are you sure you want to delete?');

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
            url: `{{ url('/user/projects/details/stage5/fund/delete') }}/${fundId}`,
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
                $('#fundTable').DataTable().ajax.reload();
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


//edit current input
$(document).ready(function() 
{
    // Event for opening the edit modal
    $('#ImplementationTable').on('click', '.request', function() {
        var fundId = $(this).data('id');
        $.get(`{{ url('/user/projects/details/implementation/current/request') }}/${fundId}`, function(data) {
            // Fill the form with data
        $('#fundId').val(data.fundId);
        $('#current').val(data.current);
        $('#editModal').modal('show'); 
        });
    });
  
    // Save changes on the modal
    $('#saveChanges').on('click', function() {
        
        var fundId = $('#fundId').val();
        var current = $('#current').val();

        $.ajax({
            
            url: `{{ url('/user/projects/details/stage5/implementation/update') }}/${fundId} `, // Adjust your URL
            type: 'POST',
            data: {
                current: current,
                _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            success: function(response) {
                $('#editModal').modal('hide');
                setTimeout(function() {
                        location.reload(); 
                    }, 2000);

            },
            error: function(xhr) {
            var errorMessage = xhr.responseJSON?.message || 'Error updating the current value.';
            toastr.error(errorMessage); // Display error message
        }
        });
    });
});


//submit bill 
$(document).on('click', '.submit', function() {
    const fundId = $(this).data('id');
    const Input = $(this).data('input'); // Assuming you have the username data attribute

    // Set the user name and message in the modal
    $('#Input').text(Input);
    $('#Message').text('Are you sure you want to submit this bill?');

    // Show the modal
    $('#BillModal').modal('show');
     $('.close').on('click', function()
    {
        $('#BillModal').modal('hide');
    });

    $('.cancel').on('click', function()
    {
        $('#BillModal').modal('hide');
    });

    // Handle confirmation
    $('#submitBill').off('click').on('click', function() {
        $.ajax({
            url: `{{ url('/user/projects/details/stage5/submit/bill/') }}/${fundId}`,
            type: 'POST',
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
                $('#fundTable').DataTable().ajax.reload();
                $('#BillModal').modal('hide'); // Hide the modal on success
                setTimeout(function() {
                        location.reload(); 
                    }, 2000);
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

//completion form submit 
$(document).ready(function() {
            $('#completionForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Create a FormData object
                var formData = new FormData(this);

                // AJAX request
                $.ajax({
                    url: `{{ url('/user/project/details/stage6/completion/new') }}`, // Your Laravel route
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                toastr.success(response.message); // Display success message
                $('#completionModal').modal('hide');
            },
            error: function(xhr) {
                // Check if the error response is a validation error
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;

                    // Use $.each to iterate over the errors
                    $.each(errors, function(field, messages) {
                        // Assuming field names match the input names
                        $('#' + field + 'Error').text(messages[0]); // Display the first error message for each field
                    });
                } else {
                    toastr.error('There was an error submitting the form.'); // Display general error message
                }
            }
                });
            });
        }); 


        //doenload file on completion 
        $(document).ready(function() {       
        $('.view-file').click(function() {
            event.preventDefault();
            var docId = $(this).data('id');
            var docType = $(this).data('type');

            $.ajax({
                url: `{{ url('/user/download/completion/file')}}`, // Adjust this to your download route
                method: 'GET',
                data: {
                    id: docId,
                    type: docType
                },
                xhrFields: {
                    responseType: 'blob' // Important for downloading files
                },
                success: function(data, status, xhr) {
                    var blob = new Blob([data], { type: xhr.getResponseHeader('Content-Type') });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = docType + '.pdf'; // Change this to your desired filename
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#stage6');
                },
                error: function() {
                    alert('Error downloading file');
                }
            });
        });
    });  

    $(document).on('click', '.edit-completion', function() {
    const completionId = $(this).data('id');

    $.get(`{{ url('/user/project/details/completion/edit') }}/${completionId}`, function(data) {
        // Populate the form fields with the data returned from the server
        $('#editCompletionForm').find('input[name="proId"]').val(data.proId); // Set project ID if needed
        $('#completion_certificate').val(''); // Clear file input as it cannot be set programmatically
        $('#measurement_book').val(''); // Clear file input as it cannot be set programmatically
        $('#total_amount').val(data.total_amount);
        $('#total_amount_paid_by_donor').val(data.total_amount_paid_by_donor);
        $('#community_contribution').val(data.community_contribution);
        $('#any_other').val(data.any_other);
        $('#geo_location').val(data.geo_location);

        // Show the modal containing the form
        $('#editCompletionModal').modal('show'); 
    });
});
    //update completion form 
    $(document).ready(function() {
    $('#editCompletionForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
     
        var formData = new FormData(this); // Collect form data

        $.ajax({
            url: `{{ url('/user/project/details/completion/update')}}`, // Your Laravel route for the update
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                toastr.success(response.message); // Display success message
                $('#editCompletionModal').modal('hide'); // Hide the modal
                // Optionally refresh data or update the UI
                setTimeout(function() {
                    location.reload(); 
                    }, 2000);
            },
            error: function(xhr) {
                // Handle validation errors
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    for (let field in errors) {
                        $('#' + field + 'Error').text(errors[field][0]); // Display errors below the respective fields
                    }
                } else {
                    toastr.error('There was an error updating the form.');
                }
            }
        });
    });
});

 //fund approve
 $(document).on('click', '#fundApprove', function(e) {
        e.preventDefault();
        var projectId = $(this).data('id');

        $.ajax({
            url: `{{ url('/user/project/details/stage4/fund/approve') }}/${projectId}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                stage4_status: 1
            },
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#fundApprove').removeClass('btn-danger').addClass('btn-success').text('Approved');
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#admin-stage4');
                
            },
            error: function(response) {
                toastr.error(response.responseJSON.message || 'An error occurred. Please try again.', 'Error');
            }
        });
    });




//fund approve
$(document).on('click', '.PMT-approval', function(e) {
        e.preventDefault();
        var projectId = $(this).data('id');

        $.ajax({
            url: `{{ url('/user/project/details/stage5/pmt/material/approval') }}/${projectId}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
              
            },
            success: function(response) {
                toastr.success(response.message, 'Success');
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#stage5');
                
            },
            error: function(response) {
                toastr.error(response.responseJSON.message || 'An error occurred. Please try again.', 'Error');
            }
        });
    });
//approval by financial manager 
$(document).on('click', '.FM-approval', function(e) {
        e.preventDefault();
        var projectId = $(this).data('id');

        $.ajax({
            url: `{{ url('/user/project/details/stage5/fm/material/approval') }}/${projectId}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
              
            },
            success: function(response) {
                toastr.success(response.message, 'Success');
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#stage5');
                
            },
            error: function(response) {
                toastr.error(response.responseJSON.message || 'An error occurred. Please try again.', 'Error');
            }
        });
    });

    $(document).ready(function() {
        // AJAX call to fetch data
        $.ajax({
            url: `{{ url('/user/project/details/bill/pie-chart')}}`, // Adjust the URL if needed
            method: 'GET',
            dataType: 'json',
            success: function(json) {
                createPieChart(json.totalUtilized, json.totalBalance);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching pie chart data:', textStatus, errorThrown);
            }
        });
    });
    
function createPieChart(totalUtilized, totalBalance) {
    var ctx = document.getElementById('myPieChart').getContext('2d');

    // Check if myPieChart exists and is an instance of Chart
    if (window.myPieChart instanceof Chart) {
        window.myPieChart.destroy();
    }

    window.myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Utilized', 'Balance'],
            datasets: [{
                label: 'Amount Distribution',
                data: [totalUtilized, totalBalance],
                backgroundColor: [
                    'rgba(255, 159, 64, 0.6)', // Utilized
                    'rgba(153, 102, 255, 0.6)'  // Balance
                ],
                borderColor: [
                    'rgba(255, 159, 64, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Utilized vs Balance Amount'
                }
            }
        }
    });
}
    

   
/*
//check all bills are approved by all 
$(document).ready(function() {
        // AJAX call to fetch data
        $.ajax({
            url: `{{ url('/user/project/details/bill/status')}}`, // Adjust the URL if needed
            method: 'GET',
            dataType: 'json',
            success: function(json) {
                if (json.Message) {
                // Set the message in the toast body
                $('#toastMessage').text(json.Message);
                
                // Show the toast
                $('#statusToast').toast({
                    autohide: true,
                    delay: 5000 // Hide after 5 seconds
                }).toast('show');
            }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching pie chart data:', textStatus, errorThrown);
            }
            
        });
        $('#statusToast .close').click(function() {
        $('#statusToast').toast('hide');
    });
    }); 
    */
    


</script>
@endpush

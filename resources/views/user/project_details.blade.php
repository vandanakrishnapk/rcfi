@extends('user.template.master')
@section('css')
<!-- DataTables -->
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
            <div class="card-header but mt-5">
                <h2 class="p-4 mt-3">PROJECT DETAILS</h2>
            </div>
              <div class="card-body ps-4">
                 
              
                  @if(Auth::user()->role===3 && Auth::user()->id === $projectId->projectManager )

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
                     @endif
                 
              </div>
          </div>
      </div>
  </div>

  <!-- Product Specs Tab Pane -->
  <div class="tab-pane fade" id="tab-specs" role="tabpanel" aria-labelledby="TabControl-Specs">
    
      <div class="collapse" id="pdp-specs">
        <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-header but mt-5">
                    <h2 class="p-4 mt-3">APPLICANT SELECTION</h2>
                </div>
                <div class="card-body ps-4">
                    @if(($stage1Status === 2  && $stage2Status ===0) && Auth::user()->role ===3 && Auth::user()->id === $projectId->projectManager)
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
                 
                    @elseif($stage2Status === 2 && Auth::user()->role ===3 && Auth::user()->id === $projectId->projectManager)
                     <div class="row">
                        <div class="col-12">
                            <div class="appId p-5">
                                <h5>The Submitted Applicant ID : {{ $projectId->applicantId}}</h5>
                            </div>
                        </div>
                     </div>
                    

                    @else

                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-primary text-primary">
                                <h5>This Project is not approved by COO</h5>
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
            <div class="card-header but mt-5">
                <h2 class="p-4 mt-3">FILE UPLOADING STAGE</h2>
            </div>
            <div class="card-body">
                @if($stage2Status === 2 && Auth::user()->role ===3 && Auth::user()->id === $projectId->projectManager)
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
      
                          <button type="submit" class="btn but">Submit</button>
                
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
                <div class="card-header but mt-5">
                    <h2 class="p-4 mt-3">FUND ALLOCATION STAGE</h2>
                </div>
                <div class="card-body">
                    @if($stage3Status === 2 && Auth::user()->role ===3 && Auth::user()->id === $projectId->projectManager)
                    <div class="row">
                        <div class="col-11"></div>
                        <div class="col-1">
                            <button type="button" class="btn but rounded-circle mb-2 float-end" data-bs-toggle="modal" data-bs-target="#fundModal">
                                <i class="bi bi-wallet-fill"></i>
                              </button>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-12">                
                    <table id="fundTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>                             
                                <th>Input</th>
                                <th>Amount</th>
                                <th>Unit</th>
                                <th>Action</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                           
                            <!-- Repeat for other materials -->
                        </tbody>
                    </table>
                    <div class="modal fade" id="editFund" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header but">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Update Fund Status</h1>
                              <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editFundForm">
                                    @csrf
                                    <input type="hidden" name="fundId" id="editFundId">
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
                                        <label for="editUnit">Unit</label>
                                        <input type="text" name="unit" id="editUnit" class="form-control" required>
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
            <button type="button" class="btn but cancel" data-dismiss="modal">Cancel</button>
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
                                    <label for="amount">Amount/Parameter</label>
                                    <input type="number" name="amount" id="amount" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <input type="text" name="unit" id="unit" class="form-control" required>
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
                            <div class="modal-header but">
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

                                            <button type="submit" class="btn btn-primary mt-2 but">Add Input</button>
                               
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
                    <div class="card-header but mt-5">
                        <h2 class="p-4 mt-3">IMPLEMENTATION STAGE</h2>
                    </div>
                    <div class="card-body">
                        @if($stage4Status === 2 && Auth::user()->role ===3 && Auth::user()->id === $projectId->projectManager)
        
                        <div class="row">
                            <div class="col-12">                
                            <table id="ImplementationTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>                             
                                        <th>Input</th>
                                        <th>Total</th>
                                        <th>Utilized</th>
                                        <th>Current</th>
                                        <th>Balance</th>
                                        <th>Action</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <!-- Repeat for other materials -->
                                </tbody>
                            </table>

 <!-- Edit Current Value Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header but">
                <h5 class="modal-title" id="editModalLabel">Request Current</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="fundId" value="">
                <div class="mb-3">
                    <label for="current">Current Value:</label>
                    <input type="number" name="current" id="current" class="form-control">
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn but" id="saveChanges">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!--Send bill confirmation modal-->

<div id="BillModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="submitBillModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header custommodal">
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
                <button type="button" class="btn but cancel" data-dismiss="modal">Cancel</button>
                <button type="button" id="submitBill" class="btn btn-danger">Submit</button>
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
                    <div class="card-header but mt-5">
                        <h2 class="p-4 mt-3"> COMPLETION STAGE</h2>
                    </div>
                    <div class="card-body">
                    @if($stage5Status === 2 && Auth::user()->role ===3 && $stage6Status != 1 && $stage6Status!=2)
                                    
                        <form id="completionForm" method="post" enctype="multipart/form-data">
                        @csrf
                            <!-- Text Fields -->
                            <div>
                                <input type="hidden" name="proId" value="{{ $projectId->proId }}">
                                <label for="text1">Text Field 1:</label>
                                <input type="text" id="text1" name="field1" class="form-control">
                                <span class="text-danger" id="text1Error"></span>
                            </div><br>
                            <div>
                                <label for="text2">Text Field 2:</label>
                                <input type="text" id="text2" name="field2" class="form-control">
                                <span class="text-danger" id="text2Error"></span>
                            </div><br>
                            <div>
                                <label for="text3">Text Field 3:</label>
                                <input type="text" id="text3" name="field3" class="form-control">
                                <span class="text-danger" id="text3Error"></span>
                            </div><br>
                        
                            <!-- File Uploads -->
                            <div>
                                <label for="file1">File Upload 1:</label>
                                <input type="file" id="file1" name="file1" class="form-control">
                                <span class="text-danger" id="file1Error"></span>
                            </div><br>
                           
                            <!-- Photo Uploads -->
                            <div>
                                <label for="photo1">Photo Upload 1:</label>
                                <input type="file" id="photo1" name="photo1" class="form-control">
                                <span class="text-danger" id="photo1Error"></span>
                            </div><br>
                            <div>
                                <label for="photo2">Photo Upload 2:</label>
                                <input type="file" id="photo2" name="photo2" class="form-control">
                                <span class="text-danger" id="photo2Error"></span>
                            </div>
                           
                        
                    <div class="row">
                        <div class="col-5"></div>
                        <div class="col-5">
                            <button type="submit" class="btn but mt-2">Submit</button>
                        </div>
                    </div>
                            
                        </form>
                @elseif($stage6Status === 1 && Auth::user()->role ===3)         
                  <div class="completionView p-4">    
                    <div class="row">
                        <div class="col-10"></div>
                        <div class="col-2">
                            <div class="col-1">
                                <button type="button" class="btn but btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#editCompletionModal" style="width:100px" data-id="{{ $projectId->proId }}">
                                  Edit
                                  </button> </div>
                        </div>                       
                       </div> 
                              
                    <div class="row">
                        <div class="col-4">name1</div>
                        <div class="col-2">:</div>
                        <div class="col-4">
                            <strong>{{ $com->field1 }}</strong>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">name2</div>
                        <div class="col-2">:</div>
                        <div class="col-4">
                            <strong>{{ $com->field2 }}</strong>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">name3</div>
                        <div class="col-2">:</div>
                        <div class="col-4">
                            <strong>{{ $com->field3 }}</strong>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">file1</div>
                        <div class="col-2">:</div>
                        <div class="col-4">
                            @if($com->file1)
                                  <button class="btn btn-danger btn-sm view-file" data-id="{{ $projectId->documentId }}" data-type="{{ $doc }}"><i class="bi bi-file-earmark-pdf-fill"></i></button>
                            
                            @endif
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">photo1</div>
                        <div class="col-2">:</div>
                        <div class="col-4">
                          <img src="{{ asset('/documents24/'.$com->photo1.'')}}"  height="100" width="100" alt="">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">photo2</div>
                        <div class="col-2">:</div>
                        <div class="col-4">
                            <img src="{{ asset('/documents24/' . $com->photo2.'') }}" height="100" width="100" alt="">

                        </div>
                    </div>
                    @elseif($stage6Status === 2 && Auth::user()->role ===3)
                    <div class="row">
                        <div class="col-4">name1</div>
                        <div class="col-2">:</div>
                        <div class="col-4">
                            <strong>{{ $com->field1 }}</strong>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">name2</div>
                        <div class="col-2">:</div>
                        <div class="col-4">
                            <strong>{{ $com->field2 }}</strong>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">name3</div>
                        <div class="col-2">:</div>
                        <div class="col-4">
                            <strong>{{ $com->field3 }}</strong>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">file1</div>
                        <div class="col-2">:</div>
                        <div class="col-4">
                            @if($com->file1)
                                  <button class="btn btn-danger btn-sm view-file" data-id="{{ $projectId->documentId }}" data-type="{{ $doc }}"><i class="bi bi-file-earmark-pdf-fill"></i></button>
                            
                                  @endif
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">photo1</div>
                        <div class="col-2">:</div>
                        <div class="col-4">
                          <img src="{{ asset('documents24/'.$com->photo1.'')}}"  height="100" width="100" alt="">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">photo2</div>
                        <div class="col-2">:</div>
                        <div class="col-4">
                            <img src="{{ asset('documents24/'.$com->photo2.'')}}" height="100" width="100" alt="">
                        </div>
                    </div>
                   
                   
                @else 
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary text-primary">
                            <h5>Please complete stage 5,Implementation is mandatory</h5>
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header but">
                        <h5 class="modal-title" id="editModalLabel">Edit Form</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editCompletionForm" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="proId" id="proId" value="{{ $projectId->proId}}">
        
                            <!-- Text Fields -->
                            <div>
                                <label for="text1">Text Field 1:</label>
                                <input type="text" id="text1" name="field1" class="form-control" value="{{ $com->field1 }}">
                                <span class="text-danger" id="text1Error"></span>
                            </div><br>
                            <div>
                                <label for="text2">Text Field 2:</label>
                                <input type="text" id="text2" name="field2" class="form-control" value="{{ $com->field2 }}">
                                <span class="text-danger" id="text2Error"></span>
                            </div><br>
                            <div>
                                <label for="text3">Text Field 3:</label>
                                <input type="text" id="text3" name="field3" class="form-control" value="{{ $com->field3 }}">
                                <span class="text-danger" id="text3Error"></span>
                            </div><br>
        
                            <!-- File Uploads -->
                            <div>
                                <label for="file1">File Upload 1:</label>
                                <input type="file" id="file1" name="file1" class="form-control" value="{{ $com->file1 }}">
                                <span class="text-danger" id="file1Error"></span>
                            </div><br>
        
                            <!-- Photo Uploads -->
                            <div>
                                <label for="photo1">Photo Upload 1:</label>
                                <input type="file" id="photo1" name="photo1" class="form-control" value="{{ $com->photo1 }}">
                                <span class="text-danger" id="photo1Error"></span>
                            </div><br>
                            <div>
                                <label for="photo2">Photo Upload 2:</label>
                                <input type="file" id="photo2" name="photo2" class="form-control" value="{{ $com->photo2 }}">
                                <span class="text-danger" id="photo2Error"></span>
                            </div>
        
                            <div class="row">
                                <div class="col-5"></div>
                                <div class="col-5">
                                    <button type="submit" class="btn but mt-2">Update</button>
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



@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                dataSrc: 'data',
                
            },
                "columns": [
                    { "data": "input"},  
                    {"data":"amount"}, 
                    {"data":"unit"},  
                                     
                    {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                                      
                    return `
                    <div class="dd d-flex">
                       
                        <button class="btn btn-warning btn-sm edit me-1" data-id="${row.fundId}" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete" data-id="${row.fundId}" data-input="${row.input}" title="Delete">
                            <i class="bi bi-trash"></i>
                        </button>   
                                     
                       
                    `;
                } 
            },
                    
                ]
            });
        });  



        //Implementation datatable 
    $(document).ready(function() {
    $('#ImplementationTable').DataTable({
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
                dataSrc: 'data',
                
            },
                "columns": [
             
                { "data": "input" },
                { "data": "amount" },
                { "data": "utilized" },
                { "data": "current" },
                { "data": "balance" },                   
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
                   
                        <button class="btn btn-info btn-sm submit" data-id="${row.fundId}" data-input="${row.input}" title="Submit Bill">
                          Submit
                        </button>   
                                     
                       
                    `;
                } 
            },
                    
                ]
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
        $('#editUnit').val(data.unit); // Populate unit
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
$(document).ready(function() {

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
                alert('Error updating the current value.');
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
                localStorage.setItem('activeTab', '#admin-stage6');
                },
                error: function() {
                    alert('Error downloading file');
                }
            });
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


  
</script>
@endpush

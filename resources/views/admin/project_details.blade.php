@extends('layouts.master')

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
<div class="row">
    <div class="col-12">
        <ul class="nav nav-tabs d-none d-sm-flex" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="TabControl-Highlights" data-bs-toggle="tab" href="#admin-stage1" role="tab" aria-controls="admin-stage1" aria-selected="true">
                    STAGE 1
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="TabControl-Specs" data-bs-toggle="tab" href="#admin-stage2" role="tab" aria-controls="admin-stage2" aria-selected="false">
                    STAGE 2
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="TabControl-Support" data-bs-toggle="tab" href="#admin-stage3" role="tab" aria-controls="admin-stage3" aria-selected="false">
                    STAGE 3
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="TabControl-Support" data-bs-toggle="tab" href="#admin-stage4" role="tab" aria-controls="admin-stage4" aria-selected="false">
                    STAGE 4
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="TabControl-Support" data-bs-toggle="tab" href="#admin-stage5" role="tab" aria-controls="admin-stage4" aria-selected="false">
                    STAGE 5
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="TabControl-Support" data-bs-toggle="tab" href="#admin-stage6" role="tab" aria-controls="admin-stage4" aria-selected="false">
                    STAGE 6
                </a>
            </li>
        </ul>

        <div class="tab-content container-fluid">
            <div class="tab-pane fade show active" id="admin-stage1" role="tabpanel" aria-labelledby="TabControl-Highlights">
                <a href="#pdp-highlights" class="panel-title d-block d-sm-none" data-bs-toggle="collapse">
                    Highlights
                </a>
                <div class="collapse show" id="pdp-highlights">
                    <div class="card">
                        <div class="card-header widgetcolor mt-5">
                            <h2 class="p-4 mt-3">PROJECT DETAIL</h2>
                        </div>
                        <div class="card-body p-5">
                            @if(Auth::user()->role === 2 || Auth::user()->role === 1 || Auth::user()->role === 6)
                            <div class="row">
                                @if($stage1Status === 2)
                                <div class="col-12 p-3">
                                    <div class="alert alert-success fs-6 fw-bold">
                                        Project Approved
                                    </div>
                                </div>
                                @else
                                <div class="col-12 bg-secondary mb-3">
                                    <p class="fs-6 text-primary p-3 mt-3">Please verify the project details once before you approve the project</p>
                                </div>
                                @if(Auth::user()->role === 2)
                                <div class="col-4">
                                    <a href="#" id="approvebutton" class="btn btn-danger rounded" data-id="{{ $projectId->project_id }}">
                                        Approve
                                    </a>
                                </div>
                                @endif
                                @endif
                            </div>

                            <form id="proDet" method="POST">
                                @csrf
                                <input type="hidden" name="proId" value="{{ $projectId->project_id }}">
                                <div class="row mt-5">
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

                                @if($stage1Status !== 2)
                                <div class="row mt-3">
                                    <div class="col-3"></div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-success">Verify</button>
                                    </div>
                                </div>
                                @endif
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

          
            <div class="tab-pane fade" id="admin-stage2" role="tabpanel" aria-labelledby="TabControl-Specs">
                <div class="collapse" id="pdp-specs">
                    <div class="card">
                        <div class="card-header widgetcolor mt-5 mb-0">
                            <h2 class="p-4 mt-3">APPLICANT DETAIL</h2>
                        </div>
                        <div class="card-body">
                            @if(($stage2Status === 1 || $stage2Status === 2) && (Auth::user()->role === 2 || Auth::user()->role === 1 || Auth::user()->role === 6))

                            @if($stage2Status === 2)
                                <div class="row">
                                    <div class="col-12 p-1">
                                        <div class="alert alert-success fs-6 fw-bold ms-3">
                                            Applicant ID {{ $applicantId}} has been Approved
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="#" id="applicantApprove" class="btn btn-danger rounded ms-3" style="width:150px" data-id="{{ $projectId->project_id }}">
                                    Approve
                                </a>
                           @endif
        
                                @if($appdetOC)
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
                </div>
            </div>
        @endif
        

            <div class="tab-pane fade" id="admin-stage3" role="tabpanel" aria-labelledby="TabControl-Support">
           
                
                <div class="collapse" id="pdp-support">
                    <div class="card">
                        <div class="card-header widgetcolor mt-5">
                            <h2 class="p-4 mt-3">FILES</h2>
                        </div>
                        <div class="card-body">
                    @if(($stage3Status === 1 || $stage3Status === 2) && (Auth::user()->role === 2 || Auth::user()->role === 1 || Auth::user()->role === 6))

                 
                    <div class="row">
                        @if($stage3Status ===2)
                        <div class="col-12 p-3">
                            <div class="alert alert-success fs-6 fw-bold">
                                Uploaded files are Approved
                            </div>
                        </div>
                    </div>
                @else 
                <div class="col-9"></div>
                <div class="col-3">
                    <a href="#" id="fileApprove" class="btn btn-danger mt-3 float-end rounded" data-id="{{ $projectId->proId }}" style="width:150px;">
                        Approve
                    </a>
                </div>
                               
                @endif
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th><strong>Document Name</strong></th>
                                <th><strong>Action</strong></th>
                             
                            </tr>
                        </thead>
      
                        <tbody>
                       
                          
                          @foreach (['land_document', 'possession_certificate', 'recommendation_letter', 'committee_minutes', 'permit_copy', 'plan', 'tender_schedule_sheet', 'site_study', 'quotations', 'quotations_approval_form', 'work_order_letter', 'meeting_minutes_copy', 'agreement_with_contractor', 'agreement_with_committee', 'project_summary_form'] as $doc)
                          <tr>
                              <td>{{ ucfirst(str_replace('_', ' ', $doc)) }}</td>
                            
                            
                              <td>
                                  @if(isset($projectId->$doc))
                                      <div class="d-flex">
                                          <button class="btn btn-sm btn-danger view-doc me-1" data-id="{{ $projectId->documentId }}" data-type="{{ $doc }}"><i class="bi bi-file-earmark-pdf-fill"></i></button>
                                         
                                      </div>
                                  @else
                                      No File
                                  @endif
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      
                    </table>
                    @endif
                        </div>
                    </div>
                </div>
            </div>
 

<!--admin stage 4 -->

<div class="tab-pane fade" id="admin-stage4" role="tabpanel" aria-labelledby="TabControl-Support">
           
                
    <div class="collapse" id="pdp-support">
        <div class="card">
            <div class="card-header widgetcolor mt-5">
                <h2 class="p-4 mt-3">FUNDS ALLOCATED</h2>
            </div>
            <div class="card-body">
            
                @if(($stage4Status === 1 || $stage4Status === 2) && (Auth::user()->role === 2 || Auth::user()->role === 1 || Auth::user()->role === 6))

        @if($stage4Status === 2)
        <div class="row">
           
            <div class="col-12 p-3">
                <div class="alert alert-success fs-6 fw-bold">
                    Fund Allocated are Approved
                </div>
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
                                   
                                </tr>
                            </thead>
                            <tbody>
                               
                                <!-- Repeat for other materials -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th id="totalAmount">₹ 0</th> <!-- Placeholder for total amount -->
                                
                                </tr>
                            </tfoot>
                        </table>
                       
                      </div>
                    </div>


                    @endif
                        </div>
                        </div>
                    
                </div>
            </div>


            <!-- admin stage 5-->
            <div class="tab-pane fade" id="admin-stage5" role="tabpanel" aria-labelledby="TabControl-Support">
           
                
                <div class="collapse" id="pdp-support">
                    <div class="card">
                        <div class="card-header widgetcolor">
                            <h2 class="p-4 mt-3">BILLS IMPLEMENTED</h2>
                        </div>
                        <div class="card-body">
                        
                            @if(($stage4Status === 2 || $stage5Status === 1) && (Auth::user()->role === 2 || Auth::user()->role === 1 || Auth::user()->role === 6))
                            @if($stage5Status === 2)
                            <div class="row">
                               
                            <div class="col-12 p-3">
                                    <div class="alert alert-success fs-6 fw-bold">
                                        Bills  Approved
                                    </div>
                                </div>
                            </div>
                            @endif
          
            @if($allCooApproved && $stage6Status === 3) 
                           
                           <div class="row">
                            <div class="col-10"></div>
                            <div class="col-2">
                                <a href="#" id="billApprove" class="btn btn-danger mt-3 mb-3 w-100 rounded" data-id="{{ $projectId->proId }}" style="width:150px;">
                                   Final Approve
                                </a>
                            </div>
                           
                           </div>
             @endif                     
              
                           


                               
                                <div class="row">
                                 <div class="col-12">
                                    <table id="ImplementTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>   
                                                <th>BillNo</th>                          
                                                <th>Input</th>
                                                <th>Total</th>
                                                <th>Utilized</th>
                                                <th>Current</th>
                                                <th>balance</th>
                                                <th>Previous Current</th>
                                                <th>Previous updates</th>
                                                <th>Action</th>
                                                <th>Approval</th>
                                                <th>Status</th>
                                                <th>Remarks</th>                                              
                                             
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <!-- Repeat for other materials -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th id="totalAmounts"></th>
                                                <th id="totalUtilized"></th>
                                                <th></th>
                                                <th id="totalBalance"></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                 

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
                                                                        <button type="submit" class="btn btn-sm pro  mt-3">Mark as Read</button>
                                                                    </div>
                                                                </div>
                                                               
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                 
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header widgetcolor">
                <h5 class="modal-title" id="editModalLabel">Update utilized</h5>
                <button type="widgetcolorton" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="fundId">
                <div class="mb-3">
                    <label for="utilized">utilized Value:</label>
                    <input type="number" name="utilized" id="utilized" class="form-control">
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn pro" id="saveChanges">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>
                                </div>
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-4">
                                        <canvas id="myPieChart" style="width: 300px; height: 300px;"></canvas>
                                    </div>
                                </div>
                                {{-- <div class="toast" id="statusToast" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; top: 20px; right: 20px; z-index: 1050;">
                                    <div class="toast-header widgetcolor">
                                        
                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="toast-body bg-white" id="toastMessage">
                                        <!-- Message will be inserted here -->
                                    </div>
                                </div>          --}}
            
                                @endif
                                    </div>
                                    </div>
                             
                            </div>
                        </div>





                          <!-- admin stage 6-->
            <div class="tab-pane fade" id="admin-stage6" role="tabpanel" aria-labelledby="TabControl-Support">
           
                
                <div class="collapse" id="pdp-support">
                    <div class="card">
                        <div class="card-header widgetcolor">
                            <h2 class="p-4 mt-3">COMPLETION STAGE</h2>
                        </div>
                        <div class="card-body">
                            @if(($stage6Status === 2 || $stage6Status === 3) && (Auth::user()->role===2 || Auth::user()->role===1 ||Auth::user()->role === 6))
                            
                            @if($stage6Status ===3)
                            <div class="row">
                               
                            <div class="col-12 p-3">
                                    <div class="alert alert-success fs-6 fw-bold">
                                      Project successfully approved
                                    </div>
                                </div>
                            </div>
                                   @else
                                   <div class="row">
                                    <div class="col-10"></div>
                                    <div class="col-2">
                                        <div class="col-1">
                                            <button id="approveCompletion" class="btn btn-danger rounded" style="width:100px" data-id="{{ $projectId->proId }}">Approve</button>
                                        </div>
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
                                                <i class="bi bi-file-earmark-pdf-fill"></i>
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
                        
                              
@endif

                        </div>
                        </div>
                             
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
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    className: 'pro',
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
                url: `{{ url('/admin/project/details/stage4/fund/view') }}`,
                type: 'GET',
                dataSrc: function(json) {
                // Update the footer with total values from the server response
                $('#totalAmount').text('₹ ' + json.totalAmount.toFixed(2));
             // Return the data for DataTables
                return json.data;
            },
                
            },
                "columns": [
                    {"data": "input"},  
                    {"data":"amount",
                        "render": function(data, type, row) {
                  
                    return '₹ ' + data; // Adds the rupee symbol before the amount
                    },
                    }, 
                
                                              
            ]
            });
        });  
     var userRole = {{ Auth::user()->role }}
$(document).ready(function() {
    $('#ImplementTable').DataTable({
        select: true,
        serverSide: false, // Set this to true if you’re using server-side processing
        dom: 'Bfrtlip',
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Download Excel',
                    title: 'Implementation Details',
                    titleAttr: 'Export to CSV',
                    className: 'pro',
                    exportOptions: {
                        columns: function (idx, data, node) {
                        return true;
            }
                    }
                }
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 Implementations', '25 Implementations', '50 Implementations', 'All Implementations']
            ],
            ajax: {
                url: `{{ url('/admin/project/details/stage5/implementation/datatable') }}`,
                type: 'GET',
                dataSrc: function(json) {
                $('#totalAmounts').text('Total Amount :₹ ' + json.totalAmount.toFixed(2));
                $('#totalUtilized').text('Total Utilized:₹ ' + json.totalUtilized.toFixed(2));
                $('#totalBalance').text('Total Balance:₹ ' + json.totalBalance.toFixed(2));
                return json.data; // This is the key point
                },               
                },
                "columns": [
                    {"data":"billId"},
                    {"data": "input"},  
                    {"data":"amount",
                    "render": function(data, type, row) {
                  
                    return '₹ ' + data; // Adds the rupee symbol before the amount
                     },
                    }, 
                    {"data":"utilized",
                        "render": function(data, type, row) {
                  
                    return '₹ ' + data; // Adds the rupee symbol before the amount
                    },
                    },    
                    {"data":"current",
                        "render": function(data, type, row) {
                  
                    return '₹ ' + data; // Adds the rupee symbol before the amount
                    },
                    },   
                    {"data":"balance",
                        "render": function(data, type, row) {
                  
                    return '₹ ' + data; // Adds the rupee symbol before the amount
                    },
                    }, 
                    { "data": "previous_current",
                    "render": function(data, type, row) {
                  
                    return '₹ ' + data; // Adds the rupee symbol before the amount
                },
                 },  
                 {"data":"previous_updates"},  
                 {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                                      
                    return `
                    <div class="dd d-flex">
                       <button class="btn btn-dark btn-sm edit-utilized me-1" data-id="${row.fundId}" title="Edit">
                            Update Utilized
                        </button>                                                          
                       
                    `;
                }

                    },
                    {
                    data: null,
                    name: 'approval',
                    orderable: false,
                    searchable: false,
    render: function(data, type, row, meta) {
        // Check conditions
        if (row.stage5_status === 1 && row.pmt_status === 1 && row.hod_status === 1 && row.fm_status === 1 && userRole === 2) {
            return `<button class="btn btn-danger btn-sm info COO-approval me-1" data-id="${row.fundId}" title="COO Approval">
                COO Approval
                </button>`;
        } else if (row.stage5_status === 1 && row.pmt_status === 1 && userRole === 6) {
            return `<button class="btn btn-danger btn-sm info HOD-approval me-1" data-id="${row.fundId}" title="HOD Approval">
                HOD Approval
                </button>`;
        } else if (row.stage5_status === 1 && row.pmt_status === 0 && userRole === 6) {
            return `<p>This Material needs approval by Project Engineer</p>`;
        }

        // Default return if no conditions are met
        return '';
    }
},
       {
                data: null,
                name: 'status',
                orderable: false,
                searchable: false,
               
                render: function(data, type, row, meta) {

        // Check conditions
        if ((row.stage5_status === 1 || row.stage5_status === 2) && row.pmt_status === 1 && row.hod_status === 1 && row.fm_status === 1 && row.coo_status ===1) {
            return `<div class="badge text-bg-info">COO Approved</div>`;
        } 
        else if ((row.stage5_status === 1|| row.stage5_status === 2) && row.pmt_status === 1 && row.hod_status === 1 && row.fm_status === 1) {
            return `<div class="badge text-bg-info">Financial Manager Approved</div>`;
        } else if ((row.stage5_status === 1 || row.stage5_status ===2) && row.pmt_status === 1 && row.hod_status === 1) {
            return `<div class="badge text-bg-info">HOD approved</div>`;
        } else if ((row.stage5_status === 1 || row.stage5_status === 2) && row.pmt_status === 1) {
            return `<div class="badge text-bg-info">Project Engineer approved</div>`;
        }          return ''; 
      
    }        
                },  
                {
                    data:"remarks",
                }           
            ],
            columnDefs: [
            {
                // Hide the approval column for roles 1, 2, and 6
                targets: [6,7],
                visible: ![1, 2, 6].includes(userRole) // Show if userRole is not 1, 2, or 6
            }
        ]   });
        });  




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
        localStorage.setItem('activeTab', '#admin-stage1');
        activateTab('#admin-stage1');
    }

    $('.nav-link').on('click', function() {
        const selectedTab = $(this).attr('href');
        localStorage.setItem('activeTab', selectedTab);
        activateTab(selectedTab);
    });
});

$(document).ready(function() {
    $('#proDet').on('submit', function(e) {
        e.preventDefault();
        $('.text-danger').text('');

        var formData = $(this).serialize();

        $.ajax({
            url: `{{ url('admin/projects/details/do') }}`,
            type: 'POST',
            data: formData,
            success: function(response) {
                toastr.success(response.message, 'Success');
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#admin-stage1');
                
            },
            error: function(response) {
                let errors = response.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $('#' + key + 'Error').text(value[0]);
                });
                toastr.error('Please check the form and correct the errors.', 'Error');
            }
        });
    });

    $(document).on('click', '#approvebutton', function(e) {
        e.preventDefault();
        var projectId = $(this).data('id');

        $.ajax({
            url: `{{ url('/admin/projects/details/approval') }}/${projectId}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                stage1_status: 1
            },
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#approvebutton').removeClass('btn-danger').addClass('btn-success').text('Approved');
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#admin-stage1');
                
            },
            error: function(response) {
                toastr.error(response.responseJSON.message || 'An error occurred. Please try again.', 'Error');
            }
        });
    });
});  
$(document).on('click', '#applicantApprove', function(e) {
    e.preventDefault();
    var projectId = $(this).data('id'); // Correctly retrieves project ID
    console.log(projectId); // Changed $projectId to projectId

    $.ajax({
        url: `{{ url('/admin/project/details/applicant/approve') }}/${projectId}`,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            stage1_status: 1
        },
        success: function(response) {
            toastr.success(response.message, 'Success');
            $('#applicantApprove') // Corrected from '#applicantapprove' to '#applicantApprove'
                .removeClass('btn-danger')
                .addClass('btn-success')
                .text('Approved');
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#admin-stage2');
                },
        
        error: function(response) {
            toastr.error(response.responseJSON.message || 'An error occurred. Please try again.', 'Error');
        }
    });
});


//download document 
$(document).ready(function() {       
        $('.view-doc').click(function() {
            event.preventDefault();
            var docId = $(this).data('id');
            var docType = $(this).data('type');

            $.ajax({
                url: `{{ url('/admin/download-document')}}`, // Adjust this to your download route
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
                localStorage.setItem('activeTab', '#admin-stage3');
                },
                error: function() {
                    alert('Error downloading file');
                }
            });
        });
    }); 


//file approve
$(document).on('click', '#fileApprove', function(e) {
        e.preventDefault();
        var projectId = $(this).data('id');

        $.ajax({
            url: `{{ url('/admin/project/details/files/approve') }}/${projectId}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                stage4_status: 1
            },
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#fileApprove').removeClass('btn-danger').addClass('btn-success').text('Approved');
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#admin-stage3');
                
            },
            error: function(response) {
                toastr.error(response.responseJSON.message || 'An error occurred. Please try again.', 'Error');
            }
        });
    });


   
    //Approve bill 
    $(document).on('click', '#billApprove', function(e) {
        e.preventDefault();
        var projectId = $(this).data('id');

        $.ajax({
            url: `{{ url('/admin/project/details/stage5/bill/approve') }}/${projectId}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                stage4_status: 1
            },
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#billApprove').removeClass('btn-danger').addClass('btn-success').text('Approved');
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#admin-stage5');
                
            },
            error: function(response) {
                toastr.error(response.responseJSON.message || 'An error occurred. Please try again.', 'Error');
            }
        });
    });
    //approve completion

    $(document).on('click', '#approveCompletion', function(e) {
        e.preventDefault();
        var projectId = $(this).data('id');

        $.ajax({
            url: `{{ url('/admin/project/details/stage6/completion/approve') }}/${projectId}`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                stage4_status: 1
            },
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#approveCompletion').removeClass('btn-danger').addClass('btn-success').text('Approved');
                setTimeout(function() {
                    location.reload(); // Reload the page
                }, 2000); 
                
                // Store the active tab in local storage
                localStorage.setItem('activeTab', '#admin-stage6');
                
            },
            error: function(response) {
                toastr.error(response.responseJSON.message || 'An error occurred. Please try again.', 'Error');
            }
        });
    }); 

    //download file on completion
    //download document 
$(document).ready(function() {       
        $('.view-file').click(function() {
            event.preventDefault();
            var docId = $(this).data('id');
            var docType = $(this).data('type');

            $.ajax({
                url: `{{ url('/admin/download/completion/file')}}`, // Adjust this to your download route
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


    // edit utilized by coo 
    //edit current input
$(document).ready(function() {

// Event for opening the edit modal
$('#ImplementTable').on('click', '.edit-utilized', function() {
    var fundId = $(this).data('id');
    $.get(`{{ url('/admin/projects/details/implementation/utilized') }}/${fundId}`, function(data) {
        // Fill the form with data
    $('#fundId').val(data.fundId);
    $('#utilized').val(data.current);
    $('#editModal').modal('show'); 
    });
});

// Save changes on the modal
$('#saveChanges').on('click', function() {
    var fundId = $('#fundId').val();
    var utilized = $('#utilized').val();

    $.ajax({
        url: `{{ url('/admin/projects/details/stage5/utilized/update') }}/${fundId} `, // Adjust your URL
        type: 'POST',
        data: {
             utilized: utilized,
            _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
        },
        success: function(response) {
            toastr.success(response.message, 'Success');
            $('#editModal').modal('hide');
            setTimeout(function() {
                    location.reload(); 
                }, 2000);

        },
       
    });
});
});


    document.addEventListener('DOMContentLoaded', function () {
        var toasts = document.querySelectorAll('.toast');
        toasts.forEach(function(toast) {
            var bsToast = new bootstrap.Toast(toast, {
                autohide: false // Disable auto-hide
            });
            bsToast.show();

            // Optional: Add a close button functionality
            var closebutton = toast.querySelector('.btn-close');
            closebutton.addEventListener('click', function() {
                bsToast.hide();
            });
        });

        // Handle AJAX form submission for marking as read
        document.querySelectorAll('.mark-as-read').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var toast = this.closest('.toast'); // Find the closest toast
                var formData = new FormData(this);

                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure to include CSRF token
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        // Hide the toast
                        var bsToast = bootstrap.Toast.getInstance(toast);
                        bsToast.hide();
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });

//hod material approve
$(document).on('click', '.HOD-approval', function(e) {
        e.preventDefault();
        var projectId = $(this).data('id');

        $.ajax({
            url: `{{ url('/admin/project/details/stage5/hod/material/approval') }}/${projectId}`,
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
                localStorage.setItem('activeTab', '#admin-stage5');
                
            },
            error: function(response) {
                toastr.error(response.responseJSON.message || 'An error occurred. Please try again.', 'Error');
            }
        });
    });

//coo material approve
$(document).on('click', '.COO-approval', function(e) {
        e.preventDefault();
        var projectId = $(this).data('id');

        $.ajax({
            url: `{{ url('/admin/project/details/stage5/coo/material/approval') }}/${projectId}`,
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
                localStorage.setItem('activeTab', '#admin-stage5');
                
            },
            error: function(response) {
                toastr.error(response.responseJSON.message || 'An error occurred. Please try again.', 'Error');
            }
        });
    }); 

    // $(document).ready(function() {
    //     // AJAX call to fetch data
    //     $.ajax({
    //         url: `{{ url('/admin/project/details/bill/status')}}`, // Adjust the URL if needed
    //         method: 'GET',
    //         dataType: 'json',
    //         success: function(json) {
    //             if (json.Message) {
    //             // Set the message in the toast body
    //             $('#toastMessage').text(json.Message);
                
    //             // Show the toast
    //             $('#statusToast').toast({
    //                 autohide: true,
    //                 delay: 5000 // Hide after 5 seconds
    //             }).toast('show');
    //         }
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             console.error('Error fetching pie chart data:', textStatus, errorThrown);
    //         }
            
    //     });
    //     $('#statusToast .close').click(function() {
    //     $('#statusToast').toast('hide');
    // });
    // });
    $(document).ready(function() {
    // AJAX call to fetch data
    $.ajax({
        url: `{{ url('/admin/project/details/bill/pie-chart')}}`, // Adjust the URL if needed
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
</script>
@endpush

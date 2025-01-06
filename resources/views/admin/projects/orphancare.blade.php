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
<ul class="nav nav-tabs d-none d-sm-flex" role="tablist">
    <!-- Highlights Tab -->
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="TabControl-Highlights" data-bs-toggle="tab" href="#tab-highlights" role="tab" tabindex="0" aria-controls="tab-highlights" aria-selected="true">
        Beneficiary Details Upload
      </a>
    </li>
  
    <!-- Specs Tab -->
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="TabControl-Specs" data-bs-toggle="tab" href="#tab-specs" role="tab" tabindex="-1" aria-controls="tab-specs" aria-selected="false">
       Fund Allocation
      </a>
    </li>
  </ul>
  
  <div class="tab-content container-fluid">
    <!-- Highlights Tab Pane -->
    <div class="tab-pane fade show active" id="tab-highlights" role="tabpanel" aria-labelledby="TabControl-Highlights">
      <div class="collapse show" id="pdp-highlights">        
      <div class="row mt-3">
            <div class="float-end d-none d-md-block">
                <button type="button" class="btn pro mb-2 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-folder-plus fs-4"></i>
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header widgetcolor">
                                <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add Project</h1>
                                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="projectForm">
                                 @csrf
                                 <div class="mb-3">
                                    <label for="agency_id" class="form-label">Agency ID</label>
                                    <input type="text" class="form-control" id="agency_id" name="agency_id">
                                    <span class="error text-danger" id="agency_id-error"></span>
                                </div>
                    
                                <!-- Donor Name -->
                                <div class="mb-3">
                                    <label for="donor_name" class="form-label">Donor Name</label>
                                    <select class="form-select" id="donor_name" name="donor_name">
                                        <option value="" disabled selected>Select a donor</option>
                                        <!-- Example of dynamic donor options (replace with your data) -->
                                        @foreach($donor as $donors)
                                        <option value="{{ $donors->donor_id}}">{{ $donors->partner_name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="error text-danger" id="donor_name-error"></span>
                                </div>
                    
                                <!-- Application ID (Dropdown) -->
                                <div class="mb-3">
                                    <label for="application_id" class="form-label">Application ID</label>
                                    <select class="form-select" name="application_id">
                                        <option value="">Select Application ID</option>
                                       @foreach($opcare as $opcares)
                                       <option value="{{ $opcares->orphancareId }}">{{ $opcares->applicationId }}</option>
                                       @endforeach
                                    </select>
                                    <span class="error text-danger" id="application_id-error"></span>
                                </div>
                    
                                <!-- Bank Account Details (Inside a Fieldset) -->
                                <fieldset class="mb-3">
                                    <legend>Bank Account Details</legend>
                    
                                    <!-- Account Name -->
                                    <div class="mb-3">
                                        <label for="account_name" class="form-label">Account Name</label>
                                        <input type="text" class="form-control" id="account_name" name="account_name">
                                        <span class="error text-danger" id="account_name-error"></span>
                                    </div>
                    
                                    <!-- Account Number -->
                                    <div class="mb-3">
                                        <label for="account_number" class="form-label">Account Number</label>
                                        <input type="text" class="form-control" id="account_number" name="account_number">
                                        <span class="error text-danger" id="account_number-error"></span>
                                    </div>
                    
                                    <!-- IFSC Code -->
                                    <div class="mb-3">
                                        <label for="ifsc_code" class="form-label">IFSC Code</label>
                                        <input type="text" class="form-control" id="ifsc_code" name="ifsc_code">
                                        <span class="error text-danger" id="ifsc_code-error"></span>
                                    </div>
                    
                                    <!-- Bank Branch -->
                                    <div class="mb-3">
                                        <label for="bank_branch" class="form-label">Bank Branch</label>
                                        <input type="text" class="form-control" id="bank_branch" name="bank_branch">
                                        <span class="error text-danger" id="bank_branch-error"></span>
                                    </div>
                    
                                    <!-- Bank Name -->
                                    <div class="mb-3">
                                        <label for="bank_name" class="form-label">Bank Name</label>
                                        <input type="text" class="form-control" id="bank_name" name="bank_name">
                                        <span class="error text-danger" id="bank_name-error"></span>
                                    </div>
                                </fieldset>
                    
                                <!-- Name of Cluster (Dropdown) -->
                                <div class="mb-3">
                                    <label for="cluster_name" class="form-label">Name of Cluster</label>
                                    <select class="form-select" id="cluster_name" name="cluster_name">
                                        <option value="" disabled selected>Select Cluster</option>
                                        <!-- Example of dynamic cluster options (replace with your data) -->
                                        <option value="cluster1">Cluster 1</option>
                                        <option value="cluster2">Cluster 2</option>
                                        <option value="cluster3">Cluster 3</option>
                                    </select>
                                    <span class="error text-danger" id="cluster_name-error"></span>
                                </div>
                    
                                <!-- Project Type with exceptions -->
                                <div class="mb-3">
                                    <label for="project_type" class="form-label">Project Type</label>
                                    <select class="form-select" id="project_type" name="project_type">
                                        <option value="">Select Project Type</option>
                                        <option value="Markaz Orphan Care">Orphan Care</option>
                                        <option value="Family Aid">Family Aid</option>
                                        <option value="Differently Abled">Differently Abled</option>
                                    </select>
                                    <span class="error text-danger" id="project_type-error"></span>
                                </div>
                    
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary float-end submit-project">Submit</button>
                                </div>
                                </form>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
           <!-- Project Details Modal -->
           <div class="modal fade" id="ProjectDetailsModal" tabindex="-1" aria-labelledby="ProjectDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header widgetcolor">
                        <h1 class="modal-title fs-5 text-light" id="ProjectDetailsModalLabel">Project Details</h1>
                        <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4" id="ProjectDetails">
                        <!-- Project details will be loaded here -->
                    </div>
                </div>
            </div>
        </div>  
        
        <!--edit modal -->
        <div class="modal fade" id="EditexampleModal" tabindex="-1" aria-labelledby="EditexampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header widgetcolor">
                        <h1 class="modal-title fs-5 text-light" id="EditexampleModalLabel">Edit Project</h1>
                        <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form id="EditprojectForm" method="POST">
                                @csrf
                                <div class="mb-3">
                                   <label for="agency_id" class="form-label">Agency ID</label>
                                   <input type="text" class="form-control" id="agency_id" name="agency_id">
                                   <span class="error text-danger" id="agency_id-error"></span>
                               </div>
                   
                               <!-- Donor Name -->
                               <div class="mb-3">
                                   <label for="donor_name" class="form-label">Donor Name</label>
                                   <select class="form-select" id="donor_name" name="donor_name">
                                       <option value="" disabled selected>Select a donor</option>
                                       <!-- Example of dynamic donor options (replace with your data) -->
                                       @foreach($donor as $donors)
                                       <option value="{{ $donors->donor_id}}">{{ $donors->partner_name }} </option>
                                       @endforeach
                                   </select>
                                   <span class="error text-danger" id="donor_name-error"></span>
                               </div>
                   
                               <!-- Application ID (Dropdown) -->
                               <div class="mb-3">
                                   <label for="application_id" class="form-label">Application ID</label>
                                   <select class="form-select" name="application_id">
                                       <option value="">Select Application ID</option>
                                      @foreach($opcare as $opcares)
                                      <option value="{{ $opcares->orphancareId }}">{{ $opcares->applicationId }}</option>
                                      @endforeach
                                   </select>
                                   <span class="error text-danger" id="application_id-error"></span>
                               </div>
                   
                               <!-- Bank Account Details (Inside a Fieldset) -->
                               <fieldset class="mb-3">
                                   <legend>Bank Account Details</legend>
                   
                                   <!-- Account Name -->
                                   <div class="mb-3">
                                       <label for="account_name" class="form-label">Account Name</label>
                                       <input type="text" class="form-control" id="account_name" name="account_name">
                                       <span class="error text-danger" id="account_name-error"></span>
                                   </div>
                   
                                   <!-- Account Number -->
                                   <div class="mb-3">
                                       <label for="account_number" class="form-label">Account Number</label>
                                       <input type="text" class="form-control" id="account_number" name="account_number">
                                       <span class="error text-danger" id="account_number-error"></span>
                                   </div>
                   
                                   <!-- IFSC Code -->
                                   <div class="mb-3">
                                       <label for="ifsc_code" class="form-label">IFSC Code</label>
                                       <input type="text" class="form-control" id="ifsc_code" name="ifsc_code">
                                       <span class="error text-danger" id="ifsc_code-error"></span>
                                   </div>
                   
                                   <!-- Bank Branch -->
                                   <div class="mb-3">
                                       <label for="bank_branch" class="form-label">Bank Branch</label>
                                       <input type="text" class="form-control" id="bank_branch" name="bank_branch">
                                       <span class="error text-danger" id="bank_branch-error"></span>
                                   </div>
                   
                                   <!-- Bank Name -->
                                   <div class="mb-3">
                                       <label for="bank_name" class="form-label">Bank Name</label>
                                       <input type="text" class="form-control" id="bank_name" name="bank_name">
                                       <span class="error text-danger" id="bank_name-error"></span>
                                   </div>
                               </fieldset>
                   
                               <!-- Name of Cluster (Dropdown) -->
                               <div class="mb-3">
                                   <label for="cluster_name" class="form-label">Name of Cluster</label>
                                   <select class="form-select" id="cluster_name" name="cluster_name">
                                       <option value="" disabled selected>Select Cluster</option>
                                       <!-- Example of dynamic cluster options (replace with your data) -->
                                       <option value="cluster1">Cluster 1</option>
                                       <option value="cluster2">Cluster 2</option>
                                       <option value="cluster3">Cluster 3</option>
                                   </select>
                                   <span class="error text-danger" id="cluster_name-error"></span>
                               </div>
                   
                   
                               <div class="mb-3">
                                <input type="hidden" name="id">
                                   <button type="submit" class="btn btn-primary float-end">Submit</button>
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
                    <div class="modal-header widgetcolor">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="modalMessage"></p>
                        <p>Agency Project Number: <span id="modalUserName"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn pro cancel" data-dismiss="modal">Cancel</button>
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
            
                                <h4 class="widgetcolor p-3 text-center rounded fw-bold border border-success" style="color:white;">Markaz Orphan Care</h4>
                    
                            </div>
                        </div>
                    </div>
            
                    <div class="card-body">
            
            <table id="projectTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>Project ID</th>
                        <th>Agency Id</th>
                        <th>Donor Name</th>
                        <th>Application ID</th>
                        <th>Account Name</th>
                        <th>Account Number</th>
                        <th>IFSC Code</th>
                        <th>Bank Branch</th>
                        <th>Bank Name</th>
                        <th>Cluster Name</th>
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
            
            
      </div>
    </div>
    </div>
  
    <!-- Product Specs Tab Pane -->
    <div class="tab-pane fade" id="tab-specs" role="tabpanel" aria-labelledby="TabControl-Specs">
      <div class="collapse" id="pdp-specs">
      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                          
                            <div class="col-12">
            
                                <h4 class="widgetcolor p-3 text-center rounded fw-bold border border-success" style="color:white;">Markaz Orphan Care</h4>
                    
                            </div>
                        </div>
                    </div>
            
                    <div class="card-body">
            
            <table id="fundTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                     
                        <th>Agency Id</th>
                        <th>Application ID</th>
                        <th>Donor Name</th>
                        <th>Name of Cluster</th>
                        <th>Total Amount</th>
                        <th>Current Amount</th>
                        <th>Action</th>
                        <th>Status</th>
                         
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
      

      </div>
    </div>

  </div>
  </div>
  


  
                <!--Fund modal -->
                <div class="modal fade" id="fundModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header widgetcolor p-3 text-center rounded fw-bold border border-success">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Fund Allocation</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="fundForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="amount">Current Amount</label>
                                    <input type="number" name="current" id="current" class="form-control" required>
                                </div>
                               
                                <div class="row">
                                    <div class="col-9"></div>
                                    <div class="col-3">
                                       <input type="hidden" name="id">
                                        <button type="submit" class="btn widgetcolor mt-3  w-100">Add Fund</button>
                            
                                    </div>
                                </div>
                            </form>
                        
                        </div>
                       
                      </div>
                    </div>
                  </div>  

                    {{-- <!--Request Current -->
                <div class="modal fade" id="currentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header widgetcolor p-3 text-center rounded fw-bold border border-success">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Request Current</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="currentForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="amount">Current</label>
                                    <input type="number" name="current" id="current" class="form-control" required>
                                </div>
                               
                                <div class="row">
                                    <div class="col-9"></div>
                                    <div class="col-3">
                                       <input type="hidden" name="id">
                                        <button type="submit" class="btn widgetcolor mt-3  w-100">Update Current</button>                            
                                    </div>
                                </div>
                            </form>
                        
                        </div>
                       
                      </div>
                    </div>
                  </div> --}}

<!--mark completion status -->
<div id="markConfirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header widgetcolor">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Completion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modalmarkMessage"></p>
                <p>Project ID: <span id="modalmarkUserName"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn pro cancel" data-dismiss="modal">Cancel</button>
                <button type="button" id="mark" class="btn btn-danger">Mark</button>
            </div>
        </div>
    </div>
</div>



@endsection 
@section('scripts')

<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
 <!-- Peity chart-->
 <script src="{{ asset('assets/libs/peity/peity.min.js') }}"></script>

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
    
    $('#projectTable').DataTable({
        select: true,
        serverSide: true, // Set this to true if you’re using server-side processing
        dom: 'Bfrtlip',
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Download Excel',
                    title: 'Projects',
                    titleAttr: 'Export to Excel',
                    className: 'pro',
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
                ['10 Projects', '25 Projects', '50 Projects', 'All Projects']
            ],
            ajax: {
                'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: `{{ url('/admin/projects/odf/datatable') }}`,
                type: 'POST',
                dataSrc: 'data',
                
            },
            "columns": [
            { data: 'project_id' },
            { data: 'agency_id' },
            { data: 'donorName' },
            { data: 'applicationId' },
            { data: 'account_name' },
            { data: 'account_number' },  
            { data: 'ifsc_code' }, 
            { data: 'bank_branch' },
            { data: 'bank_name' },  
            { data: 'cluster_name' },                  
            {
    data: null,
    name: 'action',
    orderable: false,
    searchable: false,
    render: function(data, type, row, meta) {
        return `
            <div class="dd d-flex">
                <button class="btn btn-primary btn-sm view-more me-1" data-id="${row.id}" title="view more">
                    <i class="bi bi-three-dots"></i>
                </button>
                <button class="btn btn-warning btn-sm edit me-1" data-id="${row.id}" title="Edit">
                    <i class="bi bi-pencil"></i>
                </button>
                <button class="btn btn-danger btn-sm delete" data-id="${row.id}" data-pro="${row.agency_id}" title="Delete">
                    <i class="bi bi-trash"></i>
                </button>  
                   <button type="button" class="btn btn-sm btn-dark mark ms-1" data-id="${row.id}" data-pro="${row.project_id}" title="Mark as Completed">
                <i class="bi bi-bookmark-star"></i>
            </button>     

            </div>
        `;
    }
}
        
                ]
            });
        });


    $(document).ready(function() {
    $('#fundTable').DataTable({
        select: true,
        serverSide: true, // Set this to true if you’re using server-side processing
        dom: 'Bfrtlip',
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Download Excel',
                    title: 'Projects',
                    titleAttr: 'Export to Excel',
                    className: 'pro',
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
                ['10 Projects', '25 Projects', '50 Projects', 'All Projects']
            ],
            ajax: {
                'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: `{{ url('/admin/projects/odf/datatable') }}`,
                type: 'POST',
                dataSrc: 'data',
                
            },
    "columns": [
                        { data: 'agency_id' },
                        { data: 'applicationId' },
                        { data: 'donorName' },  
                        { data: 'cluster_name' },        
                        { data: 'amount' },  
                        { data: 'current' },                          
                        {
                            
    data: null,
    name: 'action',
    orderable: false,
    searchable: false,
    render: function(data, type, row, meta) {
        return `
            <div class="dd d-flex">
            <button type="button" class="btn pro rounded-circle mb-2 float-end fund me-2" data-id="${row.id}" title="fund allocate">
     <i class="bi bi-cash-stack"></i>
            </button>     
           
                
            </div>
        `;
    }
},
{
    data: 'status',
},
        
                ]
            });
        }); 
//add project
$(document).ready(function() {
    $(".submit-project").click(function(e) {
        e.preventDefault();
        let form = $('#projectForm')[0];
        let data = new FormData(form);

        $.ajax({
            url: `{{ url('/admin/projects/odf/new') }}`,
            type: "POST",
            data:data,       
            dataType: "JSON",
            processData: false,
            contentType: false,
            success: function(response) {
            console.log(response); // Log response for debugging

    // Clear previous error messages
    $('.error').text('');

    if (response.status === 0) {
        $.each(response.errors, function(key, value) {
            $('#' + key + '-error').text(value[0]); 
        });
        toastr.error('Please fix the errors and try again.', 'Validation Error', { positionClass: 'toast-top-right' });
    } else if (response.status === 1) {
        toastr.success(response.message, 'Success', { positionClass: 'toast-top-right' });
        $('#projectForm')[0].reset(); // Clear form fields
        $('#exampleModal').modal('hide'); // Optionally, close the modal
        $('#projectTable').DataTable().ajax.reload();
        // $('').DataTable().ajax.reload();
    } else {
        toastr.error('Unexpected response format', 'Error', { positionClass: 'toast-top-right' });
       
    }
},
error: function(xhr, status, error) {
    console.error(xhr.responseText);
    toastr.error('Something went wrong!', 'Error', { positionClass: 'toast-top-right' });
}
});
});
});   
//view more
$(document).on('click', '.view-more', function() {
    const ProjectId = $(this).data('id');
    console.log('Clicked Project ID:', ProjectId);

    if (ProjectId !== undefined) {
        $.get(`{{ url('/admin/projects/odf/view/more') }}/${ProjectId}`, function(response) {
            console.log('Response data:', response);

            // Directly use response as it is, since it's an object with direct properties
            const data = response; 

            // Define the list of required keys (based on the provided response)
            const requiredKeys = [
                'account_name', 'account_number', 'agency_id', 'applicationId',
                'bank_branch', 'bank_name', 'cluster_name', 'created_at', 
                'donorName', 'ifsc_code', 'project_id', 'updated_at'
            ];

            // Target the modal body
            const modalBody = $('#ProjectDetails');
            modalBody.empty(); // Clear existing content

            // Create a Bootstrap row to hold the key-value pairs
            let gridHtml = '<div class="row">';

            // Iterate over the required keys and create grid columns
            requiredKeys.forEach((key, index) => {
                const capitalizedKey = key.replace(/([A-Z])/g, ' $1').replace(/^./, str => str.toUpperCase()); // Convert camel case to sentence case with first letter capitalized
                const value = data[key] !== undefined ? data[key] : 'Not Available';

                // Add a new row for every 2 key-value pairs
                if (index % 2 === 0 && index !== 0) {
                    gridHtml += '</div><div class="row">';
                }

                gridHtml += `
                    <ul class="list-group list-group-horizontal-md">
                        <div class="col-6">
                            <li class="list-group-item"><strong>${capitalizedKey}</strong></li>
                        </div>
                        <div class="col-6">
                            <li class="list-group-item"><strong>${value !== null ? value : 'Not Available'}</strong></li>
                        </div>
                    </ul>
                `;
            });

            gridHtml += '</div>'; // Close the last row

            // Append the constructed HTML to the modal body
            modalBody.append(gridHtml);

            // Show the modal
            $('#ProjectDetailsModal').modal('show');
        }).fail(function(xhr) {
            console.error('An error occurred:', xhr.responseText);
        });
    }
});


//edit project
$('#projectTable').on('click', '.edit', function() {
    const projectId = $(this).data('id');
   
    // Send GET request to fetch project data
    $.get(`{{ url('/admin/projects/odf/edit') }}/${projectId}`, function(data) {
        // Fill the form fields with the fetched data
        $('[name="id"]').val(data.id);
        // Fill Agency ID
        $('[name="agency_id"]').val(data.agency_id);

        // Fill Donor Name (set the donor ID as the selected value)
        $('[name="donor_name"]').val(data.donor_name);

        // Fill Application ID (set the application ID as the selected value)
        $('[name="application_id"]').val(data.application_id);

        // Fill Account Name
        $('[name="account_name"]').val(data.account_name);

        // Fill Account Number
        $('[name="account_number"]').val(data.account_number);

        // Fill IFSC Code
        $('[name="ifsc_code"]').val(data.ifsc_code);

        // Fill Bank Branch
        $('[name="bank_branch"]').val(data.bank_branch);

        // Fill Bank Name
        $('[name="bank_name"]').val(data.bank_name);

        // Fill Cluster Name (set the cluster as the selected value)
        $('[name="cluster_name"]').val(data.cluster_name);

        // Show the modal
        $('#EditexampleModal').modal('show');
    }).fail(function() {
        alert('Error fetching project data.');
    });
});

$(document).ready(function() {
    $('#EditprojectForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        let formData = $(this).serializeArray();

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.updateodfProject') }}",
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
                    $('#EditexampleModal').modal('hide');
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




//delete project 

$(document).on('click', '.delete', function() {
    const projectId = $(this).data('id');
    const userName = $(this).data('pro'); // Assuming you have the username data attribute

    // Set the user name and message in the modal
    $('#modalmarkUserName').text(userName);
    $('#modalMessage').text('Are you sure you want to delete this project?');

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
            url: `{{ url('/admin/projects/odf/delete') }}/${projectId}`,
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
                $('#projectTable').DataTable().ajax.reload();
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



 // Event listener for showing the modal
 $('#fundTable').on('click', '.fund', function() {
        var projectId = $(this).data('id'); // Get the project id
        console.log('Fund button clicked for project ID: ' + projectId);
        $('[name="id"]').val(projectId);
        // Here you can make an AJAX request to fetch additional information for the modal
        $.ajax({
            url: `{{ url('/admin/project/odf/fund/view') }}`,  // Adjust this URL as needed
            type: 'GET',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: projectId
            },
            success: function(response) {
                // Assuming the response contains the HTML content for the modal
                $('#fundContent').html(response.html); // Dynamically update the modal content
                $('#fundModal').modal('show'); // Show the modal
            },
            error: function(xhr, status, error) {
               // $('#fundContent').html('An error occurred while loading the data.');
            }
        });
    });

    
    $('#fundForm').on('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    var formData = new FormData(this); // Get form data

    $.ajax({
        url: `{{ url("/admin/project/odf/fund/new") }}`,  // The URL where the form data will be submitted
        type: 'POST',
        data: formData,
        processData: false, // Important: Do not process data
        contentType: false, // Important: Do not set content type
        success: function(response) {
            // Handle the response after successful form submission
            if (response.success) {
                // Show success notification with iZiToast
                iziToast.success({
                    title: 'Success',
                    message: 'Fund added successfully!',
                    position: 'topRight',  // You can adjust the position
                    timeout: 5000  // Toast will disappear after 5 seconds
                });

                // Close modal and reset form
                $('#fundModal').modal('hide');
                $('#fundForm')[0].reset();
                $('#fundTable').DataTable().ajax.reload();
                localStorage.setItem('activeTab', '#tab-specs');
            } else {
                // Show error notification with iZiToast
                iziToast.error({
                    title: 'Error',
                    message: response.message,
                    position: 'topRight',  // You can adjust the position
                    timeout: 5000  // Toast will disappear after 5 seconds
                });
            }
        },
        error: function(xhr, status, error) {
            // Show error notification with iZiToast
            iziToast.error({
                title: 'Error',
                message: 'An error occurred while processing the request.',
                position: 'topRight',
                timeout: 5000
            });
        }
    });
});

   

//mark completion request 

$(document).on('click', '.mark', function() {
    const projectId = $(this).data('id');
    const userName = $(this).data('pro'); // Assuming you have the username data attribute

    // Set the user name and message in the modal
    $('#modalmarkUserName').text(userName);
    $('#modalmarkMessage').text('Are you sure you want to mark this project as completed?');

    // Show the modal
    $('#markConfirmationModal').modal('show');
     $('.close').on('click', function()
    {
        $('#markConfirmationModal').modal('hide');
    });

    $('.cancel').on('click', function()
    {
        $('#markConfirmationModal').modal('hide');
    });

    // Handle confirmation
    $('#mark').off('click').on('click', function() {
        $.ajax({
            url: `{{ url('/admin/project/odf/status/update') }}/${projectId}`,
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
                $('#projectTable').DataTable().ajax.reload();
                localStorage.setItem('activeTab', '#tab-highlights');
                $('#markConfirmationModal').modal('hide'); // Hide the modal on success
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
@extends('layouts.master')
@section('css')
<!-- DataTables -->
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection
@section('content')
<div class="row mt-3">
    <div class="float-end d-none d-md-block">
        <button type="button" class="btn btn-success mb-2 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-folder-plus fs-4"></i>
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header box">
                        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add Project</h1>
                        <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form id="projectForm" method="POST">
                         @csrf
                            <div class="mb-3">
                                <label for="projectNo" class="form-label">Agency Project No.</label>
                                <input type="text" class="form-control" id="projectNo" name="agencyProjectNo">
                                <span class="error text-danger" id="agencyProjectNo-error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="donorName" class="form-label">Donor Name</label>
                                <select class="form-select" id="donorName" name="donorName">
                                    <option value="" disabled selected>Select a donor</option>
                                    @foreach($donor as $donors)
                                    <option value="{{ $donors->donor_id }}">{{ $donors->partner_name }}</option>
                                    @endforeach
                                </select>
                                <span class="error text-danger" id="donorName-error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="projectManager" class="form-label">Project Manager</label>
                                <select class="form-select" id="projectManager" name="projectManager">
                                    <option value="" disabled selected>Select a manager</option>
                                    @foreach($projectmanager as $pro)
                                    <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                    @endforeach
                                </select>
                                <span class="error text-danger" id="projectManager-error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="availableBudget" class="form-label">Available Budget</label>
                                <input type="text" class="form-control" id="availableBudget" name="availableBudget">
                                <span class="error text-danger" id="availableBudget-error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="projectType" class="form-label">Type of Project</label>
                                <select class="form-select" id="projectType" name="typeOfProject">
                                    <option value="" disabled selected>Select Project type</option>
                                    <option value="Markaz Open Care">Markaz Open Care</option>
                                    <option value="Education Centre">Education Centre</option>
                                    <option value="Cultural Centre">Cultural Centre</option>
                                    <option value="Sweet Water">Sweet Water</option>
                                </select>
                                <span class="error text-danger" id="typeOfProject-error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="remarks" class="form-label">Remarks</label>
                                <textarea class="form-control" id="remarks" rows="3" name="remarks"></textarea>
                                <span class="error text-danger" id="remarks-error"></span>
                            </div>
                            <div class="row">
                                <div class="col-5"></div>
                                <div class="col-6">

                                    <button type="submit" class="btn btn-success submit-project">Submit</button>
                      
                                </div>
                            </div>  </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Project Details Modal -->
   <div class="modal fade" id="ProjectDetailsModal" tabindex="-1" aria-labelledby="ProjectDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box">
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
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="EditexampleModalLabel">Edit Project</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="EditprojectForm" method="POST">
                    @csrf
                    <input type="text" name="proId" id="editProjectId"> <!-- Hidden field for project ID -->
                    <div class="mb-3">
                        <label for="editAgencyProjectNo" class="form-label">Agency Project No.</label>
                        <input type="text" class="form-control" name="agencyProjectNo" id="editAgencyProjectNo">
                        <span class="error text-danger" id="agencyProjectNo-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="editDonorName" class="form-label">Donor Name</label>
                        <select class="form-select" name="donorName" id="editDonorName">
                            <option value="">Select a donor</option>
                            @foreach($donor as $donors)
                            <option value="{{ $donors->donor_id }}">{{ $donors->partner_name }}</option>
                            @endforeach
                        </select>
                        <span class="error text-danger" id="donorName-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="editProjectManager" class="form-label">Project Manager</label>
                        <select class="form-select" name="projectManager" id="editProjectManager">
                            <option value="">Select a manager</option>
                            @foreach($projectmanager as $pro)
                            <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                            @endforeach
                        </select>
                        <span class="error text-danger" id="projectManager-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="editAvailableBudget" class="form-label">Available Budget</label>
                        <input type="text" class="form-control" name="availableBudget" id="editAvailableBudget">
                        <span class="error text-danger" id="availableBudget-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="editProjectType" class="form-label">Type of Project</label>
                        <select class="form-select" name="typeOfProject" id="editProjectType">
                            <option value="" disabled selected>Select Project type</option>
                            <option value="Markaz Open Care">Markaz Open Care</option>
                            <option value="Education Centre">Education Centre</option>
                            <option value="Cultural Centre">Cultural Centre</option>
                            <option value="Sweet Water">Sweet Water</option>
                        </select>
                        <span class="error text-danger" id="typeOfProject-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="editRemarks" class="form-label">Remarks</label>
                        <textarea class="form-control" name="remarks" id="editRemarks" rows="3"></textarea>
                        <span class="error text-danger" id="remarks-error"></span>
                    </div>
                    <div class="row">
                        <div class="col-5"></div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-success">Submit</button>
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
                <p>Agency Project Number: <span id="modalUserName"></span></p>
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
    
                        <h4 class="but p-3 text-center rounded fw-bold border border-success" style="color:white;">PROJECT LIST</h4>
            
                    </div>
                </div>
            </div>
    
            <div class="card-body">
    
    <table id="projectTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Project ID</th>
                <th>Agency Project No</th>
                <th>Donor Name</th>
                <th>Project Manager</th>
                <th>Available Budget</th>
                <th>Type of Project</th>
                <th>Remarks</th>
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

$(document).ready(function() {
    $('#projectTable').DataTable({
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
                    title: 'Projects',
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
                ['10 Projects', '25 Projects', '50 Projects', 'All Projects']
            ],
            ajax: {
                url: `{{ url('/admin/projects/datatable') }}`,
                type: 'GET',
                dataSrc: 'data',
                
            },
            "columns": [
                {
                data: null,
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return meta.row + 1; // Serial number starts from 1
                }
                },
            { data: 'projectID' },
            { data: 'agencyProjectNo' },
            { data: 'donorName' },
            { data: 'projectManager' },
            { data: 'availableBudget' },
            { data: 'typeOfProject' },  
            { data: 'remarks' },            
            {
    data: null,
    name: 'action',
    orderable: false,
    searchable: false,
    render: function(data, type, row, meta) {
        return `
            <div class="dd d-flex">
                <button class="btn btn-primary btn-sm view-more me-1" data-id="${row.proId}">
                    <i class="bi bi-three-dots"></i>
                </button>
                <button class="btn btn-warning btn-sm edit me-1" data-id="${row.proId}">
                    <i class="bi bi-pencil"></i>
                </button>
                <button class="btn btn-danger btn-sm delete" data-id="${row.proId}" data-pro="${row.agencyProjectNo}">
                    <i class="bi bi-trash"></i>
                </button>  
                <a href="{{ url('/admin/project/details/view') }}/${row.proId}" class="btn btn-dark btn-sm ms-1">
                    <i class="bi bi-eye"></i>
                </a>
             
            </div>
        `;
    }
}
        
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
            url: `{{ url('/admin/projects/new') }}`,
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
        $.get(`{{ url('/admin/projects/view/more') }}/${ProjectId}`, function(response) {
            console.log('Response data:', response);

            // Directly use response since the data is not wrapped in a "data" property
            const data = response; // Changed this line

            // Define the list of required keys
            const requiredKeys = [
                 'agencyProjectNo', 'donorName', 'projectManager', 'availableBudget',
                'typeOfProject', 'remarks'
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

                // Add a new column for every 2 key-value pairs
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
   
    $.get(`{{ url('/admin/projects/edit') }}/${projectId}`, function(data) {
        // Fill the form with data
        $('#editProjectId').val(data.proId);
        $('#editAgencyProjectNo').val(data.agencyProjectNo);
        $('#editAvailableBudget').val(data.availableBudget);
        $('#editProjectType').val(data.typeOfProject);
        $('#editRemarks').val(data.remarks);

        // Set the selected value for donorName
        $('#editDonorName').val(data.donorName); // This should match donor ID

        // Set the selected value for projectManager
        $('#editProjectManager').val(data.projectManager); // This should match project manager ID

        // Show the modal
        $('#EditexampleModal').modal('show');
    }).fail(function() {
        alert('Error fetching project data.');
    });
});


//update project 
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
            url: "{{ route('admin.updateProject') }}",
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
    $('#modalUserName').text(userName);
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
            url: `{{ url('/admin/projects/delete') }}/${projectId}`,
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

</script>
@endpush
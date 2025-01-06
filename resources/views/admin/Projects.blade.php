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
<div class="row mt-4">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat text-white widgetcolor1">
            <div class="card-body widgetcolor1">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
 
                        <i class="bi bi-buildings-fill fa-2x"></i>
                    </div>
                    <h5 class="fs-6 text-white">CONSTRUCTION PROJECT</h5>
                    <h4 class="fw-medium font-size-24">6</h4>
                
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('admin.getProConstruction') }}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body widgetcolor1">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">   
                        <i class="bi bi-droplet-half fs-2"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Sweet Water Project</h5>
                    <h4 class="fw-medium font-size-24">{{ $sweetCount }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('admin.sweet')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat text-white widgetcolor1">
            <div class="card-body widgetcolor1">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">
                        <i class="fa fa-handshake-o fa-2x" aria-hidden="true"></i>
                    </div>
                    <h5 class="fs-6 text-white">ORPHAN CARE</h5>
                    <h4 class="fw-medium font-size-24">{{ $markazCount }}</h4>
                
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('admin.orphancare')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body widgetcolor1">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">   
                     
                        <i class="bi bi-person-wheelchair fs-2"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Differently Abled</h5>
                    <h4 class="fw-medium font-size-24">{{ $diffCount }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('admin.diffabled')}} " class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body widgetcolor1">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">   
                        <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">Family aid</h5>
                    <h4 class="fw-medium font-size-24">{{ $famCount }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('admin.familyaid') }}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary text-white">
            <div class="card-body widgetcolor1">
                <div class="mb-4">
                    <div class="float-start mini-stat-img me-4">   
                        <i class="bi bi-file-earmark-ruled-fill fs-2"></i>
                    </div>
                    <h5 class="fs-6 text-uppercase text-white">General Project</h5>
                    <h4 class="fw-medium font-size-24">{{ $general }}</h4>
                    
                </div>
                <div class="pt-2">
                    <div class="float-end">
                        <a href="{{ route('admin.general')}}" class="text-white"><i class="mdi mdi-arrow-right h5"></i></a>
                    </div>

                    <p class="text-white-50 mb-0 mt-1">View Applications</p>
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
    $('#projectTable').DataTable({
        select: true,
        serverSide: false, // Set this to true if you’re using server-side processing
        dom: 'Bfrtlip',
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
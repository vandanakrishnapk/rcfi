@extends('layouts.master')
@section('content')
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
@endsection



@section('content')
<div class="row mt-3">
    <div class="col-12">

        <div class="float-end d-none d-md-block">
            <button type="button" class="btn btn-success mb-1 me-3 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#employeeModal">
                <i class="bi bi-person-plus-fill fs-5"></i>
            </button>
        </div>
    </div>
</div>

<div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="familyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Create New Employee</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
       <div class="modal-body p-4 familyModalBody">
       
        <form action="/submit-leave" method="POST">
            <!-- Leave Duration (Start Date & End Date) -->
            <div class="mb-3">
                <label for="leave_duration_start" class="form-label">Leave Duration (Start Date)</label>
                <input type="date" id="leave_duration_start" name="leave_duration_start" class="form-control" required>
                <span class="text-danger" id="leave_duration_start-error"></span>
            </div>
    
            <div class="mb-3">
                <label for="leave_duration_end" class="form-label">Leave Duration (End Date)</label>
                <input type="date" id="leave_duration_end" name="leave_duration_end" class="form-control" required>
                <span class="text-danger" id="leave_duration_end-error"></span>
            </div>
    
            <!-- Type of Leave -->
            <div class="mb-3">
                <label for="leave_type" class="form-label">Type of Leave</label>
                <select id="leave_type" name="leave_type" class="form-select" required>
                    <option value="">Select Leave Type</option>
                    <option value="sick">Sick Leave</option>
                    <option value="vacation">Vacation Leave</option>
                    <option value="casual">Casual Leave</option>
                    <option value="maternity">Maternity Leave</option>
                    <option value="paternity">Paternity Leave</option>
                    <option value="bereavement">Bereavement Leave</option>
                    <option value="unpaid">Unpaid Leave</option>
                </select>
                <span class="text-danger" id="leave_type-error"></span>
            </div>
    
            <!-- Remarks (Text Area) -->
            <div class="mb-3">
                <label for="remarks" class="form-label">Remarks (Optional)</label>
                <textarea id="remarks" name="remarks" class="form-control" rows="4" placeholder="Additional comments (Optional)"></textarea>
                <span class="text-danger" id="remarks-error"></span>
            </div>
    
            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-success float-end">Submit Leave Request</button>
            </div>
        </form>
        

       </div>
        </div>
    </div>
</div>


<!--leave allocation-->
<div class="modal fade" id="leaveAllocateModal" tabindex="-1" aria-labelledby="familyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Leave Allocation</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
       <div class="modal-body p-4 familyModalBody">
       
        <form id="leaveAllocationForm" method="POST">
            @csrf  <!-- CSRF token for Laravel -->
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="employee_id">Employee ID</label>
                        <select name="employeeId" id="empId" class="form-select">
                            <option value="">Select Employee ID</option>
                        @foreach($emps as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="employee_name">Employee Name</label>
                        <input type="text" name="employee_name" class="form-control" id="employee_name" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="leave_type">Leave Type</label>
                        <select name="leave_type" class="form-select" id="leave_type">
                            <option value="">Select Leave Type</option>
                            @foreach($leaves as $leave)
                            <option value="{{ $leave->leavetypeId }}">{{ $leave->leave_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="leave_days">Leave Days</label>
                        <input type="number" name="leave_days" class="form-control" id="leave_days" min="1" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Allocate Leave</button>
                </div>
            </div>
        </form>

       </div>
        </div>
    </div>
</div> 

   <!-- User Details Modal -->
   <div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="userDetailsModalLabel">User Details</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="userDetails">
                <!-- User details will be loaded here -->
            </div>
        </div>
    </div>
</div>
<!-- Modal HTML -->
<div class="modal fade" id="editDetailsModal" tabindex="-1" aria-labelledby="editDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="editDetailsModalLabel">Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="editDetails">
                <!-- Form will be injected here -->
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



   <!--data table -->
   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                  
                    <div class="col-12">
    
                        <h4 class="widgetcolor p-3 text-center rounded fw-bold border border-success" style="color:white;">Employee Details</h4>
            
                    </div>
                </div>
            </div>
    
            <div class="card-body">
    
    <table id="empTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Position</th>
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


@endsection







@push('scripts')
<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
 <!-- Peity chart-->
 <script src="{{ asset('assets/libs/peity/peity.min.js') }}"></script>

 <!-- Plugin Js-->
 <script src="{{ asset('assets/libs/chartist/chartist.min.js') }}"></script>
 <script src="{{ asset('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltips.min.js') }}"></script>


<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script> 

<script>
    $(document).ready(function() {
    
    $('#empTable').DataTable({
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
                ['10 employees', '25 employees', '50 employees', 'All employees']
            ],
            ajax: {
                'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: `{{ url('/admin/hr/module/employee') }}`,
                type: 'POST',
                dataSrc: 'data',
                
            },
            "columns": [
            { data: 'name' },
            { data: 'email' },
            { data: 'mobile' },
            { data: 'designation' },                  
            {
    data: null,
    name: 'action',
    orderable: false,
    searchable: false,
    render: function(data, type, row, meta) {
        return `
            <div class="dd d-flex">
                <button class="btn btn-primary btn-sm more-user me-1" data-id="${row.id}" title="view more">
                    <i class="bi bi-three-dots"></i>
                </button>
                <button class="btn btn-warning btn-sm edit-user me-1" data-id="${row.id}" title="Edit">
                    <i class="bi bi-pencil"></i>
                </button>
                <button class="btn btn-danger btn-sm delete-user" data-id="${row.id}" data-pro="${row.name}" title="Delete">
                    <i class="bi bi-trash"></i>
                </button>   

            </div>
        `;
    }
}
        
                ]
            });
        });

    $(document).ready(function() {
        $('#employeeForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = $(this).serialize(); // Serialize the form data

            // Clear previous error messages
            $('.text-danger').text('');

            $.ajax({
                url: `{{ url('/admin/hr/module/employee/new') }}`, // Correct route
                type: 'POST',
                data: formData,
                success: function(response) {
                    iziToast.success({
                        title: 'Success!',
                        message: response.message,
                        position: 'topRight',
                    });
                    $('#employeeModal').hide();
                    $('#empTable').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    // Loop through errors and display in respective input fields
                    for (var key in errors) {
                        $('#' + key + '-error').text(errors[key][0]); // Display the first error
                    }
                    iziToast.error({
                        title: 'Error!',
                        message: 'Please fix the errors and try again.',
                        position: 'topRight',
                    });
                }
            });
        });
    }); 
    $(document).ready(function() {
        // When employee_id is changed, fetch employee details
        $('#empId').on('change', function() {
            var employeeId = $(this).val(); // Get selected employee ID
            if (employeeId) {
                // Make an AJAX request to get employee details
                $.ajax({
                    url: `{{ url('/admin/hr/module/employee/name')}}/${employeeId}`, // Your route here
                    type: 'GET',
                    success: function(response) {
                        // On success, populate the employee name field
                        console.log('success');
                        $('#employee_name').val(response.employee_name);
                    },
                    error: function(xhr) {
                        alert('Error fetching employee data.');
                    }
                });
            } else {
                // If no employee is selected, clear the employee name field
                $('#employee_name').val('');
            }
        });
    }); 

    $(document).ready(function() {
        // Handle form submission using AJAX
        $('#leaveAllocationForm').on('submit', function(e) {
            e.preventDefault();  // Prevent default form submission

            var formData = $(this).serialize();  // Serialize form data

            // Send AJAX request to the server
            $.ajax({
                url: `{{ url('/admin/hr/module/leave/allocate') }}`,  // Your Laravel route for leave allocation
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Success response - Display success message using iziToast
                    iziToast.success({
                        title: 'Success',
                        message: 'Leave allocated successfully!',
                        position: 'topRight', // Position of the toast
                        timeout: 3000 // Time before the toast disappears (in ms)
                    });
                    $('#leaveAllocateModal').hide();
                    $('#empTable').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        // Display validation errors using iziToast
                        var errorMessage = Object.values(errors).join(', ');
                        iziToast.error({
                            title: 'Error',
                            message: errorMessage,
                            position: 'topRight', // Position of the toast
                            timeout: 5000 // Time before the toast disappears (in ms)
                        });
                      
                    } else {
                        // Display generic error message
                        iziToast.error({
                            title: 'Error',
                            message: 'An unexpected error occurred.',
                            position: 'topRight', // Position of the toast
                            timeout: 5000 // Time before the toast disappears (in ms)
                        });
                    }
                }
            });
        });
    });  

    $(document).on('click', '.more-user', function() {
        const userId = $(this).data('id');
        console.log('Clicked user ID:', userId);

        if (userId !== undefined) {
            $.get(`{{ url('/admin/users') }}/${userId}`, function(data) {
                console.log('Response data:', data);

                if (data && data.name && data.email && data.mobile && data.designation) {
                    let userDetails = `
                        <p><strong>Name:</strong> ${data.name}</p>
                        <p><strong>Email:</strong> ${data.email}</p>
                        <p><strong>Mobile:</strong> ${data.mobile}</p>
                        <p><strong>Designation:</strong> ${data.designation}</p>
                    `;
                    $('#userDetails').html(userDetails);
                    $('#userDetailsModal').modal('show');
                } else {
                    $('#userDetails').html('<p>No user details available.</p>');
                    $('#userDetailsModal').modal('show');
                }
            }).fail(function() {
                alert('Error retrieving user details.');
            });
        } else {
            console.error('User ID is undefined.');
        }
    });


$(document).on('click', '.edit-user', function() {
    const userId = $(this).data('id');
    console.log(userId)
    $.get(`{{ url('/admin/users/${userId}/edit')}}`, function(data) {
       
        const formHtml = `
            <form id="editUserForm" data-id="${data.id}">
            @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="${data.name}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="${data.email}">
                </div>
                 <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="${data.mobile}">
                </div>
                 <div class="mb-3">
                    <label for="designation" class="form-label">designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="${data.designation}">
                </div>
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">

                <button type="submit" class="btn but">Save changes</button>
           
            </div>
        </div>
         </form>
        `;
        
        // Inject the form HTML into the modal
        $('#editDetails').html(formHtml);

        // Show the modal
        $('#editDetailsModal').modal('show');
    });
});  
//update user
$(document).on('submit', '#editUserForm', function(event) {
    event.preventDefault();    
    const userId = $(this).data('id');
    const formData = $(this).serialize();
    const url = `{{ url('/admin/users') }}/${userId}`; // Ensure this URL is correct

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        dataType: "json",
        success: function(response) {
             if (response.status === 0) {
                $.each(response.error, function(key, value) {
                    $('#' + key + '_error').text(value);
                });
                iziToast.error({
                    title: 'Validation Error',
                    message: 'Please fix the errors and try again.',
                    position: 'topRight'
                });
            } else if (response.status === 1) {
                iziToast.success({
                    title: 'Success',
                    message: response.message,
                    position: 'topRight'
                });
                $('#editUserForm')[0].reset();
                $('#editDetailsModal').modal('hide');
                $('#empTable').DataTable().ajax.reload();
            } else {
                iziToast.error({
                    title: 'Error',
                    message: 'Unexpected response format.',
                    position: 'topRight'
                });
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            iziToast.error({
                title: 'Error',
                message: 'Something went wrong!',
                position: 'topRight',
            
            });
        }
    });
});


    
//delete user  

$(document).on('click', '.delete-user', function() {
    const userId = $(this).data('id');
    const userName = $(this).data('name'); // Assuming you have the username data attribute
    // Set the user name and message in the modal
    $('#modalUserName').text(userName);
    $('#modalMessage').text('Are you sure you want to delete this user?');

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
            url: `{{ url('/admin/users') }}/${userId}`,
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
                $('#empTable').DataTable().ajax.reload();
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

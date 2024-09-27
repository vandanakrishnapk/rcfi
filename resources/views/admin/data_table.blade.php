@extends('layouts.master')
@section('title') Data tables @endsection
@section('css')
<link href="{{ asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/libs/chartist/chartist.min.css')}}" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection
@section('body') <body data-sidebar="light"> @endsection
@section('content')
@component('components.breadcrumb')
@slot('page_title') Data tables @endslot
@slot('subtitle') Tables @endslot
@endcomponent
<div class="row">
    <div class="float-end d-none d-md-block">
        <button type="button" class="btn btn-success mb-2 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-person-plus-fill fs-5"></i>
        </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header box">
                                <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">User Registration</h1>
                                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <form id="submitApplication">
                                    @csrf 
                                    <div id="formErrors" class="alert alert-danger d-none"></div> <!-- Error container -->
                                    
                                    <br><label for="name">Name</label>
                                    <input type="text" name="name" id="name" placeholder="name" class="form-control">
                                    <span class="error name_error text-danger"></span>
                                    
                                    <br><label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="email" class="form-control">
                                    <span class="error email_error text-danger"></span>
                                    
                                    <br><label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" placeholder="mobile" class="form-control">
                                    <span class="error mobile_error text-danger"></span>
                                    
                                    <br><label for="designation">Designation</label>
                                    <select name="designation" class="form-select">
                                        <option value="">Select Designation</option>
                                        <option value="Admin">Admin</option>
                                        <option value="COO">COO</option>
                                        <option value="Project Manager">Project Manager</option>
                                        <option value="Project Executive">Project Executive</option>
                                    </select>
                                    <span class="error designation_error text-danger"></span>
                                    
                                    <br><label for="password">Password</label>
                                    <input type="password" name="password" id="password" placeholder="password" class="form-control">
                                    <span class="error password_error text-danger"></span>
                                    
                                   

                                    <br>
                                    <div class="modal-footer">        
                                        <button type="submit" class="box btn submit-application">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
           
                    <div class="col-12">

                        <h4 class="but p-3 rounded fw-bold border border-success text-center" style="color:white;">USERS </h4>
            
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="usersTable" class="table table-bordered dt-responsive nowrap display" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>designation</th>
                            <th>Action</th>
                          
                        </tr>
                        
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>                      
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
 <!-- Peity chart-->
 <script src="{{ asset('assets/libs/peity/peity.min.js') }}"></script>

 <!-- Plugin Js-->
 <script src="{{ asset('assets/libs/chartist/chartist.min.js') }}"></script>
 <script src="{{ asset('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltips.min.js') }}"></script>


<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>

<script>
   $(document).ready(function() {
    $('#usersTable').DataTable({
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
                    title: 'Users List',
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
                ['10 Users', '25 Users', '50 Users', 'All Users']
            ],
        ajax: {
            url: "{{ route('users.data') }}",
            type: 'GET',
            dataSrc: 'data'
        },
        columns: [
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return meta.row + 1; // Serial number starts from 1
                }
            },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'mobile', name: 'mobile' },
            { data: 'designation', name: 'designation' },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return `
                        <button class="btn btn-secondary btn-sm more-user" data-id="${row.id}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <button class="btn btn-info btn-sm edit-user" data-id="${row.id}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-user" data-id="${row.id}" data-name=${row.name}>
                            <i class="bi bi-trash"></i>
                        </button>
                    `;
                }
            }
        ]
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
        
                <button type="submit" class="btn btn-primary">Save changes</button>
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
                $('#SweetWaterTable').DataTable().ajax.reload();
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
@endsection
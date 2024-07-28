@extends('layouts.master')
@section('title') Data tables @endsection
@section('css')
<link href="{{ asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('style.css') }}">
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
                <button type="button" class="btn box text-light mb-2 float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add user
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header box">
                                <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">User Registration</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <input type="text" name="designation" id="designation" placeholder="designation" class="form-control">
                                    <span class="error designation_error text-danger"></span>
                                    
                                    <br><label for="password">Password</label>
                                    <input type="password" name="password" id="password" placeholder="password" class="form-control">
                                    <span class="error password_error text-danger"></span>
                                    
                                    <br>
                                    <div class="modal-footer">        
                                        <button type="submit" class="box btn text-light submit-application">Register</button>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="userDetails">
                <!-- User details will be loaded here -->
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="usersTable" class="table table-bordered dt-responsive nowrap display" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
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
<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>

<script>
   $(document).ready(function() {
    $('#usersTable').DataTable({
        processing: true,
        serverSide: true,
        destroy:true,
        ajax: {
            url: "{{ route('users.data') }}",
            type: 'GET',
            dataSrc: 'data'
        },
        columns: [
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
                        <button class="btn btn-danger btn-sm delete-user" data-id="${row.id}">
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
            $.get(`{{ url('/users') }}/${userId}`, function(data) {
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

//   $(document).on('click', '.edit-user', function() {
//       const userId = $(this).data('id');
//       $.get(`{{ url('/users') }}/${userId}/edit`, function(data) {
//           // Populate a form with user data for editing
//           console.log(data);
//       });
//   });

//   $(document).on('click', '.delete-user', function() {
//       const userId = $(this).data('id');
//       if(confirm('Are you sure you want to delete this user?')) {
//           $.ajax({
//               url: `{{ url('/users') }}/${userId}`,
//               type: 'DELETE',
//               data: {
//                   _token: '{{ csrf_token() }}'
//               },
//               success: function(response) {
//                   alert(response.success);
//                   $('#usersTable').DataTable().ajax.reload();
//               }
//           });
//       }
//   });
 </script>
@endsection

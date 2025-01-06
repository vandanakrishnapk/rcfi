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
       
        <form id="employeeForm" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="name">Employee Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                        <span class="text-danger" id="name-error"></span> <!-- For displaying validation errors -->
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email">
                        <span class="text-danger" id="email-error"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile" class="form-control" id="mobile">
                        <span class="text-danger" id="mobile-error"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="position">Position</label>
                        <input type="text" name="position" class="form-control" id="position">
                        <span class="text-danger" id="position-error"></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                        <span class="text-danger" id="password-error"></span>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-5"></div>
                <div class="col-4">
                    <button type="submit" class="btn but">Submit</button>
                </div>
            </div>
        </form>
        

       </div>
        </div>
    </div>
</div>



<div class="modal fade" id="leaveAllocateModal" tabindex="-1" aria-labelledby="familyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Create New Employee</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
       <div class="modal-body p-4 familyModalBody">
       
        <form id="leaveAllocationForm" method="POST">
            @csrf  <!-- CSRF token for Laravel -->
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="employee_id">Employee ID</label>
                        <input type="text" name="employee_id" class="form-control" id="employee_id" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="employee_name">Employee Name</label>
                        <input type="text" name="employee_name" class="form-control" id="employee_name" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="leave_type">Leave Type</label>
                        <select name="leave_type" class="form-control" id="leave_type" required>
                            <option value="annual">Annual Leave</option>
                            <option value="sick">Sick Leave</option>
                            <option value="casual">Casual Leave</option>
                            <option value="maternity">Maternity Leave</option>
                            <option value="paternity">Paternity Leave</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="leave_days">Leave Days</label>
                        <input type="number" name="leave_days" class="form-control" id="leave_days" min="1" required>
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
</script>
@endpush

@extends('emplayout.master')

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
@section('body') <body data-sidebar="light"> @endsection
@section('content')

<div class="row mt-3">
    <div class="col-12">

        <div class="float-end d-none d-md-block">
            <button type="button" class="btn btn-success mb-1 me-3 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#leaveModal">
                <i class="bi bi-person-plus-fill fs-5"></i>
            </button>
        </div>
    </div>
</div>
<div class="modal fade" id="leaveModal" tabindex="-1" aria-labelledby="leaveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="leaveModalLabel">Application for Leave</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 familyModalBody">
                <!-- Leave Request Form -->
                <form id="leaveForm">
                    @csrf
                    <!-- Leave Start Date -->
                    <div class="form-group">
                        <label for="leave_duration_start">Leave Start Date:</label>
                        <input type="date" name="leave_duration_start" id="leave_duration_start" class="form-control" >
                        <span id="leave_duration_start-error" class="text-danger"></span> <!-- Error message -->
                    </div>

                    <!-- Leave End Date -->
                    <div class="form-group">
                        <label for="leave_duration_end">Leave End Date:</label>
                        <input type="date" name="leave_duration_end" id="leave_duration_end" class="form-control" >
                        <span id="leave_duration_end-error" class="text-danger"></span> <!-- Error message -->
                    </div>

                    <!-- Leave Type -->
                    <div class="form-group">
                        <label for="leave_type_id">Leave Type:</label>
                        <select name="leave_type_id" id="leave_type_id" class="form-control" >
                            <option value="">Select Leave Type</option>
                            @foreach($leavetypes as $leavetype)
                                <option value="{{ $leavetype->leavetypeId }}">{{ $leavetype->leave_name }}</option>
                            @endforeach
                        </select>
                        <span id="leave_type_id-error" class="text-danger"></span> <!-- Error message -->
                    </div>

                    <!-- Remarks (Optional) -->
                    <div class="form-group">
                        <label for="remarks">Remarks (Optional):</label>
                        <textarea name="remarks" id="remarks" class="form-control"></textarea>
                        <span id="remarks-error" class="text-danger"></span> <!-- Error message -->
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit Leave Request</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header"><h3>Profile Information</h3></div>
            <div class="card-body">
                <!-- Profile Information Section -->
                <div class="form-group row">
                    <label for="name" class="col-4 col-form-label"><strong>Name</strong></label>
                    <div class="col-8">
                        <!-- Display user's name -->
                        <p class="form-control-plaintext" id="name">{{ $employee->name }}</p>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="name" class="col-4 col-form-label"><strong>Email</strong></label>
                    <div class="col-8">
                        <!-- Display user's name -->
                        <p class="form-control-plaintext" id="name">{{ $employee->email }}</p>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="name" class="col-4 col-form-label"><strong>Mobile</strong></label>
                    <div class="col-8">
                        <!-- Display user's name -->
                        <p class="form-control-plaintext" id="name">{{ $employee->mobile }}</p>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="name" class="col-4 col-form-label"><strong>Designation</strong></label>
                    <div class="col-8">
                        <!-- Display user's name -->
                        <p class="form-control-plaintext" id="name">{{ $employee->designation }}</p>
                    </div>
                </div><br>

                <!-- Leave Taken Section -->
                <div class="card-header"><h3>Leave Taken</h3></div>


                <!-- Leave Taken Table -->
                <div class="form-group row">
                     <div class="col-8">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Leave Type</th>
                                    <th>Leave Taken (Days)</th>
                                    <th>From</th>
                                    <th>To</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaveApplications as $leave)
                                    <tr>
                                        <td>{{ $leave->leave_name }}</td>
                                        <td>{{ $leave->leave_days }} days</td>
                                        <td>{{ \Carbon\Carbon::parse($leave->leave_duration_start)->format('d M, Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($leave->leave_duration_end)->format('d M, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><br>

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
    // When the form is submitted
    $('#leaveForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting the traditional way

        var formData = $(this).serialize(); // Serialize form data

        // Clear any previous error messages
        $('.text-danger').text('');

        // AJAX request to submit the form
        $.ajax({
            url: `{{ url('/employee/leave/request/new') }}`, // Ensure this URL is correct
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            success: function(response) {
                // Success callback
                iziToast.success({
                    title: 'Success!',
                    message: response.message, // Message from the controller
                    position: 'topRight',
                });
                $('#leaveModal').hide(); // Hide the modal after successful submission
                // Optionally reload DataTable or update the UI if needed
                // $('#empTable').DataTable().ajax.reload();  // Uncomment this line if needed
            },
            error: function(xhr) {
                // Error callback
                if (xhr.status === 422) { // Validation errors from Laravel
                    var errors = xhr.responseJSON.errors;
                    for (var key in errors) {
                        $('#' + key + '-error').text(errors[key][0]); // Display the first error
                    }
                    iziToast.error({
                        title: 'Error!',
                        message: 'Please fix the errors and try again.',
                        position: 'topRight',
                    });
                } else {
                    // General error handler (if the error is not related to validation)
                    iziToast.error({
                        title: 'Error!',
                        message: xhr.responseJSON.message || 'An unexpected error occurred. Please try again.',
                        position: 'topRight',
                    });
                }
            }
        });
    });
});

  </script>
@endpush

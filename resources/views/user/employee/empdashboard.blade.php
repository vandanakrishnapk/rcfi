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

<div class="modal fade" id="leaveModal" tabindex="-1" aria-labelledby="familyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="MarkazOrphanCareModalLabel">Application for Leave</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
       <div class="modal-body p-4 familyModalBody">
       
        <form id="leaveForm">
            @csrf
            <div class="form-group">
                <label for="leave_duration_start">Leave Start Date:</label>
                <input type="date" name="leave_duration_start" id="leave_duration_start" class="form-control">
                <span id="leave_duration_start-error" class="text-danger"></span> <!-- Error message -->
            </div>
        
            <div class="form-group">
                <label for="leave_duration_end">Leave End Date:</label>
                <input type="date" name="leave_duration_end" id="leave_duration_end" class="form-control">
                <span id="leave_duration_end-error" class="text-danger"></span> <!-- Error message -->
            </div>
        
            <div class="form-group">
                <label for="leave_type_id">Leave Type:</label>
                <select name="leave_type_id" id="leave_type_id" class="form-control">
                    <option value="">Select Leave Type</option>
                  @foreach($leavetypes as $leavetype)
                  <option value="{{ $leavetype->leavetypeId }}">{{ $leavetype->leave_name}}</option>
                  @endforeach
                </select>
                <span id="leave_type_id-error" class="text-danger"></span> <!-- Error message -->
            </div>
        
            <div class="form-group">
                <label for="remarks">Remarks (Optional):</label>
                <textarea name="remarks" id="remarks" class="form-control"></textarea>
                <span id="remarks-error" class="text-danger"></span> <!-- Error message -->
            </div>
        
            <button type="submit" class="btn btn-primary">Submit Leave Request</button>
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
    // When the form is submitted
    $('#leaveForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting the traditional way

        var formData = $(this).serialize(); // Serialize form data

        // Clear any previous error messages
        $('.text-danger').text('');

        // AJAX request to submit the form
        $.ajax({
            url: '{{ url('/employee/leave/request/new') }}', // Ensure this URL is correct
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            success: function(response) {
                // If success, show a success toast
                iziToast.success({
                    title: 'Success!',
                    message: response.message,
                    position: 'topRight',
                });
                $('#leaveModal').hide(); // Close the modal after submission
                // Reload DataTable (uncomment if needed)
                // $('#empTable').DataTable().ajax.reload();
            },
            error: function(xhr) {
                // If validation fails, display the errors
                var errors = xhr.responseJSON.errors;
                for (var key in errors) {
                    // Display the error message next to the respective input field
                    $('#' + key + '-error').text(errors[key][0]);
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
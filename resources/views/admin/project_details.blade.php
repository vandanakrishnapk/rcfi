@extends('layouts.master')
@section('css')
<!-- DataTables -->
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
      <ul class="nav nav-tabs d-none d-sm-flex" role="tablist">
        <!-- Highlights Tab -->
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="TabControl-Highlights" data-bs-toggle="tab" href="#tab-highlights" role="tab" tabindex="0" aria-controls="tab-highlights" aria-selected="true">
           STAGE 1
          </a>
        </li>
      
        <!-- Specs Tab -->
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="TabControl-Specs" data-bs-toggle="tab" href="#tab-specs" role="tab" tabindex="-1" aria-controls="tab-specs" aria-selected="false">
            Product Specs
          </a>
        </li>
      
        <!-- Support Tab -->
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="TabControl-Support" data-bs-toggle="tab" href="#tab-support" role="tab" tabindex="-1" aria-controls="tab-support" aria-selected="false">
            Product Support
          </a>
        </li>
      </ul>
      
      <div class="tab-content container-fluid">
        <!-- Highlights Tab Pane -->
        <div class="tab-pane fade show active" id="tab-highlights" role="tabpanel" aria-labelledby="TabControl-Highlights">
          <a href="#pdp-highlights" class="panel-title d-block d-sm-none" data-bs-toggle="collapse">
            Highlights
          </a>
          <div class="collapse show" id="pdp-highlights">
         
           <div class="card">
            <div class="card-body p-5">
             @if(Auth::user()->role === 2)
             <div class="row">
              <div class="col-12 bg-secondary mb-3">
               <p class="fs-6 text-primary p-3 mt-3">Please verify the project details once before you approve the project</p>
              </div>
             </div>
             <a href="#" id="approveButton" class="btn btn-danger" data-id="{{ $projectId->proId }}">
              Approve
          </a>
          
             @endif

              <form  id="proDet" method="POST">
                @csrf
                <input type="hidden" name="proId" value="{{ $projectId->proId }}">

              <div class="row mt-5">
                <div class="col-4">
                  <strong>Project ID</strong>
                </div>
                <div class="col-1">:</div>
                <div class="col-4 mb-4">
                  <strong>{{ $projectId->projectID }}</strong>
                </div>
                
    <div class="col-4">
      <strong>Agency Project No</strong>
  </div>
  <div class="col-1">:</div>
  <div class="col-4 mb-4">
      <strong>{{ $projectId->agencyProjectNo }}</strong>
  </div>

  <div class="col-4">
      <strong>Donor Name</strong>
  </div>
  <div class="col-1">:</div>
  <div class="col-4 mb-4">
      <strong>{{ $projectId->donorName }}</strong>
  </div>

  <div class="col-4">
      <strong>Project Manager</strong>
  </div>
  <div class="col-1">:</div>
  <div class="col-4 mb-4">
      <strong>{{ $projectId->projectManager }}</strong>
  </div>

  <div class="col-4">
      <strong>Available Budget</strong>
  </div>
  <div class="col-1">:</div>
  <div class="col-4 mb-4">
      <strong>{{ $projectId->availableBudget }}</strong>
  </div>

  <div class="col-4">
      <strong>Type of Project</strong>
  </div>
  <div class="col-1">:</div>
  <div class="col-4 mb-4">
      <strong>{{ $projectId->typeOfProject }}</strong>
  </div>

  <div class="col-4">
      <strong>Remarks</strong>
  </div>
  <div class="col-1">:</div>
  <div class="col-4 mb-4">
      <strong>{{ $projectId->remarks }}</strong>
  </div>
  <div class="col-4"></div>
  <div class="col-4">
    <button type="submit" class="btn btn-success">Verify</button>

  </div>

              </div>
            </form>

            </div>
           </div>
          </div>
        </div>
      
        <!-- Product Specs Tab Pane -->
        <div class="tab-pane fade" id="tab-specs" role="tabpanel" aria-labelledby="TabControl-Specs">
          <a href="#pdp-specs" class="panel-title d-block d-sm-none" data-bs-toggle="collapse">
            Product Specs
          </a>
          <div class="collapse" id="pdp-specs">
            <p>Here are the product specifications.</p>
            <!-- Add specification content here -->
          </div>
        </div>
      
        <!-- Product Support Tab Pane -->
        <div class="tab-pane fade" id="tab-support" role="tabpanel" aria-labelledby="TabControl-Support">
          <a href="#pdp-support" class="panel-title d-block d-sm-none" data-bs-toggle="collapse">
            Product Support
          </a>
          <div class="collapse" id="pdp-support">
            <p>Here is the product support information.</p>
            <!-- Add support content here -->
          </div>
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
            $('#proDet').on('submit', function(e) {
                e.preventDefault();

                // Clear previous error messages
                $('.text-danger').text('');

                var formData = $(this).serialize();

                $.ajax({
                    url: `{{ url('admin/projects/details/do') }}`,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        toastr.success(response.message, 'Success');
                     
                       
                       
                    },
                    error: function(response) {
                        let errors = response.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // Find the span associated with the input field and display the error message
                            $('#' + key + 'Error').text(value[0]);
                        });
                        toastr.error('Please check the form and correct the errors.', 'Error');
                    }
                });
            });
        });  


    $(document).on('click', '#approveButton', function(e) {
    e.preventDefault(); // Prevent default anchor behavior
    var projectId = $(this).data('id'); // Get the project ID
console.log(projectId);
console.log("hell");
    $.ajax({
        url: `{{ url('/admin/projects/details/approval') }}/${projectId}`, // Use the correct URL
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF token for security
            stage1_status: 1 // Set the new status to approved
        },
        success: function(response) {
            toastr.success(response.message, 'Success');
            $('#approveButton').removeClass('btn-danger').addClass('btn-success').text('Approved');
        },
        error: function(response) {
            toastr.error(response.responseJSON.message || 'An error occurred. Please try again.', 'Error');
        }
    });
});



</script>

@endpush

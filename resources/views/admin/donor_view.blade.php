@extends('layouts.master')
@section('title') Data tables @endsection
@section('css')<!-- 1. Bootstrap Icons (font icons) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- 2. Custom Stylesheets -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<!-- 3. Library Stylesheets (like DataTables) -->
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('body') <body data-sidebar="light"> @endsection
@section('content')
@component('components.breadcrumb')
@slot('page_title') Data tables @endslot
@slot('subtitle') Tables @endslot
@endcomponent 
<!-- more donor modal -->
<div class="row">
    <div class="col-11"></div>
<div class="col-1">

    <a href="#" data-bs-toggle="modal" class="btn box mb-1 btn-sm float-right" data-bs-target="#addPartnerModal">Add donor</a>

</div>

<!-- Partner Form Modal -->
<div class="modal fade" id="addPartnerModal" tabindex="-1" aria-labelledby="addPartnerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h5 class="modal-title" id="addPartnerModalLabel">Add Donor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    <div class="modal-body">
    <form id="addPartnerForm">
    @csrf

    <div class="mb-3">
        <label for="partner_name" class="form-label">Partner Name</label>
        <input type="text" class="form-control" id="partner_name" name="partner_name">
        <span class="text-danger error" id="partner_name_error"></span>
    </div>

    <div class="mb-3">
        <label for="short_name" class="form-label">Short Name of Partner</label>
        <input type="text" class="form-control" id="short_name" name="short_name">
        <span class="text-danger error" id="short_name_error"></span>
    </div>

    <div class="mb-3">
        <label for="partner_website" class="form-label">Partner Website</label>
        <input type="text" class="form-control" id="partner_website" name="partner_website">
        <span class="text-danger error" id="partner_website_error"></span>
    </div>

    <div class="mb-3">
        <label for="type_of_partner" class="form-label">Type of Partner</label>
        <select class="form-select" id="type_of_partner" name="type_of_partner">
            <option value="" disabled selected>Select</option>
            <option value="Financial Partner">Financial Partner</option>
            <option value="Non-financial Partner">Non-financial Partner</option>
        </select>
        <span class="text-danger error" id="type_of_partner_error"></span>
    </div>

    <div class="mb-3">
        <label for="type_of_fund" class="form-label">Type of Fund</label>
        <select class="form-select" id="type_of_fund" name="type_of_fund">
            <option value="" disabled selected>Select</option>
            <option value="Foreign Currency">Foreign Currency</option>
            <option value="Local Currency">Local Currency</option>
            <option value="Not Applicable">Not Applicable</option>
        </select>
        <span class="text-danger error" id="type_of_fund_error"></span>
    </div>

    <div class="mb-3">
        <label for="contact_person" class="form-label">Contact Person</label>
        <input type="text" class="form-control" id="contact_person" name="contact_person">
        <span class="text-danger error" id="contact_person_error"></span>
    </div>

    <div class="mb-3">
        <label for="support_date" class="form-label">Month, Year which support was initiated</label>
        <input type="month" class="form-control" id="support_date" name="support_date">
        <span class="text-danger error" id="support_date_error"></span>
    </div>

    <div class="mb-3">
        <label for="contact_email" class="form-label">Contact Email</label>
        <input type="email" class="form-control" id="contact_email" name="contact_email">
        <span class="text-danger error" id="contact_email_error"></span>
    </div>

    <div class="mb-3">
        <label for="contact_phone" class="form-label">Contact Phone</label>
        <input type="text" class="form-control" id="contact_phone" name="contact_phone">
        <span class="text-danger error" id="contact_phone_error"></span>
    </div>

    <button type="submit" class="btn box float-end">Add Partner</button>
</form>

                <div id="formErrors" class="alert alert-danger mt-3 d-none"></div>
            </div>
        </div>
    </div>
</div>
    
</div>
<div class="modal fade" id="donorDetailsModal" tabindex="-1" aria-labelledby="donorDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="donorDetailsModalLabel">donor Details</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="donorDetails">
                <!-- donor details will be loaded here -->
            </div>
        </div>
    </div>
</div>
<!-- edit donor modal -->
<div class="modal fade" id="editDetailsModal" tabindex="-1" aria-labelledby="editDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="editDetailsModalLabel">Edit donor</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="editDetails">
                <!-- Form will be injected here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn but" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- data table donor -->
 <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="donorsTable" class="table table-bordered dt-responsive nowrap display" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                          <th>partner_name</th>
                         
                          <th>partner_website</th>
                          <th>type_of_partner</th>
                          <th>type_of_fund</th>
                          
                          <th>support_date</th>
                          <th>contact_email</th>
                          <th>contact_phone</th>
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
    $('#donorsTable').DataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
            url: "{{ route('donor.data') }}",
            type: 'GET',
            dataSrc: function (json) {
                console.log(json); // Add this line to debug the response
                return json.data;
            }
        },
        columns: [
            { data: 'partner_name', name: 'partner_name' },
            { data: 'partner_website', name: 'partner_website' },
            { data: 'type_of_partner', name: 'type_of_partner' },
            { data: 'type_of_fund', name: 'type_of_fund' },
            { data: 'support_date', name: 'support_date' },
            { data: 'contact_email', name: 'contact_email' },
            { data: 'contact_phone', name: 'contact_phone' },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return `
                        <button class="btn btn-secondary btn-sm more-donor" data-id="${row.donor_id}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <button class="btn btn-info btn-sm edit-donor" data-id="${row.donor_id}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-donor" data-id="${row.donor_id}">
                            <i class="bi bi-trash"></i>
                        </button>
                    `;
                }
            }
        ]
    });
}); 
//more donor 
$(document).on('click', '.more-donor', function() {
        const donorId = $(this).data('id');
        console.log('Clicked donor ID:', donorId);
        if (donorId !== undefined)
         {
            $.get(`{{ url('/admin/showdonors') }}/${donorId}`, function(data) {
                console.log('Response data:', data);

                if (data) {
                    let donorDetails = `
                        <p><strong>partner_name:</strong> ${data.partner_name}</p>
                        <p><strong>short_name:</strong> ${data.short_name}</p>
                        <p><strong>partner_website	:</strong> ${data.partner_website}</p>
                        <p><strong>type_of_partner:</strong> ${data.type_of_partner}</p>
                        <p><strong>type_of_fund:</strong> ${data.type_of_fund}</p>
                        <p><strong>support_date:</strong> ${data.support_date}</p>
                        <p><strong>contact_email:</strong> ${data.contact_email}</p>
                    `;
                    $('#donorDetails').html(donorDetails);
                    $('#donorDetailsModal').modal('show');
                } else {
                    $('#donorDetails').html('<p>No donor details available.</p>');
                    $('#donorDetailsModal').modal('show');
                }
            }).fail(function() {
                alert('Error retrieving donor details.');
            });
        } else {
            console.error('donor ID is undefined.');
        }
    }); 

 
//edit donor 
$(document).on('click', '.edit-donor', function() {
    const donorId = $(this).data('id');
    console.log(donorId)
    $.get(`/admin/donors/${donorId}/edit`, function(data) {
       
        const formHtml = `
            <form id="editDonorForm" data-id="${data.donor_id}">
            @csrf
                <div class="mb-3">
        <label for="partner_name" class="form-label">Partner Name</label>
        <input type="text" class="form-control" id="partner_name" name="partner_name" value="${data.partner_name}">
        <span class="text-danger error" id="partner_name_error"></span>
    </div>

    <div class="mb-3">
        <label for="short_name" class="form-label">Short Name of Partner</label>
        <input type="text" class="form-control" id="short_name" name="short_name" value="${data.short_name}">
        <span class="text-danger error" id="short_name_error"></span>
    </div>

    <div class="mb-3">
        <label for="partner_website" class="form-label">Partner Website</label>
        <input type="text" class="form-control" id="partner_website" name="partner_website" value="${data.partner_website}">
        <span class="text-danger error" id="partner_website_error"></span>
    </div>

    <div class="mb-3">
        <label for="type_of_partner" class="form-label">Type of Partner</label>
        <select class="form-select" id="type_of_partner" name="type_of_partner">
            <option value="" disabled selected>Select</option>
            <option value="Financial Partner">Financial Partner</option>
            <option value="Non-financial Partner">Non-financial Partner</option>
        </select>
        <span class="text-danger error" id="type_of_partner_error"></span>
    </div>

    <div class="mb-3">
        <label for="type_of_fund" class="form-label">Type of Fund</label>
        <select class="form-select" id="type_of_fund" name="type_of_fund">
            <option value="" disabled selected>Select</option>
            <option value="Foreign Currency">Foreign Currency</option>
            <option value="Local Currency">Local Currency</option>
            <option value="Not Applicable">Not Applicable</option>
        </select>
        <span class="text-danger error" id="type_of_fund_error"></span>
    </div>

    <div class="mb-3">
        <label for="contact_person" class="form-label">Contact Person</label>
        <input type="text" class="form-control" id="contact_person" name="contact_person" value="${data.contact_person}">
        <span class="text-danger error" id="contact_person_error"></span>
    </div>

    <div class="mb-3">
        <label for="support_date" class="form-label">Month, Year which support was initiated</label>
        <input type="month" class="form-control" id="support_date" name="support_date" value="${data.support_date}">
        <span class="text-danger error" id="support_date_error"></span>
    </div>

    <div class="mb-3">
        <label for="contact_email" class="form-label">Contact Email</label>
        <input type="email" class="form-control" id="contact_email" name="contact_email" value="${data.contact_email}">
        <span class="text-danger error" id="contact_email_error"></span>
    </div>

    <div class="mb-3">
        <label for="contact_phone" class="form-label">Contact Phone</label>
        <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="${data.contact_phone}">
        <span class="text-danger error" id="contact_phone_error"></span>
    </div>

    <button type="submit" class="btn but float-end text-light">Save Changes</button>
            </form>
        `;
        
        // Inject the form HTML into the modal
        $('#editDetails').html(formHtml);

        // Show the modal
        $('#editDetailsModal').modal('show');
    });
});

//update donor
$(document).on('submit', '#editDonorForm', function(event) {
    event.preventDefault();    
    const donorId = $(this).data('id');
    const formData = $(this).serialize();
    const url = `/admin/donors/${donorId}`; // Ensure this URL is correct

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
                $('#editDonorForm')[0].reset();
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


    
//delete donor 
$(document).on('click', '.delete-donor', function() {
      const donorId = $(this).data('id');
      if(confirm('Are you sure you want to delete this donor?')) {
          $.ajax({
              url: `{{ url('/admin/donors') }}/${donorId}`,
              type: 'DELETE',
              data: {
                  _token: '{{ csrf_token() }}'
              },
              success: function(response) {
                if (response.status === 1) {
                iziToast.success({
                    title: 'Success',
                    message: response.message,
                    position: 'topRight'
                });
            }
            
                  $('#donorsTable').DataTable().ajax.reload();
              }
          });
      }
  });
</script>
  @endsection
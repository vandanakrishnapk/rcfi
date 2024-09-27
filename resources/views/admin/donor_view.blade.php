@extends('layouts.master')
@section('title') Data tables @endsection
@section('css')
<link href="{{ asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
    <button type="button" class="btn btn-success mb-2 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#addPartnerModal">
        <i class="bi bi-person-plus-fill fs-5"></i>
    </button>
</div>

<!-- Partner Form Modal -->
<div class="modal fade" id="addPartnerModal" tabindex="-1" aria-labelledby="addPartnerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h5 class="modal-title" id="addPartnerModalLabel">Add Donor</h5>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="editDetailsModalLabel">Edit donor</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
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

<!-- data table donor -->
 <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
              
                    <div class="col-12">

                        <h4 class="but p-3 rounded fw-bold border border-success text-center" style="color:white;">DONORS</h4>
            
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="donorsTable" class="table table-bordered dt-responsive nowrap display" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                          <th>Partner Name</th>                         
                          <th>Partner Website</th>
                          <th>Type Of Partner</th>
                          <th>Type Of Fund</th>                          
                          <th>Support Date</th>
                          <th>Contact Email</th>
                          <th>Contact Phone</th>
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
            searching: true,
            dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-4'l><'col-sm-8'ip>>",
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Download Excel',
                    title: 'Donors List',
                    titleAttr: 'Export to CSV',
                    className: 'custombutton',
                    exportOptions: {
                        columns: function (idx, data, node) {
                // Return all columns
                return true;
            } // Ensure the correct column indices
                    }
                }
            ],
            
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 Donors', '25 Donors', '50 Donors', 'All Donors']
            ],
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
                        <button class="btn btn-danger btn-sm delete-donor" data-id="${row.donor_id}" data-name="${row.partner_name}">
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
                        <p><strong>Partner Name:</strong> ${data.partner_name}</p>
                        <p><strong>Short Name:</strong> ${data.short_name}</p>
                        <p><strong>Partner Website	:</strong> ${data.partner_website}</p>
                        <p><strong>Type Of Partner:</strong> ${data.type_of_partner}</p>
                        <p><strong>Type Of Fund:</strong> ${data.type_of_fund}</p>
                        <p><strong>Support Date:</strong> ${data.support_date}</p>
                        <p><strong>Contact Email:</strong> ${data.contact_email}</p>
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
    $.get(`{{ url('/admin/donors')}}/${donorId}/edit`, function(data) {
       
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
//delete sweet water
$(document).on('click', '.delete-donor', function() {
    const sweetwaterId = $(this).data('id');
    const userName = $(this).data('name'); // Assuming you have the username data attribute
    // Set the user name and message in the modal
    $('#modalUserName').text(userName);
    $('#modalMessage').text('Are you sure you want to delete this donor?');

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
            url: `{{ url('/admin/donors') }}/${sweetwaterId}`,
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
                $('#donorsTable').DataTable().ajax.reload();
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
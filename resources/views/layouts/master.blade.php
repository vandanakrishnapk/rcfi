<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title> @yield('title')RCFI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta name="keywords" content="veltrix,veltrix laravel,admin template,new admin panel,laravel 10">
    <meta content="Themesbrand" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    @include('layouts.head-css')
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
</head>

@yield('body')
<!-- Begin page -->
<div id="layout-wrapper">

    @include('layouts.topbar')
    @include('layouts.sidebar')

    <!-- Begin page -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                   
                </div>
                <!-- end container -->
            </div>
            <!-- end page content -->
            @include('layouts.footer')
        </div>
        <!-- end main content -->
    </div>
    <!-- END wrapper -->

    <!-- right sidebar file here  -->
    @include('layouts.right-sidebar')
    <!-- script file here -->
    @include('layouts.vendor-scripts')
    @yield('scripts')
   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- creates user -->
@stack('scripts')

<script>
// creates donor
$(document).ready(function() {
 
  
    $('#addPartnerForm').on('submit', function(event) {
        event.preventDefault();
        
        const formData = $(this).serialize();

        $.ajax({
            url: "{{ route('do.AddDonor') }}",
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response); // Log response for debugging

                // Clear previous error messages
                $('.error').text('');

                if (response.status === 0) {
                    $.each(response.error, function(key, value) {
                        $('#' + key).next('.error').text(value);
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
                    $('#addPartnerForm')[0].reset(); // Clear form fields
                    $('#addPartnerModal').modal('hide'); // Optionally, close the modal
                    $('#donorsTable').DataTable().ajax.reload();
                } else {
                    iziToast.error({
                        title: 'Error',
                        message: 'Unexpected response format',
                        position: 'topRight'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                iziToast.error({
                    title: 'Error',
                    message: 'Something went wrong!',
                    position: 'topRight'
                });
            }
        
            });
        });
    });

</script>


    </body>

</html>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title> @yield('title')| Veltrix Laravel - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta name="keywords" content="veltrix,veltrix laravel,admin template,new admin panel,laravel 10">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
    @yield('css')
    @include('layouts.head-css')
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
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>

    <script>
                      
                      $(document).ready(function() {
    $(".submit-application").click(function(e) {
        e.preventDefault();
        let form = $('#submitApplication')[0];
        let data = new FormData(form);

        $.ajax({
            url: "{{ route('do.add_user') }}",
            type: "POST",
            data: data,
            dataType: "JSON",
            processData: false,
            contentType: false,
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
                    $('#submitApplication')[0].reset(); // Clear form fields
                    $('#exampleModal').modal('hide'); // Optionally, close the modal
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

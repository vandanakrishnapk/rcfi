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
    @include('user.template.head-css')
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
</head>

@yield('body')
<!-- Begin page -->
<div id="layout-wrapper">

    @include('user.template.topbar')
    @include('user.template.sidebar')

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
            @include('user.template.footer')
        </div>
        <!-- end main content -->
    </div>
    <!-- END wrapper -->

    <!-- right sidebar file here  -->
    @include('user.template.right-sidebar')
    <!-- script file here -->
    @include('user.template.vendor-scripts')
    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- creates user -->
@stack('scripts')
 </body>

</html>

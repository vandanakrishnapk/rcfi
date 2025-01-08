<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title> @yield('title')Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta name="keywords" content="veltrix,veltrix laravel,admin template,new admin panel,laravel 10">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @include('emplayout.head-css')
</head>
@yield('body')

<!-- Start content -->
@yield('content')
<!-- content -->
@yield('scripts')
@include('emplayout.vendor-scripts')

</body>

</html>

@extends('layouts.master')
@section('title') Light Sidebar @endsection
@section('body') <body data-sidebar="light" data-topbar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Light Sidebar @endslot
    @slot('subtitle') Vertical @endslot
    @endcomponent


    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection

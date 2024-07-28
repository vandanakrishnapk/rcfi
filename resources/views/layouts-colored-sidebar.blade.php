@extends('layouts.master')
@section('title') Colored Sidebar @endsection
@section('body') <body data-sidebar="colored"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Colored Sidebar @endslot
    @slot('subtitle') Vertical @endslot
    @endcomponent



    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection

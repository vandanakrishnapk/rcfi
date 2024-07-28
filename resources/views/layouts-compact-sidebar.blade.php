@extends('layouts.master')
@section('title') Compact Sidebar @endsection
@section('body') <body data-sidebar="dark" data-sidebar-size="small"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Compact Sidebar @endslot
    @slot('subtitle') Vertical Layouts @endslot
    @endcomponent


    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection

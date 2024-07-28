@extends('layouts.master')
@section('title') Icon Sidebar @endsection
@section('body') <body data-sidebar="dark" data-keep-enlarged="true" class="vertical-collpsed"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Icon Sidebar @endslot
    @slot('subtitle') Vertical @endslot
    @endcomponent


    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection

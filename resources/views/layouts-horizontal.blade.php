@extends('layouts.horizontal-layout')
@section('title') Horizontal @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Horizontal @endslot
    @slot('subtitle') Layouts @endslot
    @endcomponent


    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection

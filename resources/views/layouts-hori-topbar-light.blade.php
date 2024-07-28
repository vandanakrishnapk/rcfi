@extends('layouts.horizontal-layout')
@section('title') Topbar Light @endsection
@section('body') <body data-topbar="light" data-layout="horizontal"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Topbar Light @endslot
    @slot('subtitle') Icons @endslot
    @endcomponent



    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection

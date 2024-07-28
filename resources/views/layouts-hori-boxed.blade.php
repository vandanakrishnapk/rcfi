@extends('layouts.horizontal-layout')
@section('title') Boxed Layout @endsection
@section('body') <body data-topbar="dark" data-layout="horizontal" data-layout-size="boxed"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Boxed Layout @endslot
    @slot('subtitle') Horizontal @endslot
    @endcomponent


    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection

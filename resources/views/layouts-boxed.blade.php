@extends('layouts.master')
@section('title')
    Boxed Layout
@endsection
@section('body')

    <body data-sidebar="dark" data-keep-enlarged="true" class="vertical-collpsed" data-layout-size="boxed">
    @endsection
    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Boxed Layout
            @endslot
            @slot('subtitle')
                Vertical
            @endslot
        @endcomponent
    @endsection
    @section('scripts')
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    @endsection

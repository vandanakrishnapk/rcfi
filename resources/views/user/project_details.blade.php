@extends('user.template.master')
@section('css')
<!-- DataTables -->
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="stage d-flex mt-5">
            <ul class="nav nav-tabs">
                {{-- <li class="nav-item">
                    <a class="nav-link active ms-5 me-5" aria-current="page" href="/user/project/details/stage1/view/${projectId}">STAGE I</a>
                </li> --}}
                <li class="nav-item">
                  <a class="nav-link ms-5 me-5" href="">STAGE II</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ms-5 me-5" href="#">STAGET III</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ms-5 me-5">STAGE IV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ms-5 me-5">STAGE V</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link ms-5 me-5">STAGE VI</a>
                  </li>
              </ul>
        </div>
    </div>
</div>  
<div class="row mt-5">
    <div class="col-12">
        @yield('stage')
    </div>
</div>

@endsection



@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>
@endpush

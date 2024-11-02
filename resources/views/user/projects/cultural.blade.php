@extends('layouts.master')
@section('css')
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
<!-- Icons Css -->
<link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
<!-- App Css-->
<link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/libs/chartist/chartist.min.css')}}" rel="stylesheet">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<!-- Bootstrap Css -->
@endsection
@section('content')
<div class="row mt-3">
    <div class="col-12">
        <div class="float-start">
            <a href="{{ route('user.getProConstruction')}}" class="btn pro btn-sm rounded-circle"><i class="bi bi-box-arrow-in-left fs-4 ms-1"></i></a>
        </div>    
    </div>

  
<!--data table -->
<div class="row">
    <div class="col-12">
        @if($errors->any())
        <div class="alert alert-danger text-danger fs-6">
          
                @foreach($errors->all() as $error)
                  {{ $error }}
                @endforeach
        
        </div>
    @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                  
                    <div class="col-12">
    
                        <h4 class="widgetcolor p-3 text-center rounded fw-bold border border-success" style="color:white;">CULTURAL CENTRE PROJECT LIST</h4>
            
                    </div>
                </div>
            </div>
    
            <div class="card-body">
    
    <table id="projectTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Project ID</th>
                <th>Agency Project No</th>
                <th>Donor Name</th>
                <th>Project Manager</th>
                <th>Available Budget</th>
                <th>Type of Project</th>
                <th>Remarks</th>
                <th>Action</th>
                      
        </tr>
        </thead>
        <tbody>
            <!-- Data will be populated here by DataTables -->
        </tbody>
      
    </table>
    
            </div>
        </div>
    </div>
</div>
    
    
@endsection 
@section('scripts')

<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
 <!-- Peity chart-->
 <script src="{{ asset('assets/libs/peity/peity.min.js') }}"></script>

 <!-- Plugin Js-->
 <script src="{{ asset('assets/libs/chartist/chartist.min.js') }}"></script>
 <script src="{{ asset('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltips.min.js') }}"></script>


<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>
@endsection
@push('scripts')
<script>

$(document).ready(function() {
    $('#projectTable').DataTable({
        select: true,
        serverSide: false, // Set this to true if you’re using server-side processing
        dom: 'Bfrtlip',
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Download Excel',
                    title: 'Projects',
                    titleAttr: 'Export to Excel',
                    className: 'pro',
                    exportOptions: { 
                        columns: function (idx, data, node)
                         {               
                         return true;
                         } 
                           }
                 }
                ],
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 Projects', '25 Projects', '50 Projects', 'All Projects']
            ],
            ajax: {
                url: `{{ url('/user/projects/datatable/cultural') }}`,
                type: 'GET',
                dataSrc: 'data',
                
            },
            "columns": [
                {
                data: null,
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return meta.row + 1; // Serial number starts from 1
                }
                },
            { data: 'projectID' },
            { data: 'agencyProjectNo' },
            { data: 'donorName' },
            { data: 'projectManager' },
            { data: 'availableBudget' },
            { data: 'typeOfProject' },  
            { data: 'remarks' },            
            {
    data: null,
    name: 'action',
    orderable: false,
    searchable: false,
    render: function(data, type, row, meta) {
        return `
            <div class="dd d-flex">
                <a href="{{ url('/user/project/details/view') }}/${row.proId}" class="btn btn-dark btn-sm ms-1" title="view-more">
                    <i class="bi bi-eye"></i>
                </a>             
            </div>
        `;
    }
}        
                ]
            });
        });


</script>
@endpush
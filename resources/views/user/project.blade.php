@extends('user.template.master')
@section('css')
<!-- DataTables -->
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection
@section('content')  
<!--data table -->
<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                  
                    <div class="col-12">
    
                        <h4 class="but p-3 text-center rounded fw-bold border border-success" style="color:white;">PROJECT LIST</h4>
            
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

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>
<script>

$(document).ready(function() {
    $('#projectTable').DataTable({
        processing: true,
            serverSide: true,
            destroy: true,
            searching: true,
            dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-4'l><'col-sm-8'ip>>",
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Download Excel',
                    title: 'Projects',
                    titleAttr: 'Export to Excel',
                    className: 'custombutton',
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
                url: `{{ url('/user/projects/datatable') }}`,
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
                {data:'projectID'},
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
                         
                        

                        <a href="{{ url('/user/project/details/view')}}/${row.proId}" class="btn btn-dark btn-sm ms-1" data-id="${row.proId}" data-pro=${row.agencyProjectNo}>  <i class="bi bi-eye"></i></a>
                     
                       
                    `;
                } 
            },
                    
                ]
            });
        });



</script>
@endpush
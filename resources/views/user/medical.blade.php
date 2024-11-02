@extends('user.template.master')
@section('content')
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
@endsection



@section('content')




<div class="row mt-3">
    <div class="col-12">
        <div class="float-start">
            <a href="{{ route('user.getConstruction')}}" class="btn btn-success btn-sm rounded-circle"><i class="bi bi-box-arrow-in-left fs-4 ms-1"></i></a>
        </div>
        <div class="float-end d-none d-md-block">
            <button type="button" class="btn btn-success mb-1 me-3 float-end rounded-circle" data-bs-toggle="modal" data-bs-target="#medicalModal">
                <i class="bi bi-person-plus-fill fs-5"></i>
            </button>
        </div>
    </div>
            <div class="row">
                <div class="col-12">
        
          
        <div class="modal fade" id="medicalModal" tabindex="-1" aria-labelledby="medicalModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header box">
                        <h1 class="modal-title fs-5 text-light" id="medicalModalLabel">Medical Centre Application Form</h1>
                        <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
               <div class="modal-body p-4 medicalModalBody">
                <form id="medicalForm" method="POST">
                    @csrf
                    <fieldset class="border p-3 mb-4">
                        <legend class="w-auto" style="margin-left:200px">Applicant/Committee Details</legend>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="applicantName">Name of Applicant:</label>
                                    <input type="text" id="applicantName" name="applicantName" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="committeeName">Name of Committee:</label>
                                    <input type="text" id="committeeName" name="committeeName" class="form-control" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="year">Year:</label>
                                    <input type="number" id="year" name="year" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="registerNo">Register No:</label>
                                    <input type="text" id="registerNo" name="registerNo" class="form-control" >
                                </div>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="village">Village:</label>
                                    <input type="text" id="village" name="village" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="place">Place:</label>
                                    <input type="text" id="place" name="place" class="form-control" >
                                </div>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="panchayat">Panchayat:</label>
                                    <input type="text" id="panchayat" name="panchayat" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="post">Post:</label>
                                    <input type="text" id="post" name="post" class="form-control" >
                                </div>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="state">District</label>
                                    <input type="text" id="district" name="district" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="state">State:</label>
                                    <input type="text" id="state" name="state" class="form-control" >
                                </div>
                            </div>
                            
                           
                        </div>
            
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mobile1">Mobile Number 1:</label>
                                    <input type="tel" id="mobile1" name="mobile1" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mobile2">Mobile Number 2:</label>
                                    <input type="tel" id="mobile2" name="mobile2" class="form-control">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="border p-3 mb-4">
                        <legend class="w-auto" style="margin-left:200px">Project Site Description</legend>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mahalName">Name of Mahal:</label>
                                    <input type="text" id="mahalName" name="mahalName" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="projectplace">Place</label>
                                    <input type="text" id="projectplace" name="projectplace" class="form-control" >
                                </div>
                            </div>
                          
                        </div>
            
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="projectVillage">Village:</label>
                                    <input type="text" id="projectVillage" name="projectVillage" class="form-control" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="stateProject">State:</label>
                                    <input type="text" id="stateProject" name="stateProject" class="form-control" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="familiesBenefited">Families benefited by the scheme:</label>
                                    <input type="number" id="familiesBenefited" name="familiesBenefited" class="form-control" >
                                </div>
                            </div>
                        </div>
            
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="buildingPresent">Is there a building at present?</label>
                                    <select id="buildingPresent" name="buildingPresent" class="form-control" >
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="requirements">Requirements (Renewal/New):</label>
                                    <input type="text" id="requirements" name="requirements" class="form-control" >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="border p-3 mb-4">
                        <legend class="w-auto" style="margin-left:200px">Description of the proposed project</legend>
            
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="totalSqrFt">Total Sqr Ft:</label>
                                    <input type="number" name="totalSqrFt" class="form-control" id="totalSqrFt" >
                                    <span id="totalSqrFtError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="area">location</label>
                                    <input type="text" id="location" name="location" class="form-control">
                                </div>
                            </div>
                            
                        </div>
            
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="expectedAmount">Expected Amount:</label>
                                    <input type="number" name="expectedAmount" class="form-control" id="expectedAmount" >
                                    <span id="expectedAmountError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pharmacy">Is pharmacy ?</label>
                                    <select id="pharmacy" name="pharmacy" class="form-control" >
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                           
                            </div>
                       
            
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="legalPermissions">Are legal permissions available?</label>
                                    <select id="legalPermissions" name="legalPermissions" class="form-control" >
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="permittedType">Permitted Type:</label>
                                    <input type="text" id="permittedType" name="permittedType" class="form-control">
                                </div>
                            </div>
                            
                        </div>
            
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="area">Area:</label>
                                    <input type="text" id="area" name="area" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="bedType">Which Type (Number of Beds):</label>
                                    <input type="text" id="bedType" name="bedType" class="form-control">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="col-5"></div>
                        <div class="col-4">
                            <button type="submit" class="btn but">Submit</button>
                        </div>
                    </div>                  
             
                </form>
</div>
</div>
</div>
</div>
            </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                         
                            <div class="row">
                            
                                <div class="col-12">
            
                                    <h4 class="but p-3 rounded fw-bold border border-success text-center" style="color:white;">MEDICAL CENTRE  PROJECT APPLICATIONS</h4>
                        
                                </div>
                            </div>
                        </div>
                        <div class="card-body">               
                               <table id="medicalTable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Name of Applicant</th>
                                        <th>Name of Committee</th>
                                        <th>Year</th>
                                        <th>Register No</th>
                                        <th>Village</th>
                                        <th>Place</th>
                                        <th>Panchayat</th>
                                        <th>Post</th>
                                        <th>District</th>
                                        <th>State</th>
                                        <th>Mobile Number 1</th>
                                        <th>Mobile Number 2</th>
                                        <th>Name of Mahal</th>
                                        <th>Project Place</th>
                                        <th>Project Village</th>
                                        <th>State</th>
                                        <th>Families Benefited by the Scheme</th>
                                        <th>Is there a Building at Present?</th>
                                        <th>Requirements (Renewal/New)</th>
                                        <th>Total Sqr Ft</th>
                                        <th>Location</th>
                                        <th>Expected Amount</th>
                                        <th>Is Pharmacy Required?</th>
                                        <th>Are Legal Permissions Available?</th>
                                        <th>Permitted Type</th>
                                        <th>Area</th>
                                        <th>Which Type (Number of Beds)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>                      
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>     
            
            
            <!-- view more-->
<div class="modal fade" id="viewMoreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header custommodal">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Medical Centre Application
          </h1>
          <button type="button" class="btn-close customclose" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="viewMoreModalBody">
          
        </div>
       
      </div>
    </div>
  </div>  


<!-- Edit shop and others -->
<div class="modal fade" id="EditmedicalModal" tabindex="-1" aria-labelledby="EditmedicalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header box">
                <h1 class="modal-title fs-5 text-light" id="MedicalModalLabel">Medical Centre Application</h1>
                <button type="button" class="btn-close cls" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
       <div class="modal-body p-4 EditmedicalModalBody">
<form id="EditmedicalForm" method="POST">
    @csrf
    <fieldset class="border p-3 mb-4">
        <legend class="w-auto" style="margin-left:200px">Applicant/Committee Details</legend>
        
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="applicantName">Name of Applicant:</label>
                    <input type="text" id="applicantName" name="applicantName" class="form-control" >
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="committeeName">Name of Committee:</label>
                    <input type="text" id="committeeName" name="committeeName" class="form-control" >
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="number" id="year" name="year" class="form-control" >
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="registerNo">Register No:</label>
                    <input type="text" id="registerNo" name="registerNo" class="form-control" >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="village">Village:</label>
                    <input type="text" id="village" name="village" class="form-control" >
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="place">Place:</label>
                    <input type="text" id="place" name="place" class="form-control" >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="panchayat">Panchayat:</label>
                    <input type="text" id="panchayat" name="panchayat" class="form-control" >
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="post">Post:</label>
                    <input type="text" id="post" name="post" class="form-control" >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="state">District</label>
                    <input type="text" id="district" name="district" class="form-control" >
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" id="state" name="state" class="form-control" >
                </div>
            </div>
            
           
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="mobile1">Mobile Number 1:</label>
                    <input type="tel" id="mobile1" name="mobile1" class="form-control" >
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="mobile2">Mobile Number 2:</label>
                    <input type="tel" id="mobile2" name="mobile2" class="form-control">
                </div>
            </div>
        </div>
    </fieldset>
    
    <fieldset class="border p-3 mb-4">
        <legend class="w-auto" style="margin-left:200px">Project Site Description</legend>
        
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="mahalName">Name of Mahal:</label>
                    <input type="text" id="mahalName" name="mahalName" class="form-control" >
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="projectplace">Place</label>
                    <input type="text" id="projectplace" name="projectplace" class="form-control" >
                </div>
            </div>
          
        </div>

        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="projectVillage">Village:</label>
                    <input type="text" id="projectVillage" name="projectVillage" class="form-control" >
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="stateProject">State:</label>
                    <input type="text" id="stateProject" name="stateProject" class="form-control" >
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="familiesBenefited">Families benefited by the scheme:</label>
                    <input type="number" id="familiesBenefited" name="familiesBenefited" class="form-control" >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="buildingPresent">Is there a building at present?</label>
                    <select id="buildingPresent" name="buildingPresent" class="form-control" >
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="requirements">Requirements (Renewal/New):</label>
                    <input type="text" id="requirements" name="requirements" class="form-control" >
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="border p-3 mb-4">
        <legend class="w-auto" style="margin-left:200px">Description of the proposed project</legend>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="totalSqrFt">Total Sqr Ft:</label>
                    <input type="number" name="totalSqrFt" class="form-control" id="totalSqrFt" >
                    <span id="totalSqrFtError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="area">location</label>
                    <input type="text" id="location" name="location" class="form-control">
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="expectedAmount">Expected Amount:</label>
                    <input type="number" name="expectedAmount" class="form-control" id="expectedAmount" >
                    <span id="expectedAmountError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="pharmacy">Is pharmacy ?</label>
                    <select id="pharmacy" name="pharmacy" class="form-control" >
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
           
            </div>
       

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="legalPermissions">Are legal permissions available?</label>
                    <select id="legalPermissions" name="legalPermissions" class="form-control" >
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="permittedType">Permitted Type:</label>
                    <input type="text" id="permittedType" name="permittedType" class="form-control">
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="area">Area:</label>
                    <input type="text" id="area" name="area" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="bedType">Which Type (Number of Beds):</label>
                    <input type="text" id="bedType" name="bedType" class="form-control">
                </div>
            </div>
        </div>
    </fieldset>
    <div class="row">
        <div class="col-5"></div>
        <div class="col-4">
            <input type="hidden" name="medicalId">
            <button type="submit" class="btn but">Submit</button>
        </div>
    </div>                  

</form>
</div>
</div>
</div>
</div>
   <!--Delete confirmation modal-->
<!-- Bootstrap Modal -->
<div id="deleteConfirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header custommodal">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modalMessage"></p>
                <p>Name: <span id="modalUserName"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn but cancel" data-dismiss="modal">Cancel</button>
                <button type="button" id="confirmDelete" class="btn btn-danger">Delete</button>
            </div>
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
    //datatable 
    $(document).ready(function() {
    $('#medicalTable').DataTable({
        select: true,
        serverSide: false, 
        dom: 'Bfrtlip',
        buttons: [
            {
                extend: 'csvHtml5',
                text: 'Download Excel',
                title: 'Medical Centre Application',
                titleAttr: 'Export to CSV',
                className: 'custombutton',
                exportOptions: {
                    columns: function (idx, data, node) {
                        return true;
                    }
                }
            }
        ],
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 Applications', '25 Applications', '50 Applications', 'All Applications']
        ],
        ajax: {
            url: `{{ url('/user/construction/project/medical/datatable') }}`,
            type: 'GET',
            dataSrc: 'data',
        },
        columns: [
          
{ data: 'applicantName' },
{ data: 'committeeName' },
{ data: 'year' },
{ data: 'registerNo' },
{ data: 'village' },
{ data: 'place' },
{ data: 'panchayat' },
{ data: 'post' },
{ data: 'district' },
{ data: 'state' },
{ data: 'mobile1' },
{ data: 'mobile2' },
{ data: 'mahalName' },
{ data: 'projectplace' },
{ data: 'projectVillage' },
{ data: 'stateProject' },
{ data: 'familiesBenefited' },
{ data: 'buildingPresent' },
{ data: 'requirements' },
{ data: 'totalSqrFt' },
{ data: 'location' },
{ data: 'expectedAmount' },
{ data: 'pharmacy' },
{ data: 'legalPermissions' },
{ data: 'permittedType' },
{ data: 'area' },
{ data: 'bedType' },

    {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row, meta) {
                    return `
                    <div class="dd d-flex">
                        <button class="btn btn-primary btn-sm view-more me-1" data-id="${row.medicalId}">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <button class="btn btn-warning btn-sm edit me-1" data-id="${row.medicalId}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete" data-id="${row.medicalId}" data-name="${row.applicantName}">
                            <i class="bi bi-trash"></i>
                        </button>                       
                    </div>`;
                } 
            },
        ]
    });
});
//submit form
    $(document).ready(function() {
    $('#medicalForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = $(this).serialize();

        $.ajax({
            url: `{{ url('user/construction/project/medical/new') }}`, // Your endpoint
            type: 'POST',
            data: formData,
            success: function(response) {
                toastr.success(response.message, 'Success');
                $('#medicalModal').modal('hide');
                // $('#familyTable').DataTable().ajax.reload();
                // $('#diffAbledTable').DataTable().ajax.reload(); // Reload the DataTable
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors; // Use xhr here
                    $.each(errors, function(key, value) {
                        $('#' + key + 'Error').text(value[0]); // Ensure ID matches
                    });
                    toastr.error('Please check the form and correct the errors.', 'Error');
                } else {
                    toastr.error('Something went wrong!', 'Error');
                }
            }
        });
    });
});   

//view more 

$(document).on('click', '.view-more', function() {
    const medicalId = $(this).data('id');
    console.log('Clicked medicalId:', medicalId);

    if (medicalId !== undefined) {
        $.ajax({
            url: `{{ url('/user/construction/project/medical/view/more') }}/${medicalId}`, // Laravel route
            method: 'GET',
            success: function(response) {
                console.log('Response data:', response);

                 const data = response;
                 const requiredKeys = [
                'applicantName',
                'committeeName',
                'year',
                'registerNo',
                'village',
                'place',
                'panchayat',
                'post',
                'district',
                'state',
                'mobile1',
                'mobile2',
                'mahalName',
                'projectplace',
                'projectVillage',
                'stateProject',
                'familiesBenefited',
                'buildingPresent',
                'requirements',
                'totalSqrFt',
                'location',
                'expectedAmount',
                'pharmacy',
                'legalPermissions',
                'permittedType',
                'area',
                'bedType'
                ];
                const $modalBody = $('#viewMoreModalBody');
                $modalBody.empty(); // Clear existing content

                let gridHtml = '<div class="row">';

                requiredKeys.forEach((key, index) => {
                    const capitalizedKey = key.replace(/_/g, ' ').replace(/^./, str => str.toUpperCase());
                    const value = data[key] !== undefined ? data[key] : 'Not Available';

                    if (index % 2 === 0 && index !== 0) {
                        gridHtml += '</div><div class="row">';
                    }

                    gridHtml += `
                        <ul class="list-group list-group-horizontal-md">
                            <div class="col-6">
                                <li class="list-group-item"><strong>${capitalizedKey}</strong></li>
                            </div>
                            <div class="col-6">
                                <li class="list-group-item"><strong>${value}</strong></li>
                            </div>
                        </ul>
                    `;
                });

                gridHtml += '</div>'; // Close the last row

                $modalBody.append(gridHtml);

                // Show the modal
                $('#viewMoreModal').modal('show');
            },
            error: function(xhr) {
                console.error('An error occurred:', xhr.responseText);
                // Optionally show an error message in the UI
            }
        });
    }
});  

//edit medical 

//edit Medical 

$(document).on('click', '.edit', function() {
    const medicalId = $(this).data('id'); // Assuming the edit button has a data-id attribute

$.get(`{{ url('/user/construction/project/medical/edit') }}/${medicalId}`, function(data) {
$('input[name="medicalId"]').val(data.medicalId);
$('input[name="applicantName"]').val(data.applicantName);
$('input[name="committeeName"]').val(data.committeeName);
$('input[name="year"]').val(data.year);
$('input[name="registerNo"]').val(data.registerNo);
$('input[name="village"]').val(data.village);
$('input[name="place"]').val(data.place);
$('input[name="panchayat"]').val(data.panchayat);
$('input[name="post"]').val(data.post);
$('input[name="district"]').val(data.district);
$('input[name="state"]').val(data.state);
$('input[name="mobile1"]').val(data.mobile1);
$('input[name="mobile2"]').val(data.mobile2);
$('input[name="mahalName"]').val(data.mahalName);
$('input[name="projectplace"]').val(data.projectplace);
$('input[name="projectVillage"]').val(data.projectVillage);
$('input[name="stateProject"]').val(data.stateProject);
$('input[name="familiesBenefited"]').val(data.familiesBenefited);
$('#buildingPresent').val(data.buildingPresent); // For select elements
$('input[name="requirements"]').val(data.requirements);
$('input[name="totalSqrFt"]').val(data.totalSqrFt);
$('input[name="location"]').val(data.location);
$('input[name="expectedAmount"]').val(data.expectedAmount);
$('#pharmacy').val(data.pharmacy); // For select elements
$('#legalPermissions').val(data.legalPermissions); // For select elements
$('input[name="permittedType"]').val(data.permittedType);
$('input[name="area"]').val(data.area);
$('input[name="bedType"]').val(data.bedType);
$('#EditmedicalModal').modal('show');
    });
}); 

//update medical details 
$(document).ready(function() {
    $('#EditmedicalForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        let formData = $(this).serializeArray();

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('user.updateMedical') }}",
            data: formData,
            dataType: 'json',
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },
            success: function(data) {
                if (data.status == 0) {
                    // Handle validation errors or other issues
                    $.each(data.error, function(prefix, val) {
                        $('#' + prefix + '-error').text(val[0]);
                    });
                } else {
                    // Hide the modal and reset the form on success
                    $('#EditmedicalModal').modal('hide');
                    toastr.success(data.message); // Display success message
                    setTimeout(function() {
                        location.reload(); // Optional: Reload page after a short delay
                    }, 2000);
                }
            },
            error: function(xhr, status, error) {
                toastr.error('An error occurred. Please try again.'); // Display error message on request failure
            }
        });
    });
}); 
//delete Medical application 
$(document).on('click', '.delete', function() {
    const MedicalId = $(this).data('id');
    const userName = $(this).data('name'); // Assuming you have the username data attribute
    // Set the user name and message in the modal
    $('#modalUserName').text(userName);
    $('#modalMessage').text('Are you sure you want to delete this application?');

    // Show the modal
    $('#deleteConfirmationModal').modal('show');
     $('.close').on('click', function()
    {
        $('#deleteConfirmationModal').modal('hide');
    });

    $('.cancel').on('click', function()
    {
        $('#deleteConfirmationModal').modal('hide');
    });

    // Handle confirmation
    $('#confirmDelete').off('click').on('click', function() {
        $.ajax({
            url: `{{ url('/user/construction/project/medical/delete') }}/${MedicalId}`,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 1) {
                    toastr.success(response.message, 'Success', {
                        positionClass: 'toast-top-right'
                    });
                } else {
                    toastr.error('Unexpected response format.', 'Error', {
                        positionClass: 'toast-top-right'
                    });
                }
                $('#medicalTable').DataTable().ajax.reload();
                $('#deleteConfirmationModal').modal('hide'); // Hide the modal on success
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                toastr.error('Something went wrong!', 'Error', {
                    positionClass: 'toast-top-right'
                });
            }
        });
    });
});

</script>
@endpush
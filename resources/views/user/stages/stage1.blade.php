@extends('user.project_details')
@section('stage') 
<div class="card">
    <div class="card-body p-5 bg-light">
        <form id="EditprojectForm" method="POST">
            @csrf
            <input type="hidden" name="projectId" id="editProjectId" value="{{ $projectId->projectId }}"> <!-- Hidden field for project ID -->
            <div class="mb-3">
                <label for="editAgencyProjectNo" class="form-label">Agency Project No.</label>
                <input type="text" class="form-control" name="agencyProjectNo" value="{{ $projectId->agencyProjectNo }}">
                <span class="error text-danger" id="agencyProjectNo-error"></span>
            </div>
            <div class="mb-3">
                <label for="editDonorName" class="form-label">Donor Name</label>
                <select class="form-select" name="donorName" id="editDonorName">
                    <option value="{{ $donor->donor_id }}">{{ $donor->partner_name}}</option>
                    @foreach($donors as $donorss)
                    <option value="{{ $donorss->donor_id }}">{{ $donorss->partner_name }}</option>
                    @endforeach
                </select>
                <span class="error text-danger" id="donorName-error"></span>
            </div>
            <div class="mb-3">
                <label for="editProjectManager" class="form-label">Project Manager</label>
                <select class="form-select" name="projectManager" id="editProjectManager">
                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                    @foreach($projectmanager as $pro)
                    <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                    @endforeach
                </select>
                <span class="error text-danger" id="projectManager-error"></span>
            </div>
            <div class="mb-3">
                <label for="editAvailableBudget" class="form-label">Available Budget</label>
                <input type="text" class="form-control" name="availableBudget" id="editAvailableBudget" value="{{ $projectId->availableBudget }}">
                <span class="error text-danger" id="availableBudget-error"></span>
            </div>
            <div class="mb-3">
                <label for="editProjectType" class="form-label">Type of Project</label>
                <select class="form-select" name="typeOfProject" id="editProjectType">
                    <option value="{{ $projectId->typeOfProject }}">{{ $projectId->typeOfProject }}</option>
                    <option value="Markaz Open Care">Markaz Open Care</option>
                    <option value="Education Centre">Education Centre</option>
                    <option value="Cultural Centre">Cultural Centre</option>
                    <option value="Sweet Water">Sweet Water</option>
                </select>
                <span class="error text-danger" id="typeOfProject-error"></span>
            </div>
            <div class="mb-3">
                <label for="editRemarks" class="form-label">Remarks</label>
                <textarea class="form-control" name="remarks" id="editRemarks" rows="3">{{ $projectId->remarks }}</textarea>
                <span class="error text-danger" id="remarks-error"></span>
            </div>
            <div class="row">
                <div class="col-5"></div>
                <div class="col-6">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection 
@push('scripts')
<script>

</script>
@endpush
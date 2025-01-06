<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\User;
use Carbon\Carbon; 
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\odf_table;
use App\Models\odfFund;

class userodfController extends Controller
{
    public function doodfProject(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'agency_id' => 'required|string',
            'donor_name' => 'required|exists:donors,donor_id',
            'application_id' => 'required|string',
            'account_name' => 'required|string',
            'account_number' => 'required|string',
            'ifsc_code' => 'required|string',
            'bank_branch' => 'required|string',
            'bank_name' => 'required|string',
            'cluster_name' => 'nullable|string',  // Cluster name is optional
            'project_type' =>'nullable|string',
        ], [
            'agency_id.required' => 'Agency ID is required',
            'donor_name.required' => 'Donor Name is required',
            'application_id.required' => 'Application ID is required',
            'account_name.required' => 'Account Name is required',
            'account_number.required' => 'Account Number is required',
            'ifsc_code.required' => 'IFSC Code is required',
            'bank_branch.required' => 'Bank Branch is required',
            'bank_name.required' => 'Bank Name is required',
            'project_type.required' =>'Project Type Required',
        ]);
    
        // If validation fails, return errors
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
    
        // Project Type Mapping (can be extended for different project codes)
        $projectTypeMap = [
            'Markaz Orphan Care' => 'OC',
            'Differently Abled' =>'DA',
            'Family Aid' =>'FA',
        ];
    
        // Retrieve the project type from the request
        $typeOfProject = $request->input('project_type');
    
        // Get the corresponding project code
        $projectCode = $projectTypeMap[$typeOfProject] ?? null;
        if (!$projectCode) {
            return response()->json([
                'status' => 0,
                'message' => 'Invalid project type provided.'
            ], 400);
        }
    
        // Generate project ID with the selected project code
        $projectId = $this->generateProjectId($projectCode);
    
        // Prepare the data to be inserted
        $data = [
            'agency_id' => $request->input('agency_id'),
            'donor_name' => $request->input('donor_name'),
            'application_id' => $request->input('application_id'),
            'account_name' => $request->input('account_name'),
            'account_number' => $request->input('account_number'),
            'ifsc_code' => $request->input('ifsc_code'),
            'bank_branch' => $request->input('bank_branch'),
            'bank_name' => $request->input('bank_name'),
            'cluster_name' => $request->input('cluster_name', null),  // Use null if not provided
            'project_id' => $projectId,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
        // Insert the data into the odf_tables table
        if (DB::table('odf_tables')->insert($data)) {
            return response()->json([
                'status' => 1,
                'message' => 'ODF Project created successfully!',
            ]);
        } else {
            return response()->json([
                'status' => 2,
                'message' => 'Something went wrong!',
            ]);
        }
    }
    
    private function generateProjectId($projectCode)
    {
        // Get the current year
        $year = date('y');  // Get last two digits of the year
    
        // Generate a 5-digit unique number (if needed)
        $latest = DB::table('odf_tables')->max('id');  // Assuming 'id' is auto-incrementing
        $uniqueNumber = str_pad(($latest + 1), 3, '0', STR_PAD_LEFT);  // Increment ID and pad with zeros
    
        return "RCFI{$year}{$projectCode}{$uniqueNumber}";
    }
     
   

    public function getodfProjectData(Request $request)
{
    if ($request->ajax()) {
        // Modify the query to exclude records with odf_tables.status = 1
        $data = DB::table('odf_tables')
            ->join('donors', 'donors.donor_id', '=', 'odf_tables.donor_name')
            ->leftJoin('odf_funds', 'odf_funds.project_id', '=', 'odf_tables.id')
            ->join('markaz_orphan_cares', 'odf_tables.application_id', '=', 'markaz_orphan_cares.orphancareId')
            ->select('odf_tables.*', 'donors.partner_name as donorName', 'markaz_orphan_cares.applicationId', 'odf_funds.amount', 'odf_funds.current')
            ->where('odf_tables.status', '!=', 1)  // Exclude records where status = 1
            ->get();

        // Retrieve parameters from DataTables
        $draw = $request->get('draw');
        $totalRecords = count($data);
        $filteredRecords = count($data);

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data,
        ]);
    }
    return response()->json(['error' => 'Invalid request'], 400);
}
 

    public function projectodfViewMore($id) 
    {        
        $project = DB::table('odf_tables')
            ->leftjoin('donors','donors.donor_id','=','odf_tables.donor_name')
            ->leftjoin('markaz_orphan_cares','odf_tables.application_id','=','markaz_orphan_cares.orphancareId')
            ->leftjoin('odf_funds','odf_funds.project_id','=','odf_tables.id')
            ->select('odf_tables.*','donors.partner_name as donorName','markaz_orphan_cares.applicationId')
            ->where('odf_tables.id','=',$id)
            ->first();

        if (!$project) {
            return response()->json(['error' => 'Project details not found'], 404);
        }
        return response()->json($project);
    } 

    public function editodfProject($id)
    {
        $project = DB::table('odf_tables')
        ->join('donors','donors.donor_id','=','odf_tables.donor_name')
        ->join('markaz_orphan_cares','odf_tables.application_id','=','markaz_orphan_cares.orphancareId')
        ->select('odf_tables.*','donors.partner_name as donorName','markaz_orphan_cares.applicationId')
        ->where('odf_tables.id','=',$id)
        ->first();    
        return response()->json($project);
   
    } 
    public function updateodfProject(Request $request)
    {
        // Log the incoming request data for debugging
        \Log::info('Request Data: ', $request->all());
    
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'agency_id'          => 'required|string',
            'donor_name'         => 'required|exists:donors,donor_id',
            'application_id'     => 'required|exists:markaz_orphan_cares,orphancareId',
            'account_name'       => 'required|string',
            'account_number'     => 'required|numeric',
            'ifsc_code'          => 'required|string',
            'bank_branch'        => 'required|string',
            'bank_name'          => 'required|string',
            'cluster_name'       => 'required|string',
        ], [
            'agency_id.required'          => 'Agency ID is required.',
            'donor_name.required'         => 'Donor Name is required.',
            'application_id.required'     => 'Application ID is required.',
            'account_name.required'       => 'Account Name is required.',
            'account_number.required'     => 'Account Number is required.',
            'ifsc_code.required'          => 'IFSC Code is required.',
            'bank_branch.required'        => 'Bank Branch is required.',
            'bank_name.required'          => 'Bank Name is required.',
            'cluster_name.required'       => 'Cluster Name is required.',
        ]);
    
        if ($validator->fails()) {
            \Log::error('Validation failed: ', $validator->errors()->toArray()); // Log validation errors
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
    
        try {
            $project = odf_table::findOrFail($request->input('id'));
    
            // Log the project data before update to verify
            \Log::info('Project Data Before Update:', $project->toArray());
    
            $project->update($validator->validated());
    
            return response()->json([
                'status' => 1,
                'message' => 'Project updated successfully.',
            ]);
        } catch (\Exception $e) {
            \Log::error('Update Project Failed: ' . $e->getMessage());
            return response()->json([
                'status' => 0,
                'message' => 'Failed to update project. Please try again later.'
            ], 500);
        }
    }
    
    

    public function deleteodfProject($id)
    {

        try {
            // Find the record by ID
            $project = odf_table::findOrFail($id);
    
            // Delete the record
            $project->delete();
    
            // Return a success response
            return response()->json([
                'status' => 1,
                'message' => 'Project deleted successfully!'
            ]);
        } catch (\Exception $e) {
            // Return an error response if the record could not be deleted
            return response()->json([
                'status' => 0,
                'message' => 'Failed to delete project. Please try again later.'
            ], 500);
        }

    }   


    public function odfFundview()
    {
    
        return response()->json([
            'message' =>'success',
        ]);
    } 
    
    public function addFund(Request $request)
    {
        // Step 1: Validate the request
        $validated = $request->validate([
            'current' => 'required|numeric',  // Ensure amount is a numeric value
            'id' => 'required|exists:odf_tables,id',  // Ensure the project ID exists in the odf_tables table
        ]);
    
        try {
            // Step 2: Find the project by ID
            $project = odf_table::findOrFail($request->id);
    
            // Step 3: Create a new fund entry
             // Step 3: Update the current value for the corresponding fund
             $odfFund = odfFund::updateOrCreate(
                ['project_id' => $project->id],  // Condition to check if record exists (find by project_id)
                ['current' => $request->current]  // Fields to update or create
            );
    
            // Step 4: Return a success response
            return response()->json(['success' => true, 'message' => 'Fund added successfully.']);
    
        } catch (\Exception $e) {
            // Handle any errors that occur during the process
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    

public function getCurrent()
{
    return response()->json([
        'message' =>'success'
    ]);
} 

public function updateStatus($id)
{
        try {
            // Find the record by ID
            $project = odf_table::findOrFail($id);
    
            // Delete the record
            $project->update([
                'status' =>1,
            ]);
    
            // Return a success response
            return response()->json([
                'status' => 1,
                'message' => 'Project marked as Completed'
            ]);
        } catch (\Exception $e) {
            // Return an error response if the record could not be deleted
            return response()->json([
                'status' => 0,
                'message' => 'Failed to mark the project, Please try again later.'
            ], 500);
        }

     

}  

public function updatepaymentStatus($id)
{
    try {
        // Find the project record by ID
        $project = odf_table::findOrFail($id);

        // Get the related odf_funds record using project_id
        $fund = odfFund::where('project_id', $id)->first();
        
        if ($fund) {
            // Update the amount by adding current to the amount
            $fund->amount = $fund->amount + $fund->current;

            // Set current to 0
            $fund->current = 0;

            // Save the updated record
            $fund->save();
        }

        // Return a success response
        return response()->json([
            'status' => 1,
            'message' => 'Payment Completed successfully'
        ]);
    } catch (\Exception $e) {
        // Return an error response if the record could not be updated
        return response()->json([
            'status' => 0,
            'message' => 'Payment completion failed, Please try again later. Error: ' . $e->getMessage()
        ], 500);
    }
}


}

<?php

namespace App\Http\Controllers;
use App\Models\Donor;
use App\Models\User;
use Carbon\Carbon; 
use App\Models\Project;
use App\Models\ProjectDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Completion;


class ProjectDetailsController extends Controller
{

    public function getProjectDetails($id)
    {  
        
       $Id = Project::find($id); 
       $dataId= $Id->proId;
          
       $projectId = DB::table('projects')
       ->leftJoin('donors', 'donors.donor_id', '=', 'projects.donorName')
       ->leftJoin('users', 'users.id', '=', 'projects.projectManager')
       ->leftJoin('project_details', 'project_details.proId', '=', 'projects.proId')
       ->leftjoin('documents','documents.proId','=','project_details.proId')
       ->select(
           'project_details.proId',
           'project_details.stage1_status',
           'project_details.stage2_status',
           'project_details.stage3_status',
           'project_details.stage4_status',
           'project_details.stage5_status',
           'project_details.stage6_status',
           'project_details.applicantId',
           'projects.proId as project_id',
           'users.name',
           'donors.partner_name',
           'projects.projectID',
           'projects.agencyProjectNo',
           'projects.availableBudget',
           'projects.typeOfProject',
           'projects.remarks',
           'documents.*',
       )
       ->where('projects.proId', '=', $dataId)
       ->first();
   
       $applicantDetails = DB::table('project_details')
       ->where('project_details.proId','=',$dataId)
       ->pluck('project_details.applicantId'); 

       $appdetEC = null;
       $appdetOC = null;
       $appdetSW = null;
       $appdetCC = null;
       if (str_contains($applicantDetails, 'EC'))
        {
 
            $appdetEC = DB::table('education_centres')->where('applicationId',$applicantDetails)->first();
        }
        elseif(str_contains($applicantDetails, 'OC'))
        {
            $appdetOC = DB::table('markaz_orphan_cares')->where('applicationId',$applicantDetails)->first();
        }
        elseif(str_contains($applicantDetails, 'SW'))
        {
            $appdetSW = DB::table('sweet_water_projects')->where('applicationId',$applicantDetails)->first(); 
        }
        elseif(str_contains($applicantDetails, 'CC'))
        {    
            
           
                $appdetCC = DB::table('cultural_centres')
                    ->where('applicationId', $applicantDetails) // Parameter binding
                    ->first();
            } 
           
        
      
        
    

       if(!$projectId) {
        $stage1Status = null; // or whatever default value you prefer
        $stage2Status =null; 
        $stage3Status =null;
        $stage4Status =null;
        $stage5Status =null;
        $stage6Status = null;
        $applicantId =null;
    } else {
        $stage1Status = $projectId->stage1_status; // safely access the property
        $stage2Status = $projectId->stage2_status;
        $stage3Status = $projectId->stage3_status;
        $applicantId = $projectId->applicantId;
        $stage4Status = $projectId->stage4_status;
        $stage5Status =$projectId->stage5_status;
        $stage6Status =$projectId->stage6_status;
    }    

    $com =DB::table('completions')
->join('project_details','project_details.proId','=','completions.proId')
->select('completions.*')
->first();

if(!$com)
{
    $com=null;
}

        return view('admin.project_details',compact('projectId','stage1Status','stage2Status','appdetOC','appdetEC','appdetSW','appdetCC','stage3Status','applicantId','stage4Status','stage5Status','com','stage6Status'));
    } 

    
public function doProjectDetails(Request $request)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'proId' => 'required|exists:projects,proId',  
       
    ]);
    // Return validation errors if validation fails
    if ($validator->fails()) {
        return response()->json([
            'status' => 0,
            'errors' => $validator->errors()
        ], 422);
    }

    try {
        // Check if the user is authenticated
        $user = Auth::user()->id;
        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'User not authenticated.'
            ], 401);
        }

        // Map project types to their codes
       
        // Prepare data for insertion
        $data = [
            'proId' =>$request->input('proId'), 
            'userId' =>$user,          
        ];

        // Insert the project details into the database
        DB::table('project_details')->insert($data);

        return response()->json([
            'status' => 1,
            'message' => 'Project Details verified successfully.',
             ]);
    } catch (\Exception $e) {
        // Log the exception message for debugging
        \Log::error('Project Detail Missing: ' . $e->getMessage());

        // Return an error response in case of exception
        return response()->json([
            'status' => 2,
            'message' => 'Failed to verify project details. Please try again later.'
        ], 500);
    }
}
 
public function projectApproval(Request $request,$proId)
{
   

    // Check if the user has the right role (role ID 2)
    if (Auth::user()->role != 2) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    // Find the project detail using the project ID
    $projectDetail = ProjectDetail::where('proId', $proId)->first();
    if ($projectDetail) {
        // Update status
        $projectDetail->stage1_status = 2; // Approved
        $projectDetail->save();

        return response()->json(['message' => 'Project approved successfully!']);
    }

    return response()->json(['message' => 'Project not found.'], 404);
}


public function viewProjectDetails($id)
{
    $proj = DB::table('project_details')->where('proId',$id)->get();
   
    return view('admin.stages.details',compact('proj'));
} 
public function applicantApprove(Request $request, $proId)
{
    if (Auth::user()->role != 2) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    // Find the project detail using the project ID
    $projectDetail = ProjectDetail::where('proId', $proId)->first();

    if ($projectDetail) {
        // Update status
        $projectDetail->stage2_status = 2; // Approved
        $projectDetail->save();

        return response()->json(['message' => 'Applicant approved successfully!']);
    }

    return response()->json(['message' => 'Project not found.'], 404);
}

public function download(Request $request)
{
    $documentId = $request->input('id');
    $documentType = $request->input('type');

    // Fetch the document path based on the document ID and type
    $document = Document::find($documentId); // Replace with your model

    if ($document && !empty($document->$documentType)) {
        // Use public_path() to ensure correct file path
        $filePath = base_path(str_replace('\\', '/', $document->$documentType));

        // Log the resolved file path for debugging
        \Log::info('Resolved file path: ' . $filePath);

        // Check if the file exists
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['message' => 'File not found on the server'], 404);
        }
    }


    return response()->json(['message' => 'File not found'], 404);
} 

//files approval by coo
public function fileApproval(Request $request,$proId)
{
     // Check if the user has the right role (role ID 2)
     if (Auth::user()->role != 2) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    // Find the project detail using the project ID
    $projectDetail = ProjectDetail::where('proId', $proId)->first();
    if ($projectDetail) {
        // Update status
        $projectDetail->stage3_status = 2; // Approved
        $projectDetail->save();

        return response()->json(['message' => 'Files approved successfully!']);
}


} 

public function fundAllocatedView()
{
    $details = DB::table('funds')
    ->join('inputs','inputs.inputId','=','funds.input')
    ->join('project_details','project_details.proId','=','funds.proId')
    ->join('projects','projects.proId','=','funds.proId')
    ->select('inputs.inputName as input','funds.fundId','funds.amount','funds.unit','funds.utilized','funds.current','funds.balance','project_details.applicantId','projects.projectID')
    ->get();
    $totalRecords = count( $details); // Total records in your data source
    $filteredRecords = count( $details); // Number of records after applying filters

    return response()->json(['draw' => request()->get('draw'),
                            'recordsTotal' => $totalRecords,
                             'recordsFiltered' => $filteredRecords,
                              'data' =>  $details]);
    return response()->json(['error' => 'Invalid request'], 400);
}  


//files approval by coo
public function fundApproval(Request $request,$proId)
{
     // Check if the user has the right role (role ID 2)
     if (Auth::user()->role != 2) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    // Find the project detail using the project ID
    $projectDetail = ProjectDetail::where('proId', $proId)->first();
    if ($projectDetail) {
        // Update status
        $projectDetail->stage4_status = 2; // Approved
        $projectDetail->save();

        return response()->json(['message' => 'Fund Allocation approved successfully!']);
}


}  

public function viewImplementation() 
{
    $data = DB::table('funds')
    ->join('bills', 'bills.fundId', '=', 'funds.fundId')
    ->select('bills.billId','funds.input', 'funds.amount', 'funds.utilized', 'funds.current', 'funds.balance')
    ->get();

    
    $totalRecords = count( $data); // Total records in your data source
    $filteredRecords = count( $data); // Number of records after applying filters

    return response()->json(['draw' => request()->get('draw'),
                            'recordsTotal' => $totalRecords,
                             'recordsFiltered' => $filteredRecords,
                              'data' =>  $data]);
    return response()->json(['error' => 'Invalid request'], 400);

    
} 

public function billApprove(Request $request,$proId)
{
   // Check if the user has the right role (role ID 2)
   if (Auth::user()->role != 2) {
    return response()->json(['message' => 'Unauthorized'], 403);
}

// Find the project detail using the project ID
$projectDetail = ProjectDetail::where('proId', $proId)->first();
if ($projectDetail) {
    // Update status
    $projectDetail->stage5_status = 2; // Approved
    $projectDetail->save();

    return response()->json(['message' => 'Bill approved successfully!']);

} 
} 

public function approveCompletion(Request $request,$proId)
{
     // Check if the user has the right role (role ID 2)
   if (Auth::user()->role != 2) {
    return response()->json(['message' => 'Unauthorized'], 403);
}

// Find the project detail using the project ID
$projectDetail = ProjectDetail::where('proId', $proId)->first();
if ($projectDetail) {
    // Update status
    $projectDetail->stage6_status = 2; // Approved
    $projectDetail->save();

    return response()->json(['message' => 'Completion approved successfully!']);

}



}
public function downloadFile(Request $request)
{
    $documentId = $request->input('id');
    $documentType = $request->input('type');

    // Fetch the document path based on the document ID and type
    $document = Completion::find($documentId); // Replace with your model

    if ($document && !empty($document->$documentType)) {
        // Use public_path() to ensure correct file path
        $filePath = base_path(str_replace('\\', '/', $document->$documentType));

        // Log the resolved file path for debugging
        \Log::info('Resolved file path: ' . $filePath);

        // Check if the file exists
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['message' => 'File not found on the server'], 404);
        }
    }
}
}
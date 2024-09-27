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


class ProjectDetailsController extends Controller
{

    public function getProjectDetails($id)
    {  
        $projectId = Project::findOrFail($id);

        
        return view('admin.project_details',compact('projectId'));
    } 

    // public function getStage1($id)
    // {
    //     $projectId =Project::find($id);    
    //     $pro = $projectId->donorName;
    //     $donor = Donor::where('donor_id','=',$pro)->first();
    //     $donors =Donor::all(); 
    //     $man = $projectId->projectManager;
    //     $manager = User::where('id','=',$man)->first();
    //     $projectmanager = User::where('designation','=','Project Manager')->get();
      
       
    //     return view('admin.stages.stage1',compact('projectId','donor','donors', 'manager','projectmanager'));
    // } 
    // public function editProject($id)
    // {
    //     $project = DB::table('projects')
    //     ->join('donors','donors.donor_id','=','projects.donorName')
    //     ->join('users','users.id','=','projects.projectManager')
    //     ->select('projects.projectID','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.id as projectManager','donors.donor_id as donorName')
    //     ->where('projects.projectId','=',$id)
    //     ->first();      
    //     return response()->json($project);
   
    // }  
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
            'message' => 'Project Details created successfully.',
             ]);
    } catch (\Exception $e) {
        // Log the exception message for debugging
        \Log::error('Project Detail Missing: ' . $e->getMessage());

        // Return an error response in case of exception
        return response()->json([
            'status' => 2,
            'message' => 'Failed to create project details. Please try again later.'
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
        $projectDetail->stage1_status = 1; // Approved
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
    
}

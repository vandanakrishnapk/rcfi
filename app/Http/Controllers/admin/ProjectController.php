<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\User;
use Carbon\Carbon; 
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ProjectController extends Controller
{
    public function getProjects()
    {
        $donor = Donor::all();
        $projectmanager = User::where('designation','=','Project Manager')->get();
     

        $sweetCount = DB::table('projects')->where('typeOfProject','=','Sweet Water')->count();
        $general = DB::table('projects')->where('typeOfProject','=','General Project')->count();
       $markazCount = DB::table('odf_tables')->where('odf_tables.project_id', 'like', '%OC%')->count();
       $diffCount = DB::table('odf_tables')->where('odf_tables.project_id', 'like', '%DA%')->count();
       $famCount = DB::table('odf_tables')->where('odf_tables.project_id', 'like', '%FA%')->count();
     
    
   
        return view('admin.Projects',compact('donor','projectmanager','markazCount','sweetCount','diffCount','famCount','general'));
    } 

    public function doProject(Request $request)
    { 
        $validator = Validator::make($request->all(), [
        'agencyProjectNo' =>'required|string',
        'donorName' =>'required|exists:donors,donor_id',
        'projectManager' =>'required|exists:users,id',
        'availableBudget' =>'required|numeric',
        'typeOfProject' =>'required|string',
        'remarks' =>'nullable',        
    ], [ 
        'agencyProjectNo.required' => 'Agency Project Number is required',
        'donorName.required' => 'Donor Name is required',
        'projectManager.required' => 'Project Manager is required',
        'availableBudget.required' => 'Available budget is required',
        'typeOfProject.required' => 'Type of Project is required',
       
        
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 0,
            'errors' => $validator->errors()
        ]);
    }  
    $projectTypeMap = [
        'Markaz Orphan Care' => 'OC',
        'Education Centre' => 'EC',
        'Cultural Centre' => 'CC',
        'Sweet Water' => 'SW',
        'Differently Abled' =>'DA',
        'Family Aid' =>'FA',
        'General Project' =>'GP',
        'Hospitals or Clinics' =>'HC',
        'Drinking Water' =>'DW',
        'Shops and Other'=>'SO',
        'House' =>'HO',
    ];

    // Retrieve the project type from the request
    $typeOfProject = $request->input('typeOfProject');

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


    $data = [
        'projectID' =>$projectId,
        'agencyProjectNo' =>$request->input('agencyProjectNo'),
        'donorName' =>$request->input('donorName'),
        'projectManager' =>$request->input('projectManager'),
        'availableBudget' =>$request->input('availableBudget'),
        'typeOfProject' =>$request->input('typeOfProject'),
        'remarks' => $request->input('remarks'),
        'created_at' => Carbon::now(),  // Add current timestamp
        'updated_at' => Carbon::now(),

    ]; 
    if (DB::table('projects')->insert($data)) {
        return response()->json([
            'status' => 1,
            'message' => 'Project created successfully!',
        ]);
    } else {
        return response()->json([
            'status' => 2,
            'message' => 'Something went wrong!', 
        ]);
    }


    }  
    private function generateprojectId($projectCode)
    {
        // Get the current year
        $year = date('y'); // Get last two digits of the year

        // Generate a 5-digit unique number
        $latest = Project::max('proId'); // Assuming 'id' is an auto-incrementing primary key
        $uniqueNumber = str_pad(($latest + 1), 3, '0', STR_PAD_LEFT); // Increment ID and pad with zeros

        return "RCFI{$year}{$projectCode}{$uniqueNumber}";
    } 

    public function getProjectData(Request $request)
    {
        if ($request->ajax()) { 
            $data = DB::table('projects')
            ->join('donors','donors.donor_id','=','projects.donorName')
            ->join('users','users.id','=','projects.projectManager')
            ->select('projects.proId','projects.projectID','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.name as projectManager','donors.partner_name as donorName')
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

    public function projectViewMore($id) 
    {
        
        $project = DB::table('projects')
        ->join('donors','donors.donor_id','=','projects.donorName')
        ->join('users','users.id','=','projects.projectManager')
        ->select('projects.proId','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.name as projectManager','donors.partner_name as donorName')
        ->where('projects.proId','=',$id)
        ->first();
        if (!$project) {
            return response()->json(['error' => 'Project details not found'], 404);
        }
        return response()->json($project);
    } 

    public function editProject($id)
    {
        $project = DB::table('projects')
        ->join('donors','donors.donor_id','=','projects.donorName')
        ->join('users','users.id','=','projects.projectManager')
        ->select('projects.proId','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.id as projectManager','donors.donor_id as donorName')
        ->where('projects.proId','=',$id)
        ->first();      
        return response()->json($project);
   
    } 

    public function updateProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
        
            'agencyProjectNo' =>'required|string',
            'donorName' =>'required|exists:donors,donor_id',
            'projectManager' =>'required|exists:users,id',
            'availableBudget' =>'required|numeric',
            'typeOfProject' =>'required|string',
            'remarks' =>'nullable|string',        
        ], [ 
            'agencyProjectNo.required' => 'Agency Project Number is required',
            'donorName.required' => 'Donor Name is required',
            'projectManager.required' => 'Project Manager is required',
            'availableBudget.required' => 'Available budget is required',
            'typeOfProject.required' => 'Type of Project is required',
            'remarks.string' => 'Remarks should be a string',
            
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        } 
        try {
            // Find the existing record by ID
          // Retrieve the project instance
    $project = Project::findOrFail($request->input('proId'));

    // Update the project with validated data (excluding projectId)
    $project->update($validator->validated());

    return response()->json([
        'status' => 1,
        'message' => 'Project updated successfully.',
    ]);
        } catch (\Exception $e) {
            // Log the exception message for debugging
            \Log::error('Update Project Failed: '.$e->getMessage());
    
            // Return an error response in case of exception
            return response()->json([
                'status' => 0,
                'message' => 'Failed to update orphan care details. Please try again later.'
            ], 500);
        }
    } 

    public function deleteProject($id)
    {

        try {
            // Find the record by ID
            $project = Project::findOrFail($id);
    
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


}

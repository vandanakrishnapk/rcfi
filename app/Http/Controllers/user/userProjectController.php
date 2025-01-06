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
class userProjectController extends Controller
{

    public function getUserProject()
    {
       $donor = Donor::all();
       $projectmanager = User::where('designation','=','Project Manager')->get();    
       $sweetCount = DB::table('projects')->where('typeOfProject','=','Sweet Water')->count();       
       $general = DB::table('projects')->where('typeOfProject','=','General Project')->count();
       $markazCount = DB::table('odf_tables')->where('odf_tables.project_id', 'like', '%OC%')->count();
       $diffCount = DB::table('odf_tables')->where('odf_tables.project_id', 'like', '%DA%')->count();
       $famCount = DB::table('odf_tables')->where('odf_tables.project_id', 'like', '%FA%')->count();
       return view('user.project',compact('markazCount','sweetCount','diffCount','famCount','general'));
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
}

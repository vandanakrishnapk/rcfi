<?php

namespace App\Http\Controllers;

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
        return view('user.project');
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

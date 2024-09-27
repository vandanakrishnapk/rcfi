<?php

namespace App\Http\Controllers;
use App\Models\Donor;
use App\Models\User;
use Carbon\Carbon; 
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserProjectDetailsController extends Controller
{
    public function getProjectDetails()
    {  
        
        return view('user.project_details',compact('projectId'));
    } 
    public function getStage2($id)
    {
        $projectId =Project::find($id);
        $pro = $projectId->donorName;
        $donor = Donor::where('donor_id','=',$pro)->first();
        $donors =Donor::all(); 
        $man = $projectId->projectManager;
        $manager = User::where('id','=',$man)->first();
        $projectmanager = User::where('designation','=','Project Manager')->get();
        return view('user.stages.stage2',compact('projectId','donor','donors', 'manager','projectmanager'));
    } 
   
}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donor;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class userDisplayProjectController extends Controller
{
    
  
      public function sweet()
      {
          $donor = Donor::all();
          $projectmanager = User::where('designation','=','Project Manager')->get();
          return view('user.projects.sweet',compact('donor','projectmanager'));
      }
      public function getSweetProjectData(Request $request)
      {
          if ($request->ajax()) { 
              $data = DB::table('projects')
              ->join('donors','donors.donor_id','=','projects.donorName')
              ->join('users','users.id','=','projects.projectManager')
              ->select('projects.proId','projects.projectID','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.name as projectManager','donors.partner_name as donorName')
              ->where('projects.typeOfProject', 'Sweet Water')
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
    
    
      //orphan care
      public function orphancare()
      {
          $donor = Donor::all();
          $projectmanager = User::where('designation','=','Project Manager')->get();
          return view('user.projects.orphancare',compact('donor','projectmanager'));
      } 
    
      public function getOrphanCareProjectData(Request $request)
      {
          if ($request->ajax()) { 
              $data = DB::table('projects')
              ->join('donors','donors.donor_id','=','projects.donorName')
              ->join('users','users.id','=','projects.projectManager')
              ->select('projects.proId','projects.projectID','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.name as projectManager','donors.partner_name as donorName')
              ->where('projects.typeOfProject', 'Markaz Orphan Care')
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
    
      //differently abled 
    
      public function diffabled()
      {
          $donor = Donor::all();
          $projectmanager = User::where('designation','=','Project Manager')->get();
          return view('user.projects.diffabled',compact('donor','projectmanager'));
      }
      public function getDiffabledProjectData(Request $request)
      {
          if ($request->ajax()) { 
              $data = DB::table('projects')
              ->join('donors','donors.donor_id','=','projects.donorName')
              ->join('users','users.id','=','projects.projectManager')
              ->select('projects.proId','projects.projectID','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.name as projectManager','donors.partner_name as donorName')
              ->where('projects.typeOfProject', 'Differently Abled')
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
      
      public function familyaid()
      {
          $donor = Donor::all();
          $projectmanager = User::where('designation','=','Project Manager')->get();
          return view('user.projects.familyaid',compact('donor','projectmanager'));
      }
    public function getfamilyaidProjectData(Request $request)
    {
      if ($request->ajax()) { 
          $data = DB::table('projects')
          ->join('donors','donors.donor_id','=','projects.donorName')
          ->join('users','users.id','=','projects.projectManager')
          ->select('projects.proId','projects.projectID','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.name as projectManager','donors.partner_name as donorName')
          ->where('projects.typeOfProject', 'Family Aid')
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
    
    public function general()
    {
      $donor = Donor::all();
      $projectmanager = User::where('designation','=','Project Manager')->get();
      return view('user.projects.general',compact('donor','projectmanager'));
    }
    //general project
    public function getgeneralProjectData(Request $request)
    {
      if ($request->ajax()) { 
          $data = DB::table('projects')
          ->join('donors','donors.donor_id','=','projects.donorName')
          ->join('users','users.id','=','projects.projectManager')
          ->select('projects.proId','projects.projectID','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.name as projectManager','donors.partner_name as donorName')
          ->where('projects.typeOfProject', 'General Project')
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
    //Construction Projects 
    //Education centre
    
    public function education()
    {
      $donor = Donor::all();
      $projectmanager = User::where('designation','=','Project Manager')->get();
      return view('user.projects.education',compact('donor','projectmanager'));
    }
    //education project
    public function geteducationProjectData(Request $request)
    {
      if ($request->ajax()) { 
          $data = DB::table('projects')
          ->join('donors','donors.donor_id','=','projects.donorName')
          ->join('users','users.id','=','projects.projectManager')
          ->select('projects.proId','projects.projectID','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.name as projectManager','donors.partner_name as donorName')
          ->where('projects.typeOfProject', 'Education Centre')
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
    //cultural Project 
    public function cultural()
    {
      $donor = Donor::all();
      $projectmanager = User::where('designation','=','Project Manager')->get();
      return view('user.projects.cultural',compact('donor','projectmanager'));
    }
    
    public function getculturalProjectData(Request $request)
    {
      if ($request->ajax()) { 
          $data = DB::table('projects')
          ->join('donors','donors.donor_id','=','projects.donorName')
          ->join('users','users.id','=','projects.projectManager')
          ->select('projects.proId','projects.projectID','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.name as projectManager','donors.partner_name as donorName')
          ->where('projects.typeOfProject', 'Cultural Centre')
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
    //hospital 
    public function hospital()
    {
      $donor = Donor::all();
      $projectmanager = User::where('designation','=','Project Manager')->get();
      return view('user.projects.hospital',compact('donor','projectmanager'));
    }
    
    public function gethospitalProjectData(Request $request)
    {
      if ($request->ajax()) { 
          $data = DB::table('projects')
          ->join('donors','donors.donor_id','=','projects.donorName')
          ->join('users','users.id','=','projects.projectManager')
          ->select('projects.proId','projects.projectID','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.name as projectManager','donors.partner_name as donorName')
          ->where('projects.typeOfProject', 'Hospitals or Clinics')
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
    //shops and others
    public function shops()
    {
      $donor = Donor::all();
      $projectmanager = User::where('designation','=','Project Manager')->get();
      return view('user.projects.shops',compact('donor','projectmanager'));
    }
    
    public function getshopsProjectData(Request $request)
    {
      if ($request->ajax()) { 
          $data = DB::table('projects')
          ->join('donors','donors.donor_id','=','projects.donorName')
          ->join('users','users.id','=','projects.projectManager')
          ->select('projects.proId','projects.projectID','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.name as projectManager','donors.partner_name as donorName')
          ->where('projects.typeOfProject', 'Shops and Other')
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
    //house projects
    
    public function house()
    {
      $donor = Donor::all();
      $projectmanager = User::where('designation','=','Project Manager')->get();
      return view('user.projects.house',compact('donor','projectmanager'));
    }
    
    public function gethouseProjectData(Request $request)
    {
      if ($request->ajax()) { 
          $data = DB::table('projects')
          ->join('donors','donors.donor_id','=','projects.donorName')
          ->join('users','users.id','=','projects.projectManager')
          ->select('projects.proId','projects.projectID','projects.agencyProjectNo','projects.availableBudget','projects.typeOfProject','projects.remarks','users.name as projectManager','donors.partner_name as donorName')
          ->where('projects.typeOfProject', 'House')
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
    


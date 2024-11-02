<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
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
use App\Models\Fund;
use App\Models\Completion;
use App\Models\Bill;
use App\Notifications\UtilizedUpdated;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class ProjectDetailsController extends Controller
{

    public function getProjectDetails($id)
    {  
        
       $Id = Project::find($id); 
       $dataId= $Id->proId;
       Session::put('dataId', $dataId);
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
       $appdetDA=null;
       $appdetFA=null;
       $appdetGP =null;
       $appdetHC =null;
       $appdetSO =null;
       $appdetHO =null;
       $requiredKeys=null;
  
       if (str_contains($applicantDetails, 'EC'))
        {
 
            $appdetEC = DB::table('education_centres')->where('applicationId',$applicantDetails)->first();
            $requiredKeys = [
                'applicantName', 'committeeName', 'regNumber', 'year', 'location', 'village', 'post',
                'panchayath', 'district', 'state', 'contact1', 'contact2', 'submittedApplication',
                'financialSupport', 'mahalluName', 'mahalluLocation', 'mahalluVillage', 'mahalluDistrict',
                'mahalluState', 'noOfFamiliesInMahallu', 'requirementRepairing', 'proposedSiteBuilding',
                'currentBuildingStatus', 'studentsNumber', 'boysNumber', 'girlsNumber', 'educationCenterNearby',
                'culturalCentreDistance', 'syllabus', 'projectType', 'buildingArea', 'landArea',
                'classroomsNumber', 'numberOfStudents', 'proposedBudget', 'legalApprovals', 'area'
            ];
        }
        elseif(str_contains($applicantDetails, 'OC'))
        {
            $appdetOC = DB::table('markaz_orphan_cares')->where('applicationId',$applicantDetails)->first();
            $requiredKeys = [
                'nameOfOrphan', 'nameOfFather', 'nameOfGrandFather', 'nameOfMother', 'nameOfMothersFather',
                'maleOrFemale', 'dateOfBirth', 'age', 'aadharNumber', 'nameOfPresentGuardian', 'relationWithOrphan',
                'dateOfDeathOfFather', 'causeOfDeath', 'motherAliveOrNot', 'motherDateOfDeath', 'motherCauseOfDeath',
                'motherReMarriedOrNot', 'noOfBrothersAndSisters', 'maleSiblings', 'femaleSiblings', 'monthlyIncome',
                'monthlyExpense', 'typeOfHouse', 'nameOfSchool', 'classSchool', 'nameOfMadrassa', 'classMadrassa',
                'notStudyReason', 'healthStatus', 'sponsershipDetails', 'houseName', 'place', 'town', 'postOffice',
                'district', 'state', 'pinCode', 'mobile1', 'mobile2',
            ];
        }
        elseif(str_contains($applicantDetails, 'SW'))
        {
            $appdetSW = DB::table('sweet_water_projects')->where('applicationId',$applicantDetails)->first(); 
            $requiredKeys = [
                'applicantName', 'location', 'address', 'village', 'post', 'panchayath', 'district',
                'state', 'pin', 'contact1', 'contact2', 'beneficiaries', 'noOfBenefitedPeople',
                'totalMale', 'totalFemale', 'jobOfApplicant', 'averageMonthlyIncome', 'ownerOfLand',
                'addressOfLandOwner', 'place', 'postLandOwner', 'panchayathLandOwner', 'districtLandOwner',
                'mobileLandOwner', 'typeOfWell', 'expectedDepth', 'diameter', 'budgetEstimated',
                'natureOfLand', 'currentWaterSource', 'needElectricPump', 'usedForAgriculture'
            ];
        }
        elseif(str_contains($applicantDetails, 'CC'))
        {    
            
           
                $appdetCC = DB::table('cultural_centres')
                    ->where('applicationId', $applicantDetails) // Parameter binding
                    ->first();
                    $requiredKeys = [
                        'applicantName', 'committeeName', 'regNumber', 'year', 'location', 'village', 'post',
                        'panchayath', 'district', 'state', 'contactNumber1', 'contactNumber2', 'submittedBefore',
                        'receivedSupport', 'mahalluName', 'mahalluLocation', 'mahalluVillage', 'mahalluDistrict',
                        'mahalluState', 'noOfFamilies', 'requirement', 'hasBuilding', 'buildingStatus',
                        'culturalCenter', 'distanceToCulturalCenter', 'benefitedHouseholds', 'projectType',
                        'buildingArea', 'landArea', 'proposedBudget', 'proposedBeneficiary', 'legalApprovals', 'area'
                    ];
    
        } 
        elseif(str_contains($applicantDetails,'DA'))
        {
            $appdetDA = DB::table('differently_abled')
            ->where('applicationId', $applicantDetails) // Parameter binding
            ->first();

            $requiredKeys = [
                'applicant_name', 'father_name', 'fathers_father', 'mother_name', 'gender',
                'aadhaar_number', 'date_of_birth', 'age', 'marital_status', 'guardian',
                'relationship', 'total_members', 'male_members', 'female_members', 
                'people_with_disabilities', 'monthly_income', 'monthly_cost', 
                'source_of_income', 'studying_institution', 'reason_for_not_studying',
                'health_status', 'disability', 'disability_percentage', 
                'disability_date', 'disability_level', 'anyone_else_help', 
                'description', 'accommodation_details', 'house_name', 'place', 
                'panchayat', 'district', 'pincode', 'mobile'
            ];

        }
        elseif(str_contains($applicantDetails,'FA'))
        {
            $appdetFA = DB::table('families')
            ->where('applicationId', $applicantDetails) // Parameter binding
            ->first();
            $requiredKeys = [
                'name','father_name', 'mother_name',
                'father_grandfather',
                'dob',
                'age',
                'aadhaar_number',
                'house_name',
                'location',
                'po',
                'panchayat',
                'district',
                'pin_code',
                'mobile1',
                'mobile2',
                'children_count',
                'male_count',
                'female_count',
                'nri',
                'occupation',
                'monthly_income',
                'other_income',
                'health_status',
                'disability',
                'treatment_explanation',
                'chronic_patients',
                'residence_info',
                'own_house_condition',
                'own_place',
                'own_place_size',
                'sequel',
                'welfare_assistance'
            ];


        }
        elseif(str_contains($applicantDetails,'GP'))
        {
            $appdetGP = DB::table('general_projects')
            ->where('applicationId', $applicantDetails) // Parameter binding
            ->first();
            $requiredKeys = [
                'name',
                'age',
                'address',
                'ward',
                'po',
                'village',
                'panchayat',
                'block',
                'district',
                'state',
                'pin_code',
                'contact_1',
                'contact_2',
                'sex',
                'status',
                'education',
                'male_members',
                'female_members',
                'total_members',
                'earning_members',
                'average_income',
                'applying_for',
                'monthly_income',
                'recommended_by',
                'phone_number',
               'type_of_application',
            ];
            
            
                 

        }
        elseif(str_contains($applicantDetails,'HC'))
        {
            $appdetHC = DB::table('medicals')
            ->where('applicationId', $applicantDetails) // Parameter binding
            ->first();
            $requiredKeys = [
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
            }
            elseif(str_contains($applicantDetails,'SO'))
            {
                $appdetSO = DB::table('shops')
                ->where('applicationId', $applicantDetails) // Parameter binding
                ->first();
                $requiredKeys = [
                    'applicantName',
                    'committeeName',
                    'registerNumber',
                    'year',
                    'place',
                    'village',
                    'post',
                    'panchayat',
                    'district1',
                    'state1',
                    'mobileNumber1',
                    'mahalName',
                    'location',
                    'district2',
                    'state2',
                    'isBuildingCurrent',
                    'buildingArea',
                    'placeStreet',
                    'estimatedAmount',
                    'familiesBenefited',
                    'legalPermissions',
                    'typeApproved',
                    'area',
                    'numberOfRooms',
                ];
                
                 
                }
                elseif(str_contains($applicantDetails,'HO'))
                {
                    $appdetHO = DB::table('houses')
                    ->where('applicationId', $applicantDetails) // Parameter binding
                    ->first();
                    $requiredKeys = [
                        'name',
                        'age',
                        'fathersName',
                        'mothersName',
                        'houseName',
                        'location',
                        'panchayat',
                        'po',
                        'district',
                        'state',
                        'pinCode',
                        'mobile1',
                        'mobile2',
                        'applicant',
                        'education',
                        'married',
                        'childrenCount',
                        'maleChildren',
                        'femaleChildren',
                        'occupation',
                        'monthlyIncome',
                        'otherIncome',
                        'healthStatus',
                        'dailyTreatment',
                        'accommodation',
                        'ownPlace',
                        'measureOfLand',
                        'typeOfLand',
                        'desiredModel',
                        'totalSqrFt',
                        'expectedAmount',
                        'permission',
                        'formOfIntendedHouse',
                        'officeUse',
                    ];
                     
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
    ->where('project_details.proId','=',$dataId)
    ->first();

if(!$com)
{
    $com=null;
}
$notifications = Auth::user()->notifications; // Fetch notifications for the COO
if(!$notifications)
{
    $notifications=null;
}


     
$bills = Bill::where('proId', $dataId)->get();
$allCooApproved =null;
$allCooApproved = $bills->every(function ($bill)
{
    return $bill->coo_status === 1;
});


        return view('admin.project_details',compact('projectId','stage1Status','stage2Status','appdetOC','appdetEC','appdetSW','appdetCC','appdetCC','appdetDA','appdetFA','appdetGP','appdetHC','appdetSO','appdetHO','stage3Status','applicantId','stage4Status','stage5Status','com','stage6Status','notifications','requiredKeys','allCooApproved'));
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
    $dataId = Session::get('dataId'); 
    $details = DB::table('funds')
    ->join('inputs','inputs.inputId','=','funds.input')
    ->join('project_details','project_details.proId','=','funds.proId')
    ->join('projects','projects.proId','=','funds.proId')
    ->select('inputs.inputName as input','funds.fundId','funds.amount')
    ->where('funds.proId', $dataId)  
    ->get();
    $totalRecords = count( $details); // Total records in your data source
    $filteredRecords = count( $details); // Number of records after applying filters
    $totalAmount = $details->sum('amount');
    return response()->json(['draw' => request()->get('draw'),
                            'recordsTotal' => $totalRecords,
                             'recordsFiltered' => $filteredRecords,
                             'totalAmount' =>$totalAmount,
                              'data' =>  $details]);
    return response()->json(['error' => 'Invalid request'], 400);
}  



public function viewImplementation() 
{
    $dataId = Session::get('dataId'); 
    $data = DB::table('bills')
    ->leftjoin('funds', 'funds.fundId', '=', 'bills.fundId')
    ->leftjoin('project_details','project_details.proId','=','funds.proId')
    ->select('bills.billId', 'funds.fundId', 'funds.input', 'funds.amount','funds.current','project_details.stage5_status','project_details.proId','bills.pmt_status','funds.previous_current','funds.previous_updates','funds.remarks',
            'bills.hod_status','bills.fm_status','bills.coo_status','funds.utilized', DB::raw('funds.amount - funds.utilized as balance'))
    ->where('funds.proId', $dataId)  
    ->get();

 
    $totalRecords = count( $data); // Total records in your data source
    $filteredRecords = count( $data); // Number of records after applying filters
    $totalAmount = $data->sum('amount');
    $totalUtilized =$data->sum('utilized');
    $totalBalance = $data->sum('balance');

    return response()->json(['draw' => request()->get('draw'),
                            'recordsTotal' => $totalRecords,
                             'recordsFiltered' => $filteredRecords,
                              'data' =>  $data,
                              'totalAmount' => $totalAmount,
                              'totalUtilized' => $totalUtilized,
                              'totalBalance' => $totalBalance,
                            ]);
    return response()->json(['error' => 'Invalid request'], 400);

    
} 

//bill status completed or not 

// public function getCooBillStatus()
// {
//     $dataId = Session::get('dataId'); 
     
//       $bills = Bill::where('proId', $dataId)->get();

//       $allCooApproved = $bills->every(function ($bill)
//       {
//           return $bill->coo_status === 1;
//       });
//       if($allCooApproved)
//         {
//          return response()->json([
    
//         'Message' =>'Please verify all the bills has completed and make final approval'
//          ]);
//         }
    
//    } 
   public function getPieChart()
   {
       $dataId = Session::get('dataId'); 
       $data = Fund::where('proId',$dataId)->get();
       $totalAmount =$data->sum('amount');
       $totalUtilized = $data->sum('utilized');
       $totalBalance = $totalAmount -$totalUtilized;
       return response()->json(['totalAmount'=>$totalAmount,
                                'totalUtilized'=>$totalUtilized,
                                'totalBalance' =>$totalBalance]);
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
    $projectDetail->stage6_status = 3; // Approved
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

//update utilized 
public function editUtilized($id)
{
    $fund = Fund::findOrFail($id);
    return response()->json($fund);
} 

public function updateUtilized(Request $request, $id)
{
    $request->validate([
        'utilized' => 'required|numeric',
    ]);

    $fund = Fund::findOrFail($id);
    $fund->utilized = $request->utilized;
   $data = $fund->save();
   if($data)
   {
    $fund->current =0;
    $fund->save();
   }
    $projectManagers = User::where('role', 3)->get();

    // Send notification
    Notification::send($projectManagers, new UtilizedUpdated($fund));

    return response()->json(['message' => "Utilized updated"]);
}   
public function markAsRead($notificationId)
{
    $notification = Auth::user()->notifications()->find($notificationId);
    if ($notification) {
        $notification->markAsRead();
    }

    return back(); // Redirect back to the previous page
}

public function materialsApprovalHod(Request $request,$fundId)
{

    // Find the project detail using the project ID
    $bill = Bill::where('fundId', $fundId)->first();
    
    if (!$bill) {
        return response()->json(['message' => 'Bill not found.'], 404);
    }

    // Update status
    $bill->hod_status = 1; // Approved
    $bill->save();
        return response()->json(['message' => 'Material approved successfully by HOD!']);
}

public function materialsApprovalCoo(Request $request,$fundId)
{

    // Find the project detail using the project ID
    $bill = Bill::where('fundId', $fundId)->first();
    
    if (!$bill) {
        return response()->json(['message' => 'Bill not found.'], 404);
    }

    // Update status
    $bill->coo_status = 1; // Approved
    $bill->save();
        return response()->json(['message' => 'Material approved successfully by COO!']);
}

}
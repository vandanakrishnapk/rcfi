<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\User;
use Carbon\Carbon; 
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use App\Models\Input;
use App\Models\Fund;
use App\Models\Bill;
use App\Models\Completion;
use App\Notifications\CurrentValueUpdated; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Response;
class UserProjectDetailsController extends Controller
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
            'projects.projectManager',
            'projects.agencyProjectNo',
            'projects.availableBudget',
            'projects.typeOfProject',
            'projects.remarks',
            'documents.*',

        )
        ->where('project_details.proId', '=', $dataId)
        ->first();

        if (!$projectId) {
            return redirect()->back()->withErrors('The project is not approved yet');
        }
    
    $stage1Status = $projectId->stage1_status ?? null;
    $stage2Status = $projectId->stage2_status ?? null;
    $stage3Status = $projectId->stage3_status ?? null;
    $stage4Status = $projectId->stage4_status ?? null;
    $stage5Status = $projectId->stage5_status ?? null;
    $stage6Status = $projectId->stage6_status ?? null;
    $applicantId = $projectId->applicantId ?? null;  
     

// Step 1: Fetch project IDs related to the given project
$applicantProjectIDs = DB::table('projects')
    ->join('project_details', 'project_details.proId', '=', 'projects.proId')
    ->where('project_details.proId','=',$dataId)
    ->pluck('projects.projectID'); // Use pluck to get an array of projectIDs 

// Step 2: Initialize a variable to hold applicant IDs
$applicants = collect();

// Step 3: Check if there are any project IDs
// Log all project IDs

foreach ($applicantProjectIDs as $id) {
    if (str_contains($id, 'EC') && $applicants->isEmpty()) {
        $applicants = DB::table('education_centres')->pluck('applicationId');
        \Log::info('Fetched EC applicants: ', $applicants->toArray());
        break; // Stop after finding the first match
    } elseif (str_contains($id, 'OC') && $applicants->isEmpty()) {
        $applicants = DB::table('markaz_orphan_cares')->pluck('applicationId');
        \Log::info('Fetched OC applicants: ', $applicants->toArray());
        break; // Stop after finding the first match
    } elseif (str_contains($id, 'SW') && $applicants->isEmpty()) {
        $applicants = DB::table('sweet_water_projects')->pluck('applicationId');
        \Log::info('Fetched SW applicants: ', $applicants->toArray());
        break; // Stop after finding the first match
    } elseif (str_contains($id, 'CC') && $applicants->isEmpty()) {
        $applicants = DB::table('cultural_centres')->pluck('applicationId');
        \Log::info('Fetched CC applicants: ', $applicants->toArray());
        break; // Stop after finding the first match
    }
    elseif (str_contains($id, 'DA') && $applicants->isEmpty()) {
        $applicants = DB::table('differently_abled')->pluck('applicationId');
        \Log::info('Fetched DA applicants: ', $applicants->toArray());
        break; // Stop after finding the first match
    }
    elseif (str_contains($id, 'FA') && $applicants->isEmpty()) {
        $applicants = DB::table('families')->pluck('applicationId');
        \Log::info('Fetched DA applicants: ', $applicants->toArray());
        break; // Stop after finding the first match
    }
    elseif (str_contains($id, 'GP') && $applicants->isEmpty()) {
        $applicants = DB::table('general_projects')->pluck('applicationId');
        \Log::info('Fetched DA applicants: ', $applicants->toArray());
        break; // Stop after finding the first match
    }
    elseif (str_contains($id, 'HC') && $applicants->isEmpty()) {
        $applicants = DB::table('medicals')->pluck('applicationId');
        \Log::info('Fetched DA applicants: ', $applicants->toArray());
        break; // Stop after finding the first match
    }
    elseif (str_contains($id, 'SO') && $applicants->isEmpty()) {
        $applicants = DB::table('shops')->pluck('applicationId');
        \Log::info('Fetched DA applicants: ', $applicants->toArray());
        break; // Stop after finding the first match
    }
    elseif (str_contains($id, 'HO') && $applicants->isEmpty()) {
        $applicants = DB::table('houses')->pluck('applicationId');
        \Log::info('Fetched DA applicants: ', $applicants->toArray());
        break; // Stop after finding the first match
    }
}

$inputs = DB::table('inputs')->get();

if(!$inputs)
{
    $inputs=null;
}
$com =DB::table('completions')
->join('project_details','project_details.proId','=','completions.proId')
->select('completions.*')
->where('completions.proId', $dataId)
->first();

if(!$com)
{
    $com=null;
}

// $notifications = Auth::user()->notifications; // Fetch notifications for the COO
// if(!$notifications)
// {
//     $notifications=null;
// }

//display applicant details to all 
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
 

 



        return view('user.project_details',compact('projectId','stage1Status','stage2Status','applicants','stage3Status','stage4Status','inputs','stage5Status','stage6Status','applicantId','com','requiredKeys','appdetOC','appdetEC','appdetSW','appdetCC','appdetCC','appdetDA','appdetFA','appdetGP','appdetHC','appdetSO','appdetHO'));
    } 
    

    public function submitApplicant(Request $request)
    {      
    
        $request->validate([
            'applicantId' => 'required|string',         
        ]);      
           // Adjust as necessary based on your table structure
        $data =    DB::table('project_details')
            ->where('proId', $request->proId) // Add the where condition
            ->update([
                'applicantId' => $request->applicantId, 
                'stage2_status' => 1,          
                'created_at' => now(),
                'updated_at' => now(),
            ]); 
         
        return response()->json(['message' => 'Applicant submitted successfully.']);
        
    
        return response()->json(['error' => 'Project not found'], 404);
    } 


    public function submitDocuments(Request $request)
{
    // Validate request inputs
    $validator = Validator::make($request->all(), [
      
        'land_document' => 'nullable|file|mimes:pdf|max:2048',
        'possession_certificate' => 'nullable|file|mimes:pdf|max:2048',
        'recommendation_letter' => 'nullable|file|mimes:pdf|max:2048',
        'committee_minutes' => 'nullable|file|mimes:pdf|max:2048',
        'permit_copy' => 'nullable|file|mimes:pdf|max:2048',
        'plan' => 'nullable|file|mimes:pdf|max:2048',
        'tender_schedule_sheet' => 'nullable|file|mimes:pdf|max:2048',
        'site_study' => 'nullable|file|mimes:pdf|max:2048',
        'quotations' => 'nullable|file|mimes:pdf|max:2048',
        'quotations_approval_form' => 'nullable|file|mimes:pdf|max:2048',
        'work_order_letter' => 'nullable|file|mimes:pdf|max:2048',
        'meeting_minutes_copy' => 'nullable|file|mimes:pdf|max:2048',
        'agreement_with_contractor' => 'nullable|file|mimes:pdf|max:2048',
        'agreement_with_committee' => 'nullable|file|mimes:pdf|max:2048',
        'project_summary_form' => 'nullable|file|mimes:pdf|max:2048',
    ], [
        'mimes' => 'The :attribute must be a PDF File',
        'max' => 'The :attribute must not be greater than 2MB.',
       
    ]);

    // Check for validation errors
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

  
    $last_reg_num = 0;
    
    // Get the last project ID
    $getLastID = DB::table('project_details')->select('applicantId')->where('proId', '=', $request->proId)->first();
    
    if ($getLastID) {
        // Extract the last 5 characters and ensure they are treated as an integer
        $last_reg_num = substr($getLastID->applicantId, -9); // Convert to integer
    } else {
        $last_reg_num = 0; // Default to 0 if no ID is found
    }
    
    // Increment the registration number
  // Format the incremented number
    $application_no = 'APLRCFI' . $last_reg_num;
    
    // Output the application number for debugging
  

    // Prepare data for updating
    $documentFields = [
        'land_document',
        'possession_certificate',
        'recommendation_letter',
        'committee_minutes',
        'permit_copy',
        'plan',
        'tender_schedule_sheet',
        'site_study',
        'quotations',
        'quotations_approval_form',
        'work_order_letter',
        'meeting_minutes_copy',
        'agreement_with_contractor',
        'agreement_with_committee',
        'project_summary_form',
    ];
    $randomNumber = rand(1000, 9999); 

    foreach ($documentFields as $field) {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = $application_no . '_' . $field .'_'.$randomNumber. '.' . $file->getClientOriginalExtension();
            $filePath = 'documents24'; // Set your desired path
            // Move the file to the designated location
            $file->move($filePath, $filename);
            // Store the file path for database entry
            $documentData[$field] =  $filename; // Adjust the path as needed
        }
    }

    // Create or update the document record
    $document = Document::updateOrCreate(
        ['proId' => $request->proId], // Condition to check for existing records
        $documentData // Data to insert or update
    );

    // Update the project_details table
    DB::table('project_details')->where('proId', $document->proId)
        ->update(['stage3_status' => 1]);

    return response()->json(['message' => 'Documents uploaded successfully!']);
}

  
    
 
    


    // Delete the document
    public function deleteDocument($id, $type)
    {
        // Fetch the document
        if (!in_array($type, ['land_document','possession_certificate','recommendation_letter','committee_minutes','permit_copy','plan','tender_schedule_sheet','site_study','quotations','quotations_approval_form','work_order_letter','meeting_minutes_copy','agreement_with_contractor','agreement_with_committee','project_summary_form'])) {
            return response()->json(['message' => 'Invalid document type.'], 400);
        }
    
        // Fetch the document
        $document = Document::where('documentId', $id)->firstOrFail();
        
        // Set the specific document field to null
        $document->$type = null; 
        $document->save();
    
        return response()->json(['message' => 'Document deleted successfully.']);
    } 


    
    public function download(Request $request)
{
    $documentId = $request->input('id');
    $documentType = $request->input('type');
    // Fetch the document path based on the document ID and type
    $document = Document::find($documentId); // Replace with your model

    if ($document && !empty($document->$documentType)) {
        // Use public_path() to ensure correct file path
        // $filePath = public_path(str_replace('\\', 'documents24/', $document->$documentType));
        $filePath = base_path('documents24/' . $document->$documentType);

        \Log::info('Document Type: ' . $documentType);
        \Log::info('File Path: ' . $filePath);
 

        // Check if the file exists
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['message' => 'File not found on the server'], 404);
        }
    }
} 

//do input 
public function doStage4Input(Request $request)
{
     // Validate the incoming request
     $request->validate([
   
        'inputName' => 'required|string|max:255',
    ]);

    // Create a new input record
    $input = new Input();
    $input->inputName = $request->inputName; // Assuming your model has a 'name' field
    $input->save();

    // Return a success response
    return response()->json(['success' => true, 'message' => 'Input added successfully.']);

} 

public function doFundAllocation(Request $request)
{
      // Define the validation rules
      $validator = Validator::make($request->all(), [
        'proId' =>'required|exists:project_details,proId',
        'input' => 'required|exists:inputs,inputId', // Validate input
        'amount' => 'required|numeric', // Validate amount

    ]);
   
    // Check if validation fails
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors() // Return errors
        ], 422); // HTTP status code for unprocessable entity
    }

  $data=  Fund::create([
        'proId' =>$request->proId,
        'input' =>$request->input,
        'amount' =>$request->amount,

      
    ]);
 

    if($data)
    {
        DB::table('project_details')->where('proId','=',$request->proId)->update([
            'stage4_status' =>1,
        ]);
    }
  
    // $formattedAmount = '₹' . number_format($request->amount, 2);
    // Return a success response
    return response()->json(['success' => true, 'message' => 'Material added successfully.', 
                             // Include the formatted amount
]);

} 


public function getFundAllocated()
{
    $dataId = Session::get('dataId'); 
    $details = DB::table('funds')
    ->join('inputs','inputs.inputId','=','funds.input')
    ->join('project_details','project_details.proId','=','funds.proId')
    ->join('projects','projects.proId','=','funds.proId')
    ->select('inputs.inputName as input','funds.fundId','funds.amount','funds.approval_status')
    ->where('funds.proId', $dataId)   
    ->get();
    $totalRecords = count( $details); // Total records in your data source
    $filteredRecords = count( $details); // Number of records after applying filters
    $totalAmount = $details->sum('amount');
    return response()->json(['draw' => request()->get('draw'),
                            'recordsTotal' => $totalRecords,
                             'recordsFiltered' => $filteredRecords,
                             'totalAmount' => $totalAmount,
                              'data' =>  $details]);
    return response()->json(['error' => 'Invalid request'], 400);
} 

public function editBill($id)
{
    $funds = Fund::findOrFail($id);
    return response()->json($funds);
 
}
public function updateFund(Request $request)
{
    $validator = Validator::make($request->all(), [
        'fundId' => 'exists:funds,fundId', // Ensure the fund exists
        'input' => 'exists:inputs,inputId',
        'amount' => 'numeric', 
        'remarks' =>  'string',
    
    ]);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
    }
 // Find the fund by ID
 $fund = Fund::findOrFail($request->fundId);
 $previousInputId = $fund->input;
    $previousInputName = DB::table('inputs')->where('inputId', $previousInputId)->value('inputName');

    // Get the current values to store as previous updates
    $previousUpdates = json_decode($fund->previous_updates, true) ?? [];
    
    // Add the current values to the previous updates array
    $previousUpdates[] = [
        'input_name' => $previousInputName, // Store the previous input name
        'amount' => $fund->amount,
        'updated_at' => now()->toDateString(), // Store only the date
    ];

 // Update the fund with new values
 $fund->input = $request->input;
 $fund->amount = $request->amount;
 $fund->previous_updates = json_encode($previousUpdates); // Store as JSON
$fund->remarks = $request->remarks;
 // Save the updated fund
 $fund->save();


    $proId = $request->proId;

    DB::table('project_details')->where('proId',$proId)->update(['stage4_status'=>1]);
         
    return response()->json(['success' => true, 'message' => 'Fund updated successfully.']);

        }
public function deleteFund($id)
{
    try {
        // Find the record by ID
        $fund = Fund::findOrFail($id)->delete();  

        // Return a success response
        return response()->json([
            'status' => 1,
            'message' => 'record deleted successfully!'
        ]);
    } catch (\Exception $e) {
        // Return an error response if the record could not be deleted
        return response()->json([
            'status' => 0,
            'message' => 'Failed to delete record. Please try again later.'
        ], 500);
    }

}

public function submitBill($id)
{
    $fund = Fund::findOrFail($id);
    $fundId = $fund->fundId;
    $proId = $fund->proId;
  // Check if a bill already exists with the same fundId
  $existingBill = Bill::where('fundId', $fundId)->first();
  if ($existingBill) {
      return response()->json([
          'status' => 0,
          'message' => 'This bill has already been submitted.'
      ], 400); // Return a 400 Bad Request status
  }

   $data= Bill::create([
        'fundId' =>$fundId,
        'proId'=>$proId,
    ]);
    if ($data) {
        DB::table('project_details')
            ->where('proId', $proId)
            ->update(['stage5_status' => 1]); // Corrected line
    }
    return response()->json([
        'status' => 1,
        'message' => 'Bill submited successfully!'
    ]);

}


public function getImplementationTable()
{  
    
    $dataId = Session::get('dataId'); 
    $details = DB::table('funds')
    ->leftjoin('bills', 'bills.fundId', '=', 'funds.fundId')
    ->leftjoin('inputs', 'inputs.inputId', '=', 'funds.input')
    ->leftjoin('project_details','project_details.proId','=','funds.proId')
    ->select('funds.fundId', 'inputs.inputName','funds.amount', 'funds.utilized', 'funds.current','funds.previous_current', 
             'bills.pmt_status', 'bills.hod_status', 'bills.fm_status', 'bills.coo_status','project_details.stage5_status','project_details.proId','funds.remarks',DB::raw('funds.amount - funds.utilized as balance'))
    ->where('funds.proId', $dataId)  // Use funds.proId instead
    ->get();


    $totalRecords = count($details);
    $filteredRecords = $totalRecords; // Update if you apply filters
    $totalAmount = $details->sum('amount');
    $totalUtilized =$details->sum('utilized');
    $totalBalance = $details->sum('balance');
 
    // Calculate balances for each record
    foreach ($details as $detail) {
        $detail->balance = $detail->amount - $detail->utilized;
    }
    
    return response()->json([
        'draw' => request()->get('draw'),
        'recordsTotal' => $totalRecords,
        'recordsFiltered' => $filteredRecords,
        'data' => $details,
        'totalAmount' => $totalAmount,
        'totalUtilized' => $totalUtilized,
        'totalBalance' => $totalBalance,
    ]);
}


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
    
//         'Message' =>'All The Bills are approved by project Engineer,HOD,Financial Manager and COO
//         And you Must need a final approval from coo,to switch on to  stage 6 ,'
//          ]);
//         }
    
//    }
 

public function requestCurrent($id)
{
    $fund = Fund::findOrFail($id);
    return response()->json($fund->toArray());
} 
public function updateCurrent(Request $request, $id)
{
    $dataId = Session::get('dataId');
    
    $request->validate([
        'current' => 'required|numeric',
    ]);

    $fund = Fund::findOrFail($id);
    
    // Check if the requested current exceeds the fund amount
    if ($request->current > $fund->amount) {
        \Log::info('Alert Message Set:', ['alert' => 'Requested current exceeds the maximum allowed amount.']);
        return response()->json(['message' => 'Requested current exceeds the maximum allowed amount.'], 422);
    }

    // Calculate total balance
    $total = Fund::where('proId', $dataId)->get();
    $total_balance = $total->sum('amount') - $total->sum('utilized');

    $pro = DB::table('project_details')->where('proId', $dataId)->first();
    
    // Check if current equals total balance
    if ($total_balance == $request->current) 
    {
        // Check project stage status
        if ($pro->stage6_status === 0 || $pro->stage6_status === 1 || $pro->stage6_status === 2) {
            DB::table('project_details')->where('proId', $dataId)->update(['stage6_status' => 1]);
            return response()->json(['message' => 'Please complete stage6 before you request the final bill.'], 403);
        } elseif($pro->stage6_status === 3) {
            $previousCurrent = $fund->current;
            $previousCurrents = json_decode($fund->previous_current, true) ?? [];
            $previousCurrents[] = [
                'current_value' => $previousCurrent,
                'updated_at' => now()->toDateString(),
            ];
    
            // Update the JSON column
            $fund->previous_current = json_encode($previousCurrents);
            $fund->current = $request->current;
    
            $fund->save();
            DB::table('project_details')->where('proId', $dataId)->update(['stage5_status' => 1,]);
     


               }

    }
    
    // Check if we can update
    if ($total_balance > $request->current) {
        $previousCurrent = $fund->current;
        $previousCurrents = json_decode($fund->previous_current, true) ?? [];
        $previousCurrents[] = [
            'current value' => $previousCurrent,
            'updated_at' => now()->toDateString(),
        ];

        // Update the JSON column
        $fund->previous_current = json_encode($previousCurrents);
        $fund->current = $request->current;

        $fund->save();
      } 

    // Fetch the input name associated with the fund
    $input = DB::table('funds')
        ->join('inputs', 'inputs.inputId', '=', 'funds.input')
        ->select('inputs.inputName')
        ->where('funds.fundId', $id)
        ->first();

    // Get users with roles 1 and 2
    $users = User::whereIn('role', [1, 2, 6])->get();

    // Ensure that $input is not null
    $inputName = $input ? $input->inputName : 'Unknown Input';

    // Notify all users with roles 1 and 2
 // Notify users only if the fund's proId matches the dataId
if ($fund->proId == $dataId) {
    foreach ($users as $user) {
        $user->notify(new CurrentValueUpdated($fund->current, $inputName));
    }
}


    return response()->json(['message' => "Current value updated and COO has been notified."]);
}



public function downloadFile(Request $request)
{
    $documentId = $request->input('id');
    $documentType = $request->input('type');

    // Fetch the document path based on the document ID and type
    $document = Completion::find($documentId); // Replace with your model
  
    if ($document && !empty($document->$documentType)) {
        // Use public_path() to ensure correct file path
        // $filePath = public_path(str_replace('\\', 'documents24/', $document->$documentType));
        $filePath = public_path('documents24/' . $document->$documentType);
        // Check if the file exists
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['message' => 'File not found on the server'], 404);
        }
    }
} 

public function completionStage(Request $request)
{
    // Validate the request with custom messages
    $validator = Validator::make($request->all(), [
        'completion_certificate' => 'nullable|file|mimes:pdf|max:2048',
        'photos.*' => 'file|mimes:jpg,png,jpeg|max:2048',
        'measurement_book' => 'nullable|file|mimes:pdf|max:2048',
        'total_amount' => 'nullable|numeric',
        'total_amount_paid_by_donor' => 'nullable|numeric',
        'community_contribution' => 'nullable|numeric',
        'any_other' => 'nullable|string',
        'geo_location' => 'nullable|string', // Assuming geo_location is stored as a string
        'proId' => 'required|integer', // Assuming there's a projects table
        'consumptional_sheet' => 'nullable|file|mimes:xlsx,xls,csv|max:4096'

    ], [
        'completion_certificate.mimes' => 'Completion certificate must be a PDF.',
        'measurement_book.mimes' => 'Measurement Book must be a PDF.',     
        'photos.max'=>'more than 2mb not allowed',
        'geo_location.required' => 'Geo location is required.',
        'consumptional_sheet.mimes' =>'Consumption sheet must be an Excel file',

    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Get the last project ID
    $getLastID = DB::table('project_details')->select('applicantId')->where('proId', '=', $request->proId)->first();
    $last_reg_num = $getLastID ? substr($getLastID->applicantId, -9) : 0;

    // Format the incremented number
    $application_no = 'APLRCFI' . $last_reg_num;
    $fileFields = ['completion_certificate', 'measurement_book','consumptional_sheet']; // Define individual file fields
    $documentData = [
        'completion_certificate' => null,
        'photo1' => null,
        'photo2' => null,
        'photo3' => null,
        'photo4' => null,
        'photo5' => null,
        'measurement_book' => null,
        'consumptional_sheet'=>null,
    ];
    
    // Handle individual file uploads
    foreach ($fileFields as $field) {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $randomNumber = rand(1000, 9999); // Generate a random number
    
            $filename = $application_no . '_' . $field . '_' . $randomNumber . '.' . $file->getClientOriginalExtension();
            $filePath = 'documents24'; // Desired path
    
            // Move the file to the designated location
            $file->move(public_path($filePath), $filename);
    
            // Store the file path for database entry
            $documentData[$field] = $filename; // Save filename
        }
    }
    
    // Handle photo uploads
    if ($request->hasFile('photos')) {
        $photos = $request->file('photos');
        foreach ($photos as $index => $photo) {
            if ($photo) {
                $randomNumber = rand(1000, 9999); // Generate a random number
                $filename = $application_no . '_photo' . ($index + 1) . '_' . $randomNumber . '.' . $photo->getClientOriginalExtension();
                $filePath = 'documents24'; // Desired path
    
                // Move the file to the designated location
                $photo->move(public_path($filePath), $filename);
    
                // Store the file path for database entry
                $documentData['photo' . ($index + 1)] = $filename; // Save filename
            }
        }
    }

    // Create a new record in the Completion model
    $document = Completion::create([
        'proId' => $request->proId,
        'completion_certificate' => $documentData['completion_certificate'],
        'photo1' => $documentData['photo1'],
        'photo2' => $documentData['photo2'],
        'photo3' => $documentData['photo3'],
        'photo4' => $documentData['photo4'],
        'photo5' => $documentData['photo5'],
        'measurement_book' => $documentData['measurement_book'],
        'consumptional_sheet' => $documentData['consumptional_sheet'],
        'total_amount' => $request->total_amount,
        'total_amount_paid_by_donor' => $request->total_amount_paid_by_donor,
        'community_contribution' => $request->community_contribution,
        'any_other' => $request->any_other,
        'geo_location' => $request->geo_location,
    ]);

    // Update the project_details table
    DB::table('project_details')->where('proId', $document->proId)
        ->update(['stage6_status' => 2]);

    return response()->json(['message' => 'Completion stage done successfully!']);
}
public function editCompletion($id)
{
    $data = Completion::findOrFail($id);
    return response()->json($data);
}

public function updateCompletion(Request $request)
{
    // Validate the request with custom messages
    $validator = Validator::make($request->all(), [
        'completion_certificate' => 'nullable|file|mimes:pdf|max:2048',
        'photos.*' => 'file|mimes:jpg,png,jpeg|max:2048',
        'measurement_book' => 'nullable|file|mimes:pdf|max:2048',
        'total_amount' => 'nullable|numeric',
        'total_amount_paid_by_donor' => 'nullable|numeric',
        'community_contribution' => 'nullable|numeric',
        'any_other' => 'nullable|string',
        'geo_location' => 'nullable|string', // Assuming geo_location is stored as a string
        'proId' => 'required|integer', // Assuming there's a projects table
        'consumptional_sheet' => 'nullable|file|mimes:xlsx,xls,csv|max:4096'

    ], [
        'completion_certificate.mimes' => 'Completion certificate must be a PDF.',
        'measurement_book.mimes' => 'Measurement Book must be a PDF.',     
        'photos.max'=>'more than 2mb not allowed',
        'geo_location.required' => 'Geo location is required.',
        'consumptional_sheet.mimes' =>'Consumption sheet must be an Excel file',

    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Get the last project ID
    $getLastID = DB::table('project_details')->select('applicantId')->where('proId', '=', $request->proId)->first();
    $last_reg_num = $getLastID ? substr($getLastID->applicantId, -9) : 0;

    // Format the incremented number
    $application_no = 'APLRCFI' . $last_reg_num;

    // Fields that are optional and can have files uploaded
    $fileFields = ['completion_certificate', 'measurement_book','consumptional_sheet']; 

    // Initialize an array to store updated document data
    $documentData = [];

    // Handle file uploads for the fields
    foreach ($fileFields as $field) {
        if ($request->hasFile($field)) {
            // If a file is uploaded, generate a filename and move the file
            $file = $request->file($field);
            $randomNumber = rand(1000, 9999);
            $filename = $application_no . '_' . $field . '_' . $randomNumber . '.' . $file->getClientOriginalExtension();
            $filePath = 'documents24';
            $file->move(public_path($filePath), $filename);

            // Add the new filename to the documentData array
            $documentData[$field] = $filename;
        }
    }

    // Handle photo uploads
    if ($request->hasFile('photos')) {
        $photos = $request->file('photos');
        foreach ($photos as $index => $photo) {
            if ($photo) {
                $randomNumber = rand(1000, 9999);
                $filename = $application_no . '_photo' . ($index + 1) . '_' . $randomNumber . '.' . $photo->getClientOriginalExtension();
                $filePath = 'documents24';
                $photo->move(public_path($filePath), $filename);
                $documentData['photo' . ($index + 1)] = $filename;
            }
        }
    }

    // Find the existing document record
    $document = Completion::where('proId', $request->proId)->first();

    if ($document) {
        // Only update fields that have changed (if they are not empty)
        $updateData = [];
        foreach ($documentData as $field => $newValue) {
            if (!empty($newValue)) {
                $updateData[$field] = $newValue; // Only add fields that have a new value
            }
        }

        // Update the document record with the new data
        $document->update($updateData);

        // Update other fields (non-file fields) like total_amount, geo_location, etc.
        $document->update([
            'total_amount' => $request->total_amount,
            'total_amount_paid_by_donor' => $request->total_amount_paid_by_donor,
            'community_contribution' => $request->community_contribution,
            'any_other' => $request->any_other,
            'geo_location' => $request->geo_location,
        ]);
    }

    // Update the project_details table
    DB::table('project_details')->where('proId', $request->proId)
        ->update(['stage6_status' => 2]);

    return response()->json(['message' => 'Completion stage updated successfully!']);
}






//files approval by Project Engineer
public function fundApproval(Request $request,$proId)
{
     // Check if the user has the right role (role ID 2)
     if (Auth::user()->role != 4) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    // Find the project detail using the project ID 

    $projectDetail = ProjectDetail::where('proId', $proId)->first();
    if ($projectDetail) {
        // Update status
        $projectDetail->stage4_status = 2; // Approved
        $projectDetail->save();

     $funds = Fund::where('proId',$proId)->get();
     // Loop through each fund and update the approval status
     foreach ($funds as $fund) {
        $fund->approval_status = 1; // Set to approved
        $fund->save(); // Save each fund
    }
        return response()->json(['message' => 'Fund Allocation approved successfully!']);
    }


}   

public function materialsApprovalPmt(Request $request,$fundId)
{

    // Find the project detail using the project ID
    $bill = Bill::where('fundId', $fundId)->first();
    
    if (!$bill) {
        return response()->json(['message' => 'Bill not found.'], 404);
    }

    // Update status
    $bill->pmt_status = 1; // Approved
    $bill->save();
        return response()->json(['message' => 'Material approved successfully by Project Engineer!']);

} 
public function materialsApprovalFm(Request $request,$fundId)
{

    // Find the project detail using the project ID
    $bill = Bill::where('fundId', $fundId)->first();
    
    if (!$bill) {
        return response()->json(['message' => 'Bill not found.'], 404);
    }

    // Update status
    $bill->fm_status = 1; // Approved
    $bill->save();
    return response()->json(['message' => 'Material approved successfully by Financial Manger!']);
} 

//update utilized 
public function editUtilized($id)
{
    $fund = Fund::findOrFail($id);
    return response()->json($fund->toArray());
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
   
    return response()->json(['message' => "Utilized updated"]);
}   
public function downloadPdf()
{
    $dataId = Session::get('dataId');
    $project  = DB::table('projects')
    ->leftJoin('donors', 'donors.donor_id', '=', 'projects.donorName')
    ->leftJoin('users', 'users.id', '=', 'projects.projectManager')
    ->leftJoin('project_details', 'project_details.proId', '=', 'projects.proId')
    ->leftjoin('documents','documents.proId','=','project_details.proId')  
    ->select(
        'project_details.applicantId',
        'users.name',
        'donors.partner_name',
        'projects.projectID',
        'projects.projectManager',
        'projects.agencyProjectNo',
        'projects.availableBudget',
        'projects.typeOfProject',
        'projects.remarks',
        'documents.*',
       )
    ->where('project_details.proId', '=', $dataId)
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
   
     $fund = DB::table('funds')
    ->leftJoin('inputs', 'inputs.inputId', '=', 'funds.input')
    ->select(
        'funds.proId',
        'inputs.inputName',
        'funds.amount',
        'funds.utilized',
        'funds.previous_current',
        'funds.previous_updates',
        DB::raw('funds.amount - funds.utilized as balance')
    )
    ->where('funds.proId', '=', $dataId)
    ->get();

// Calculate totals
$total_amount = $fund->sum('amount');
$total_utilized = $fund->sum('utilized');
$total_balance = $total_amount - $total_utilized;

$completion = DB::table('completions')->where('proId','=',$dataId)->first();
$documents = DB::table('documents')->where('proId','=',$dataId)->first();

   // Load the view with the data
   $pdf = PDF::loadView('pdf.projectdet', compact('project','fund','documents','total_amount', 'total_utilized', 'total_balance','completion','requiredKeys','appdetOC','appdetEC','appdetSW','appdetCC','appdetCC','appdetDA','appdetFA','appdetGP','appdetHC','appdetSO','appdetHO'));
   $generatedPdfPath = public_path('documents24/generated.pdf');
        $pdf->save($generatedPdfPath);

        $attachmentPath = null;
        if (!empty($completion->completion_certificate)) {
         $attachmentPath = public_path('documents24/'.$completion->completion_certificate);
        }

        $measurementBookPath = null;
        if (!empty($completion->measurement_book)) {
            $measurementBookPath = public_path('documents24/'.$completion->measurement_book);
        }
        

        $documentFields = [
            'land_document', 'possession_certificate', 'recommendation_letter', 'committee_minutes', 
            'permit_copy', 'plan', 'tender_schedule_sheet', 'site_study', 'quotations', 
            'quotations_approval_form', 'work_order_letter', 'meeting_minutes_copy', 
            'agreement_with_contractor', 'agreement_with_committee', 'project_summary_form',
        ];
    
        // Array to hold the document paths
        $documentPaths = [];
        foreach ($documentFields as $field) {
            // Check if the field is not null before adding it to the document paths
            if ($documents->$field) {
                $documentPath = base_path('documents24/' . $documents->$field);
                if (file_exists($documentPath)) {
                    $documentPaths[] = $documentPath;
                } else {
                    Log::error("File not found: " . $documentPath); // Log an error if the file doesn't exist
                }
            }
        }
    
        return $this->mergeAndDownloadPDFs($generatedPdfPath, $attachmentPath,$measurementBookPath,$documentPaths);
 
   }

   private function mergeAndDownloadPDFs($generatedPdfPath, $attachmentPath, $measurementBookPath,$documentPaths)
   {
       // Merge both PDFs (generated PDF and attached certificate)
       $mergedPdf = new \setasign\Fpdi\Fpdi();
   
       // Load the generated PDF
       $pageCount = $mergedPdf->setSourceFile($generatedPdfPath);
       for ($i = 1; $i <= $pageCount; $i++) {
           $tpl = $mergedPdf->importPage($i);
           $mergedPdf->AddPage();
           $mergedPdf->useTemplate($tpl);
       }
   
       // Load the attached completion certificate PDF
       $attachmentPageCount = $mergedPdf->setSourceFile($attachmentPath);
       for ($j = 1; $j <= $attachmentPageCount; $j++) {
           $tpl = $mergedPdf->importPage($j);
           $mergedPdf->AddPage();
           $mergedPdf->useTemplate($tpl);
       }
    
       // Load the measurement book PDF (newly added)
       if (file_exists($measurementBookPath)) {
           $measurementBookPageCount = $mergedPdf->setSourceFile($measurementBookPath);
           for ($k = 1; $k <= $measurementBookPageCount; $k++) {
               $tpl = $mergedPdf->importPage($k);
               $mergedPdf->AddPage();
               $mergedPdf->useTemplate($tpl);
           }
       }
       foreach ($documentPaths as $documentPath) {
        $pageCount = $mergedPdf->setSourceFile($documentPath);
        for ($k = 1; $k <= $pageCount; $k++) {
            $tpl = $mergedPdf->importPage($k);
            $mergedPdf->AddPage();
            $mergedPdf->useTemplate($tpl);
        }
         }
   
       // Output the merged PDF
       return Response::make($mergedPdf->Output('S'), 200, [
           'Content-Type' => 'application/pdf',
           'Content-Disposition' => 'attachment; filename="merged_pdf.pdf"',
       ]);
   } 
}
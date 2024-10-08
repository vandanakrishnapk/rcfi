<?php

namespace App\Http\Controllers;
use App\Models\Donor;
use App\Models\User;
use Carbon\Carbon; 
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use App\Models\Input;
use App\Models\Fund;
use App\Models\Bill;
use App\Models\Completion;

class UserProjectDetailsController extends Controller
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
            'projects.projectManager',
            'projects.agencyProjectNo',
            'projects.availableBudget',
            'projects.typeOfProject',
            'projects.remarks',
            'documents.*',

        )
        ->where('project_details.proId', '=', $dataId)
        ->first();
    
    
        if(!$projectId) {
         $stage1Status = null; // or whatever default value you prefer
         $stage2Status = null;
         $stage3Status =null;
         $stage4Status =null;
         $stage5Status =null;
         $stage6Status =null;
         $applicantId = null;
        
      
     } else {
         $stage1Status = $projectId->stage1_status; // safely access the property
         $stage2Status = $projectId->stage2_status;
         $stage3Status = $projectId->stage3_status;
         $stage4Status = $projectId->stage4_status;
         $stage5Status = $projectId->stage5_status;
         $stage6Status = $projectId->stage6_status;
         $applicantId = $projectId->applicantId;
     }    

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
}

$inputs = DB::table('inputs')->get();

if(!$inputs)
{
    $inputs=null;
}
$com =DB::table('completions')
->join('project_details','project_details.proId','=','completions.proId')
->select('completions.*')
->first();
if(!$com)
{
    $com=null;
}



        return view('user.project_details',compact('projectId','stage1Status','stage2Status','applicants','stage3Status','stage4Status','inputs','stage5Status','stage6Status','applicantId','com'));
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
        'meeting_minutes',
        'agreement_with_contractor',
        'agreement_committee',
        'project_summary_form',
    ];

    foreach ($documentFields as $field) {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = $application_no . '_' . $field . '.' . $file->getClientOriginalExtension();
            $filePath = 'documents24'; // Set your desired path

            // Move the file to the designated location
            $file->move($filePath, $filename);

            // Store the file path for database entry
            $documentData[$field] =  $filePath.'/'.$filename; // Adjust the path as needed
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

    if ($document && $document->$documentType) {
        $filePath = base_path($document->$documentType); // Adjust path as necessary
        return response()->download($filePath);
    }

    return response()->json(['message' => 'File not found'], 404);
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
        'unit' => 'required|string|max:255', // Validate unit
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
        'unit' =>$request->unit,
    ]);
    if($data)
    {
        DB::table('project_details')->where('proId','=',$request->proId)->update([
            'stage4_status' =>1,
        ]);
    }
  
    
    // Return a success response
    return response()->json(['success' => true, 'message' => 'Material added successfully.']);

} 


public function getFundAllocated()
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

public function editBill($id)
{
    $funds = Fund::findOrFail($id);
    return response()->json($funds);
 
}
public function updateFund(Request $request)
{
    $validator = Validator::make($request->all(), [
        'fundId' => 'required|exists:funds,fundId', // Ensure the fund exists
        'input' => 'required|exists:inputs,inputId',
        'amount' => 'required|numeric',
        'unit' => 'required|string|max:255',
    
    ]);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
    }

    // Update the fund
    Fund::where('fundId', $request->fundId)->update([
        'input' => $request->input,
        'amount' => $request->amount,
        'unit' => $request->unit,
          ]);

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
    $details = DB::table('funds')
        ->join('inputs', 'inputs.inputId', '=', 'funds.input')
        ->join('project_details', 'project_details.proId', '=', 'funds.proId')
        ->join('projects', 'projects.proId', '=', 'funds.proId')
        ->select('inputs.inputName as input', 'funds.fundId', 'funds.amount', 'funds.utilized', 'funds.current', 'funds.balance')
        ->get();

    $totalRecords = count($details);
    $filteredRecords = $totalRecords; // Update if you apply filters

    // Calculate balances for each record
    foreach ($details as $detail) {
        $detail->balance = $detail->amount - $detail->utilized;
    }

    return response()->json([
        'draw' => request()->get('draw'),
        'recordsTotal' => $totalRecords,
        'recordsFiltered' => $filteredRecords,
        'data' => $details,
    ]);
}
 

public function requestCurrent($id)
{
    $fund = Fund::findOrFail($id);
    return response()->json($fund);
} 

public function updateCurrent(Request $request, $id)
{
    $request->validate([
        'current' => 'required|numeric',
    ]);

    $fund = Fund::findOrFail($id);
    $fund->current = $request->current;
    $fund->save();

    return response()->json(['message' => "Request has been sent"]);
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

public function completionStage(Request $request)
{
    // Validate the request with custom messages
    $validator = Validator::make($request->all(), [
        'field1' => 'required|string|max:255',
        'field2' => 'required|string|max:255',
        'field3' => 'required|string|max:255',
        'file1' => 'required|file|mimes:pdf|max:2048',
        'photo1' => 'required|file|image|mimes:jpg,png,jpeg|max:2048',
        'photo2' => 'required|file|image|mimes:jpg,png,jpeg|max:2048',
    ], [
        'field1.required' => 'Field 1 is required.',
        'field1.string' => 'Field 1 must be a string.',
        'field1.max' => 'Field 1 cannot exceed 255 characters.',
        'field2.required' => 'Field 2 is required.',
        'field3.required' => 'Field 3 is required.',
        'file1.required' => 'File 1 is required.',
        'file1.mimes' => 'File 1 must be a PDF.',
        'file1.max' => 'File 1 cannot exceed 2MB.',
        'photo1.required' => 'Photo 1 is required.',
        'photo1.image' => 'Photo 1 must be an image.',
        'photo1.max' => 'Photo 1 cannot exceed 2MB.',
        'photo2.required' => 'Photo 2 is required.',
        'photo2.image' => 'Photo 2 must be an image.',
        'photo2.max' => 'Photo 2 cannot exceed 2MB.',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Get the last project ID
    $getLastID = DB::table('project_details')->select('applicantId')->where('proId', '=', $request->proId)->first();
    $last_reg_num = $getLastID ? substr($getLastID->applicantId, -9) : 0;

    // Format the incremented number
    $application_no = 'APLRCFI' . $last_reg_num;

    // Prepare data for files
    $documentData = [];
    $documentFields = ['file1', 'photo1', 'photo2'];

    foreach ($documentFields as $field) {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = $application_no . '_' . $field . '.' . $file->getClientOriginalExtension();
            $filePath = 'documents24'; // Set your desired path

            // Move the file to the designated location
            $file->move(public_path($filePath), $filename);

            // Store the file path for database entry
            $documentData[$field] = $filename; // Save filename
        }
    }

    // Create or update the document record
    $document = Completion::create([
        'proId' => $request->proId,
        'field1' => $request->field1,
        'field2' => $request->field2,
        'field3' => $request->field3,
        'file1' => $documentData['file1'] ?? null, // Safely access the filename
        'photo1' => $documentData['photo1'] ?? null,
        'photo2' => $documentData['photo2'] ?? null,
    ]);

    // Update the project_details table
    DB::table('project_details')->where('proId', $document->proId)
        ->update(['stage6_status' => 1]);

    return response()->json(['message' => 'Completion stage done successfully!']);
} 

public function updateCompletion(Request $request)
{
    // Validate the request with custom messages
    $validator = Validator::make($request->all(), [
        'field1' => 'string|max:255',
        'field2' => 'string|max:255',
        'field3' => 'string|max:255',
        'file1' => 'file|mimes:pdf|max:2048',
        'photo1' => 'file|image|mimes:jpg,png,jpeg|max:2048',
        'photo2' => 'file|image|mimes:jpg,png,jpeg|max:2048',
    ], [
   
        'field1.string' => 'Field 1 must be a string.',
        'field1.max' => 'Field 1 cannot exceed 255 characters.',
        'file1.mimes' => 'File 1 must be a PDF.',
        'file1.max' => 'File 1 cannot exceed 2MB.',
        'photo1.image' => 'Photo 1 must be an image.',
        'photo1.max' => 'Photo 1 cannot exceed 2MB.',
        'photo2.image' => 'Photo 2 must be an image.',
        'photo2.max' => 'Photo 2 cannot exceed 2MB.',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    $getLastID = DB::table('project_details')->select('applicantId')->where('proId', '=', $request->proId)->first();
    $last_reg_num = $getLastID ? substr($getLastID->applicantId, -9) : 0;

    // Format the incremented number
    $application_no = 'APLRCFI' . $last_reg_num;

    // Check if a Completion record exists for the given proId
    $completion = Completion::where('proId', $request->proId)->first();

    if ($completion) {
        // Prepare data for files
        $documentData = [];
        $documentFields = ['file1', 'photo1', 'photo2'];

        foreach ($documentFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = $application_no . '_' . $field . '.' . $file->getClientOriginalExtension();
                $filePath = 'documents24'; // Set your desired path

                // Move the file to the designated location
                $file->move(public_path($filePath), $filename);

                // Store the file path for database entry
                $documentData[$field] = $filename; // Save filename
            } else {
                // If no new file is uploaded, keep the existing value
                $documentData[$field] = $completion->$field;
            }
        }

        // Update the document record
        $completion->update(array_merge([
            'field1' => $request->field1,
            'field2' => $request->field2,
            'field3' => $request->field3,
        ], $documentData));

        // Update the project_details table
        DB::table('project_details')->where('proId', $completion->proId)
            ->update(['stage6_status' => 2]);

        return response()->json(['message' => 'Completion stage updated successfully!']);
    } else {
        return response()->json(['error' => 'Completion record not found.'], 404);
    }
}



}


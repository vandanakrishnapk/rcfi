<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\SweetWaterProject;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class userSweetWaterProjectController extends Controller
{
    public function getSweetWaterProject()
    {
        return view('user.SweetWaterProject');
    } 
    public function doSweetWaterProject(Request $request)
    {
        $beneficiaries = $request->input('beneficiaries');
    if (is_string($beneficiaries)) {
        $beneficiaries = json_decode($beneficiaries, true);
    }
        // Validate the request
    $validator = Validator::make($request->all(), [
        'applicantName' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'address' => 'required|string',
        'village' => 'required|string|max:255',
        'post' => 'required|string|max:255',
        'panchayath' => 'required|string|max:255',
        'district' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'pin' => 'required|numeric',
        'contact1' => 'required|numeric',
        'contact2' => 'nullable|numeric',
        'beneficiaries' => 'required',
        'beneficiaries.*.name' => 'required|string',
        'beneficiaries.*.phone_number' => 'required|string',
        'noOfBenefitedPeople' => 'required|numeric',
        'totalMale' => 'required|numeric',
        'totalFemale' => 'required|numeric',
        'jobOfApplicant' => 'required|string|max:255',
        'averageMonthlyIncome' => 'required|numeric',
        'ownerOfLand' => 'required|string',
        'addressOfLandOwner' => 'required|string',
        'place' => 'required|string|max:255',
        'postLandOwner' => 'required|string|max:255',
        'panchayathLandOwner' => 'required|string|max:255',
        'districtLandOwner' => 'required|string|max:255',
        'mobileLandOwner' => 'required|numeric',
        'typeOfWell' => 'required|string',
        'expectedDepth' => 'required|numeric',
        'diameter' => 'required|numeric',
        'budgetEstimated' => 'required|numeric',
        'natureOfLand' => 'required|string',
        'currentWaterSource' => 'required|string',
        'needElectricPump' => 'required|string',
        'usedForAgriculture' => 'required|string',
 
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    $applicationId = $this->generateApplicationId('SW'); // Use your specific project code

    try {
        $project = SweetWaterProject::create([
            'applicationId'=>$applicationId,
            'applicantName' => $request->input('applicantName'),
            'location' => $request->input('location'),
            'address' => $request->input('address'),
            'village' => $request->input('village'),
            'post' => $request->input('post'),
            'panchayath' => $request->input('panchayath'),
            'district' => $request->input('district'),
            'state' => $request->input('state'),
            'pin' => $request->input('pin'),
            'contact1' => $request->input('contact1'),
            'contact2' => $request->input('contact2'),
            'beneficiaries' => $beneficiaries,
            'noOfBenefitedPeople' => $request->input('noOfBenefitedPeople'),
            'totalMale' => $request->input('totalMale'),
            'totalFemale' => $request->input('totalFemale'),
            'jobOfApplicant' => $request->input('jobOfApplicant'),
            'averageMonthlyIncome' => $request->input('averageMonthlyIncome'),
            'ownerOfLand' => $request->input('ownerOfLand'),
            'addressOfLandOwner' => $request->input('addressOfLandOwner'),
            'place' => $request->input('place'),
            'postLandOwner' => $request->input('postLandOwner'),
            'panchayathLandOwner' => $request->input('panchayathLandOwner'),
            'districtLandOwner' => $request->input('districtLandOwner'),
            'mobileLandOwner' => $request->input('mobileLandOwner'),
            'typeOfWell' => $request->input('typeOfWell'),
            'expectedDepth' => $request->input('expectedDepth'),
            'diameter' => $request->input('diameter'),
            'budgetEstimated' => $request->input('budgetEstimated'),
            'natureOfLand' => $request->input('natureOfLand'),
            'currentWaterSource' => $request->input('currentWaterSource'),
            'needElectricPump' => $request->input('needElectricPump'),
            'usedForAgriculture' => $request->input('usedForAgriculture'),
          
        ]);

        return response()->json(['message' => 'Application saved successfully'], 200);
    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Failed to save SweetWaterProject application: '.$e->getMessage());
        Log::info('Request data:', $request->all());

        return response()->json(['error' => 'Failed to save application'], 500);
    }
}    
private function generateApplicationId($projectCode)
{
    // Get the current year
    $year = date('y'); // Get last two digits of the year

    // Generate a 5-digit unique number
    $latest =SweetWaterProject::max('sweetwaterId'); // Assuming 'id' is an auto-incrementing primary key
    $uniqueNumber = str_pad(($latest + 1), 5, '0', STR_PAD_LEFT); // Increment ID and pad with zeros

    return "APLRCFI{$year}{$projectCode}{$uniqueNumber}";
}

public function getSweetWaterProjectDataTable()
{
    $details = SweetWaterProject::all();
    
    // Format the beneficiaries field
    $formattedDetails = $details->map(function($item) {
        $beneficiaries = $item->beneficiaries; // Decode JSON
        $beneficiariesList = '<ul>';
        
        if (is_array($beneficiaries)) {
            foreach ($beneficiaries as $beneficiary) {
                $beneficiariesList .= '<li>' . htmlspecialchars($beneficiary['name']) . ': ' . htmlspecialchars($beneficiary['phone_number']) . '</li>';
            }
        }
        
        $beneficiariesList .= '</ul>';
        
        // Return formatted record
        return [
            'sweetwaterId' => $item->sweetwaterId,
            'applicationId' =>$item->applicationId,
            'applicantName' => $item->applicantName,
            'location' => $item->location,
            'address' => $item->address,
            'village' => $item->village,
            'post' => $item->post,
            'panchayath' => $item->panchayath,
            'district' => $item->district,
            'state' => $item->state,
            'pin' => $item->pin,
            'contact1' => $item->contact1,
            'contact2' => $item->contact2,
            'noOfBenefitedPeople' => $item->noOfBenefitedPeople,
            'totalMale' => $item->totalMale,
            'totalFemale' => $item->totalFemale,
            'jobOfApplicant' => $item->jobOfApplicant,
            'averageMonthlyIncome' => $item->averageMonthlyIncome,
            'ownerOfLand' => $item->ownerOfLand,
            'addressOfLandOwner' => $item->addressOfLandOwner,
            'place' => $item->place,
            'postLandOwner' => $item->postLandOwner,
            'panchayathLandOwner' => $item->panchayathLandOwner,
            'districtLandOwner' => $item->districtLandOwner,
            'mobileLandOwner' => $item->mobileLandOwner,
            'typeOfWell' => $item->typeOfWell,
            'expectedDepth' => $item->expectedDepth,
            'diameter' => $item->diameter,
            'budgetEstimated' => $item->budgetEstimated,
            'natureOfLand' => $item->natureOfLand,
            'currentWaterSource' => $item->currentWaterSource,
            'needElectricPump' => $item->needElectricPump,
            'usedForAgriculture' => $item->usedForAgriculture,
            'beneficiaries' => $beneficiariesList, // Formatted beneficiaries
 ];
    });
    
    // Total records and filtered records are the same as we are not filtering in this case
    $totalRecords = $formattedDetails->count();
    $filteredRecords = $totalRecords;
    
    return response()->json([
        'draw' => request()->get('draw'),
        'recordsTotal' => $totalRecords,
        'recordsFiltered' => $filteredRecords,
        'data' => $formattedDetails
    ]);
} 
public function getSweetWaterProjectViewMore($id)
{
  
    $details = SweetWaterProject::where('sweetwaterId', $id)->first();

    if ($details) {
        $beneficiaries = $details->beneficiaries; // Decode JSON
        $beneficiariesList = '<ul>';
        
        if (is_array($beneficiaries)) {
            foreach ($beneficiaries as $beneficiary) {
                $beneficiariesList .= '<li>' . htmlspecialchars($beneficiary['name']) . ': ' . htmlspecialchars($beneficiary['phone_number']) . '</li>';
            }
        }
        
        $beneficiariesList .= '</ul>';
        
        $formattedDetails = [
            'sweetwaterId' => $details->sweetwaterId,
            'applicantName' => $details->applicantName,
            'location' => $details->location,
            'address' => $details->address,
            'village' => $details->village,
            'post' => $details->post,
            'panchayath' => $details->panchayath,
            'district' => $details->district,
            'state' => $details->state,
            'pin' => $details->pin,
            'contact1' => $details->contact1,
            'contact2' => $details->contact2,
            'noOfBenefitedPeople' => $details->noOfBenefitedPeople,
            'totalMale' => $details->totalMale,
            'totalFemale' => $details->totalFemale,
            'jobOfApplicant' => $details->jobOfApplicant,
            'averageMonthlyIncome' => $details->averageMonthlyIncome,
            'ownerOfLand' => $details->ownerOfLand,
            'addressOfLandOwner' => $details->addressOfLandOwner,
            'place' => $details->place,
            'postLandOwner' => $details->postLandOwner,
            'panchayathLandOwner' => $details->panchayathLandOwner,
            'districtLandOwner' => $details->districtLandOwner,
            'mobileLandOwner' => $details->mobileLandOwner,
            'typeOfWell' => $details->typeOfWell,
            'expectedDepth' => $details->expectedDepth,
            'diameter' => $details->diameter,
            'budgetEstimated' => $details->budgetEstimated,
            'natureOfLand' => $details->natureOfLand,
            'currentWaterSource' => $details->currentWaterSource,
            'needElectricPump' => $details->needElectricPump,
            'usedForAgriculture' => $details->usedForAgriculture,
            'beneficiaries' => $beneficiariesList,
        ];

        return response()->json([
            'data' => $formattedDetails
        ]);
    } else {
        return response()->json(['error' => 'Not found'], 404);
    }
}  
public function editSweetWaterProject($id)
{
      // Find the SweetWaterProject by ID
        // Find the SweetWaterProject by ID
    $project = SweetWaterProject::findOrFail($id);
     // Decode JSON data if it's stored as a JSON string
     if (is_string($project->beneficiaries)) {
        $beneficiaries = json_decode($project->beneficiaries, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'JSON decode error: ' . json_last_error_msg()], 400);
        }

        $project->beneficiaries = $beneficiaries;
    }

    // Return the project with beneficiaries as JSON response
    return response()->json($project);

} 
public function updateSweetWaterProject(Request $request)
{
       
    $beneficiaries = $request->input('beneficiaries');
    if (is_string($beneficiaries)) {
        $beneficiaries = json_decode($beneficiaries, true);
    }
    $validatedData = $request->validate([
        'sweetwaterId' => 'required|string|max:255',
        'applicantName' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'address' => 'required|string|max:1000',
        'village' => 'required|string|max:255',
        'post' => 'required|string|max:255',
        'panchayath' => 'required|string|max:255',
        'district' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'pin' => 'required|string|max:255',
        'contact1' => 'required|string|max:15',
        'contact2' => 'nullable|string|max:15',
        'noOfBenefitedPeople' => 'required|integer',
        'totalMale' => 'required|integer',
        'totalFemale' => 'required|integer',
        'jobOfApplicant' => 'required|string|max:255',
        'averageMonthlyIncome' => 'required|numeric',
        'ownerOfLand' => 'required|string|max:255',
        'addressOfLandOwner' => 'required|string|max:1000',
        'place' => 'required|string|max:255',
        'postLandOwner' => 'required|string|max:255',
        'panchayathLandOwner' => 'required|string|max:255',
        'districtLandOwner' => 'required|string|max:255',
        'mobileLandOwner' => 'required|string|max:15',
        'expectedDepth' => 'required|numeric',
        'diameter' => 'required|numeric',
        'budgetEstimated' => 'required|numeric',
        'natureOfLand' => 'required|string|max:255',
        'currentWaterSource' => 'required|string|max:1000',
        'typeOfWell' => 'required|string|max:255',
        'needElectricPump' => 'required|string|max:10',
        'usedForAgriculture' => 'required|string|max:10',
        'beneficiaries' => 'nullable',
        'beneficiaries.*.name' => 'required|string|max:255',
        'beneficiaries.*.phone_number' => 'required|string|max:15',
    ]);

    // Find the SweetWaterProject by ID
    $project = SweetWaterProject::findOrFail($validatedData['sweetwaterId']);

    // Update the project fields
    $project->sweetwaterId = $validatedData['sweetwaterId'];
    $project->applicantName = $validatedData['applicantName'];
    $project->location = $validatedData['location'];
    $project->address = $validatedData['address'];
    $project->village = $validatedData['village'];
    $project->post = $validatedData['post'];
    $project->panchayath = $validatedData['panchayath'];
    $project->district = $validatedData['district'];
    $project->state = $validatedData['state'];
    $project->pin = $validatedData['pin'];
    $project->contact1 = $validatedData['contact1'];
    $project->contact2 = $validatedData['contact2'];
    $project->noOfBenefitedPeople = $validatedData['noOfBenefitedPeople'];
    $project->totalMale = $validatedData['totalMale'];
    $project->totalFemale = $validatedData['totalFemale'];
    $project->jobOfApplicant = $validatedData['jobOfApplicant'];
    $project->averageMonthlyIncome = $validatedData['averageMonthlyIncome'];
    $project->ownerOfLand = $validatedData['ownerOfLand'];
    $project->addressOfLandOwner = $validatedData['addressOfLandOwner'];
    $project->place = $validatedData['place'];
    $project->postLandOwner = $validatedData['postLandOwner'];
    $project->panchayathLandOwner = $validatedData['panchayathLandOwner'];
    $project->districtLandOwner = $validatedData['districtLandOwner'];
    $project->mobileLandOwner = $validatedData['mobileLandOwner'];
    $project->expectedDepth = $validatedData['expectedDepth'];
    $project->diameter = $validatedData['diameter'];
    $project->budgetEstimated = $validatedData['budgetEstimated'];
    $project->natureOfLand = $validatedData['natureOfLand'];
    $project->currentWaterSource = $validatedData['currentWaterSource'];
    $project->typeOfWell = $validatedData['typeOfWell'];
    $project->needElectricPump = $validatedData['needElectricPump'];
    $project->usedForAgriculture = $validatedData['usedForAgriculture'];
    $project->beneficiaries = $beneficiaries;



    // Save the project
    $project->save();

    // Return success response
    return response()->json([
        'status' => 1,
        'message' => 'SweetWater Project updated successfully!'
    ]);

} 
public function deleteSweetWaterProject(Request $request,$id)
{
    try {
        // Find the project by ID
        $project = SweetWaterProject::findOrFail($id);

        // Delete the project
        $project->delete();

        // Return a success response
        return response()->json([
            'status' => 1,
            'message' => 'SweetWater Project Application deleted successfully!'
        ]);
    } catch (Exception $e) {
        // Return an error response if the project could not be deleted
        return response()->json([
            'status' => 0,
            'message' => 'Failed to delete SweetWater Project. Please try again later.'
        ], 500);
    }
}
}

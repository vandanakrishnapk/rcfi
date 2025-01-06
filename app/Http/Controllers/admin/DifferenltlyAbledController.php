<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DifferentlyAbled;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class DifferenltlyAbledController extends Controller
{
    public function getDifferentlyAbled(Request $request)
    {
        return view('admin.diffAbled');
    } 
public function doDifferentlyAbled(Request $request)
{
    $validator = Validator::make($request->all(), [
        'applicationId'=>'string',
        'applicant_name' => 'required|string|max:255',
        'father_name' => 'required|string|max:255',
        'fathers_father' => 'required|string|max:255',
        'mother_name' => 'required|string|max:255',
        'gender' => 'required|in:male,female',
        'aadhaar_number' => 'required|string|max:12|min:12',
        'date_of_birth' => 'required|date',
        'age' => 'required|integer|min:0|max:120',
        'marital_status' => 'nullable|in:single,married',
        'guardian' => 'nullable|string|max:255',
        'relationship' => 'nullable|string|max:255',
        'total_members' => 'required|integer|min:1',
        'male_members' => 'required|integer|min:0',
        'female_members' => 'required|integer|min:0',
        'people_with_disabilities' => 'nullable|integer|min:0',
        'monthly_income' => 'required|numeric|min:0',
        'monthly_cost' => 'required|numeric|min:0',
        'source_of_income' => 'nullable|string|max:255',
        'studying_institution' => 'nullable|string|max:255',
        'reason_for_not_studying' => 'nullable|string|max:255',
        'health_status' => 'nullable|string|max:255',
        'disability' => 'nullable|in:mute,deafness,blindness,others',
        'disability_percentage' => 'nullable|integer|min:0|max:100',
        'disability_date' => 'nullable|date',
        'disability_level' => 'nullable|in:simple,hard,very_hard',
        'anyone_else_help' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'accommodation_details' => 'nullable|string|max:255',
        'house_name' => 'nullable|string|max:255',
        'place' => 'nullable|string|max:255',
        'panchayat' => 'nullable|string|max:255',
        'district' => 'nullable|string|max:255',
        'pincode' => 'required|string|max:10',
        'mobile' => 'required|string|max:15',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    $applicationId = $this->generateApplicationId('DA'); // 'OC' or your specific project code

    // Prepare data for creation
    $diffableddata = $request->all();
    $diffableddata['applicationId'] = $applicationId; // Set application_id

    DifferentlyAbled::create($diffableddata);

    return response()->json(['message' => 'Applicant submitted successfully!']);

} 
private function generateApplicationId($projectCode)
{
    // Get the current year
    $year = date('y'); // Get last two digits of the year

    // Generate a 5-digit unique number
    $latest = DifferentlyAbled::max('diffId'); // Assuming 'id' is an auto-incrementing primary key
    $uniqueNumber = str_pad(($latest + 1), 5, '0', STR_PAD_LEFT); // Increment ID and pad with zeros

    return "APLRCFI{$year}{$projectCode}{$uniqueNumber}";
}

public function viewDifferentlyabled()
{
    $details =DifferentlyAbled::all();

    $totalRecords = count( $details); // Total records in your data source
    $filteredRecords = count( $details); // Number of records after applying filters

    return response()->json(['draw' => request()->get('draw'),
                            'recordsTotal' => $totalRecords,
                             'recordsFiltered' => $filteredRecords,
                              'data' =>  $details]);
    return response()->json(['error' => 'Invalid request'], 400);

} 
public function diffViewMore($id)
{
    $diffId = DifferentlyAbled::find($id);
    if (!$diffId) {
        return response()->json(['error' => 'Differently abled details not found'], 404);
    }
    return response()->json($diffId);

} 
public function EditDiffAbled($id)
{
    $diffId = DifferentlyAbled::findOrFail($id);
    return response()->json($diffId);
} 


public function updateDiffAbled(Request $request)
{
    // Define validation rules
    $validator = Validator::make($request->all(), [
        'diffId' => 'required|numeric|exists:differently_abled,diffId', // Ensure it exists
        'applicant_name' => 'string|max:255',
        'father_name' => 'string|max:255',
        'fathers_father' => 'string|max:255',
        'mother_name' => 'string|max:255',
        'gender' => 'in:male,female',
        'aadhaar_number' => 'string|max:12|min:12',
        'date_of_birth' => 'date',
        'age' => 'integer|min:0|max:120',
        'marital_status' => 'nullable|in:single,married',
        'guardian' => 'nullable|string|max:255',
        'relationship' => 'nullable|string|max:255',
        'total_members' => 'integer|min:1',
        'male_members' => 'integer|min:0',
        'female_members' => 'integer|min:0',
        'people_with_disabilities' => 'nullable|integer|min:0',
        'monthly_income' => 'numeric|min:0',
        'monthly_cost' => 'numeric|min:0',
        'source_of_income' => 'nullable|string|max:255',
        'studying_institution' => 'nullable|string|max:255',
        'reason_for_not_studying' => 'nullable|string|max:255',
        'health_status' => 'nullable|string|max:255',
        'disability' => 'nullable|in:mute,deafness,blindness,others',
        'disability_percentage' => 'nullable|integer|min:0|max:100',
        'disability_date' => 'nullable|date',
        'disability_level' => 'nullable|in:simple,hard,very_hard',
        'anyone_else_help' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'accommodation_details' => 'nullable|string|max:255',
        'house_name' => 'nullable|string|max:255',
        'place' => 'nullable|string|max:255',
        'panchayat' => 'nullable|string|max:255',
        'district' => 'nullable|string|max:255',
        'pincode' => 'string|max:10',
        'mobile' => 'string|max:15',
    ]);

    // Check for validation errors
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    try {
        // Extract validated data
        $validatedData = $validator->validated();
        
        // Find the existing record by ID
        $differentlyAbled = DifferentlyAbled::findOrFail($validatedData['diffId']);
        
        // Update the record with validated data
        $differentlyAbled->update($validatedData); // This uses the validated data directly

        // Return a success response
        return response()->json([
            'status' => 1,
            'message' => 'Differently abled details updated successfully!',
            'data' => $differentlyAbled // Return updated object
        ]);
    } catch (\Exception $e) {
        // Log the exception message for debugging
        \Log::error('Update Differently abled details Failed: '.$e->getMessage());

        // Return an error response in case of exception
        return response()->json([
            'status' => 0,
            'message' => 'Failed to update differently abled details. Please try again later.'
        ], 500);
    }
} 

public function deleteDiffAbled($id)
{
    try {
        // Find the project by ID
        $diff = DifferentlyAbled::findOrFail($id);

        // Delete the project
        $diff->delete();

        // Return a success response
        return response()->json([
            'status' => 1,
            'message' => 'Differently abled Application deleted successfully!'
        ]);
    } catch (Exception $e) {
        // Return an error response if the project could not be deleted
        return response()->json([
            'status' => 0,
            'message' => 'Failed to delete Diferently abled application. Please try again later.'
        ], 500);
}

}



}
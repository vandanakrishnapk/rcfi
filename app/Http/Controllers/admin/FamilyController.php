<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Family;

class FamilyController extends Controller
{
    public function getFamilyView()
    {
        return view('admin.family');
    }  

    public function doFamilyWelfare(Request $request)
    {
        $validator = Validator::make($request->all(), [
             'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'father_grandfather' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'age' => 'nullable|integer|min:0',
            'aadhaar_number' => 'nullable|string|max:12', // Assuming Aadhaar number is 12 digits
            'house_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'po' => 'nullable|string|max:255',
            'panchayat' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'pin_code' => 'nullable|string|max:10',
            'mobile1' => 'nullable|string|max:15',
            'mobile2' => 'nullable|string|max:15',
            'children_count' => 'nullable|integer|min:0',
            'male_count' => 'nullable|integer|min:0',
            'female_count' => 'nullable|integer|min:0',
            'nri' => 'required|string|in:yes,no',
            'occupation' => 'nullable|string|max:255',
            'monthly_income' => 'nullable|numeric|min:0',
            'other_income' => 'nullable|string|max:255',
            'health_status' => 'nullable|string',
            'disability' => 'required|string|in:yes,no',
            'treatment_explanation' => 'nullable|string',
            'chronic_patients' => 'nullable|string',
            'residence_info' => 'required|string',
            'own_house_condition' => 'nullable|string',
            'own_place' => 'required|string|in:yes,no',
            'own_place_size' => 'nullable|string',
            'sequel' => 'required|string|in:yes,no',
            'welfare_assistance' => 'nullable|string',        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } 
        
        $applicationId = $this->generateApplicationId('FA'); // 'FA' or your specific project code

        // Prepare data for creation
       $familyaid = $request->all();
       $familyaid['applicationId'] = $applicationId; // Set application_id   
    
      Family::create($familyaid);
    
        return response()->json(['message' => 'Applicant submitted successfully!']);
    
    } 
    private function generateApplicationId($projectCode)
    {
        // Get the current year
        $year = date('y'); // Get last two digits of the year

        // Generate a 5-digit unique number
        $latest = Family::max('familyId'); // Assuming 'id' is an auto-incrementing primary key
        $uniqueNumber = str_pad(($latest + 1), 5, '0', STR_PAD_LEFT); // Increment ID and pad with zeros

        return "APLRCFI{$year}{$projectCode}{$uniqueNumber}";
    }


    public function familyDataTable()
    {
        $details =Family::all();

        $totalRecords = count( $details); // Total records in your data source
        $filteredRecords = count( $details); // Number of records after applying filters
    
        return response()->json(['draw' => request()->get('draw'),
                                'recordsTotal' => $totalRecords,
                                 'recordsFiltered' => $filteredRecords,
                                  'data' =>  $details]);
        return response()->json(['error' => 'Invalid request'], 400);
    
    } 

    public function viewMoreFamily($id)
    {
        $familyId = Family::find($id);
        if (!$familyId) {
            return response()->json(['error' => 'Family details not found'], 404);
        }
        return response()->json($familyId);
      
    } 
    public function editFamily($id)
    {
        $familyId = Family::findOrFail($id);
    return response()->json($familyId);
    } 
    public function updateFamily(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'familyId' =>'numeric',
            'name' => 'string|max:255',
           'father_name' => 'string|max:255',
           'mother_name' => 'string|max:255',
           'father_grandfather' => 'nullable|string|max:255',
           'dob' => 'nullable|date',
           'age' => 'nullable|integer|min:0',
           'aadhaar_number' => 'nullable|string|max:12', // Assuming Aadhaar number is 12 digits
           'house_name' => 'nullable|string|max:255',
           'location' => 'nullable|string|max:255',
           'po' => 'nullable|string|max:255',
           'panchayat' => 'nullable|string|max:255',
           'district' => 'nullable|string|max:255',
           'pin_code' => 'nullable|string|max:10',
           'mobile1' => 'nullable|string|max:15',
           'mobile2' => 'nullable|string|max:15',
           'children_count' => 'nullable|integer|min:0',
           'male_count' => 'nullable|integer|min:0',
           'female_count' => 'nullable|integer|min:0',
           'nri' => 'string|in:yes,no',
           'occupation' => 'nullable|string|max:255',
           'monthly_income' => 'nullable|numeric|min:0',
           'other_income' => 'nullable|string|max:255',
           'health_status' => 'nullable|string',
           'disability' => 'string|in:yes,no',
           'treatment_explanation' => 'nullable|string',
           'chronic_patients' => 'nullable|string',
           'residence_info' => 'string',
           'own_house_condition' => 'nullable|string',
           'own_place' => 'string|in:yes,no',
           'own_place_size' => 'nullable|string',
           'sequel' => 'string|in:yes,no',
           'welfare_assistance' => 'nullable|string',        ]);
   
       if ($validator->fails()) {
           return response()->json(['errors' => $validator->errors()], 422);
       }  
       try {
        // Extract validated data
        $validatedData = $validator->validated();
        
        // Find the existing record by ID
        $differentlyAbled = Family::findOrFail($validatedData['familyId']);
        
        // Update the record with validated data
        $differentlyAbled->update($validatedData); // This uses the validated data directly

        // Return a success response
        return response()->json([
            'status' => 1,
            'message' => 'Family details updated successfully!',
            'data' => $differentlyAbled // Return updated object
        ]);
    } catch (\Exception $e) {
        // Log the exception message for debugging
        \Log::error('Update Family details Failed: '.$e->getMessage());

        // Return an error response in case of exception
        return response()->json([
            'status' => 0,
            'message' => 'Failed to update Family details. Please try again later.'
        ], 500);
    }

    } 
    public function deleteFamily($id)
    {
          try {
        // Find the project by ID
        $family = Family::findOrFail($id);

        // Delete the project
        $family->delete();

        // Return a success response
        return response()->json([
            'status' => 1,
            'message' => 'Family Application deleted successfully!'
        ]);
    } catch (Exception $e) {
        // Return an error response if the project could not be deleted
        return response()->json([
            'status' => 0,
            'message' => 'Failed to delete Family application. Please try again later.'
        ], 500);
}

    }
}

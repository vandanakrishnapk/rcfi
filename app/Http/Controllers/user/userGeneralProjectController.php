<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apptype;
use App\Models\GeneralProject;
use Illuminate\Support\Facades\Validator;

class userGeneralProjectController extends Controller
{
    public function getGeneralProject()
    { 
        $types = Apptype::all();
        return view('user.generalproject',compact('types'));
    } 
    public function doappType(Request $request)
    {
        $validator = Validator::make($request->all(), [
           
            'type' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
$data =Apptype::create([
    'type' =>$request->type,
]);

return response()->json([
    'status' =>1,
    'message' =>'Application type added successfully',
]);
    } 


    public function doGeneralProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'address' => 'required|string|max:255',
            'ward' => 'nullable|string|max:100',
            'po' => 'nullable|string|max:100',
            'village' => 'nullable|string|max:100',
            'panchayat' => 'nullable|string|max:100',
            'block' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'pin_code' => 'nullable|string|max:10',
            'contact_1' => 'nullable|string|max:15',
            'contact_2' => 'nullable|string|max:15',
            'sex' => 'required|string',
            'status' => 'required|string',
            'education' => 'nullable|string|max:100',
            'male_members' => 'nullable|integer|min:0',
            'female_members' => 'nullable|integer|min:0',
            'total_members' => 'nullable|integer|min:0',
            'earning_members' => 'nullable|integer|min:0',
            'average_income' => 'nullable|numeric|min:0',
            'applying_for' => 'nullable|string|max:100',
            'monthly_income' => 'nullable|numeric|min:0',
            'recommended_by' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:15',
        ]); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } 
        $applicationId = $this->generateApplicationId('GP'); // 'OC' or your specific project code

        // Prepare data for creation
        $generalPro = $request->all();
        $generalPro['applicationId'] = $applicationId; // Set application_id

        // Create the record
   
        GeneralProject::create($generalPro);
    
        return response()->json(['message' => 'Applicant submitted successfully!']);
    


    } 
    private function generateApplicationId($projectCode)
       {
           // Get the current year
           $year = date('y'); // Get last two digits of the year
   
           // Generate a 5-digit unique number
           $latest =  GeneralProject::max('generalId'); // Assuming 'id' is an auto-incrementing primary key
           $uniqueNumber = str_pad(($latest + 1), 5, '0', STR_PAD_LEFT); // Increment ID and pad with zeros
   
           return "APLRCFI{$year}{$projectCode}{$uniqueNumber}";
       }
    public function generalDatatable()
    {
        $details =GeneralProject::all();

        $totalRecords = count( $details); // Total records in your data source
        $filteredRecords = count( $details); // Number of records after applying filters
    
        return response()->json(['draw' => request()->get('draw'),
                                'recordsTotal' => $totalRecords,
                                 'recordsFiltered' => $filteredRecords,
                                  'data' =>  $details]);
        return response()->json(['error' => 'Invalid request'], 400);

    } 

    public function viewMoreGeneral($id)
    {
        $generalId = GeneralProject::find($id);
        if (!$generalId) {
            return response()->json(['error' => 'General Project  not found'], 404);
        }
        return response()->json($generalId);     
 
    }

    public function generalProjectEdit($id)
    {
        $generalId = GeneralProject::findOrFail($id);
        return response()->json($generalId);  
    } 

    public function updateGeneral(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'generalId' =>'numeric',
            'name' => 'string|max:255',
            'age' => 'integer|min:1',
            'address' => 'string|max:255',
            'ward' => 'nullable|string|max:100',
            'po' => 'nullable|string|max:100',
            'village' => 'nullable|string|max:100',
            'panchayat' => 'nullable|string|max:100',
            'block' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'pin_code' => 'nullable|string|max:10',
            'contact_1' => 'nullable|string|max:15',
            'contact_2' => 'nullable|string|max:15',
            'sex' => 'string',
            'status' => 'string',
            'education' => 'nullable|string|max:100',
            'male_members' => 'nullable|integer|min:0',
            'female_members' => 'nullable|integer|min:0',
            'total_members' => 'nullable|integer|min:0',
            'earning_members' => 'nullable|integer|min:0',
            'average_income' => 'nullable|numeric|min:0',
            'applying_for' => 'nullable|string|max:100',
            'monthly_income' => 'nullable|numeric|min:0',
            'recommended_by' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:15',
        ]); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }  

        try {
            // Extract validated data
            $validatedData = $validator->validated();
            
            // Find the existing record by ID
            $general = GeneralProject::findOrFail($validatedData['generalId']);
            
            // Update the record with validated data
            $general->update($validatedData); // This uses the validated data directly
    
            // Return a success response
            return response()->json([
                'status' => 1,
                'message' => 'General Project details updated successfully!',
                'data' => $general // Return updated object
            ]);
        } catch (\Exception $e) {
            // Log the exception message for debugging
            \Log::error('Update General Project details Failed: '.$e->getMessage());
    
            // Return an error response in case of exception
            return response()->json([
                'status' => 0,
                'message' => 'Failed to update general project details. Please try again later.'
            ], 500);
        }
    
        
    }

public function deleteGeneral($id)
{
    try {
    $general = GeneralProject::findOrFail($id);

    // Delete the project
    $general->delete();

    // Return a success response
    return response()->json([
        'status' => 1,
        'message' => 'General project application  deleted successfully!'
    ]);
}
 catch (Exception $e) {
    // Return an error response if the project could not be deleted
    return response()->json([
        'status' => 0,
        'message' => 'Failed to delete general project  application. Please try again later.'
    ], 500);
}

}
}

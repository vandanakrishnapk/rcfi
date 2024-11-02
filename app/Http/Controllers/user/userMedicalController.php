<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medical;
use Illuminate\Support\Facades\Validator;

class userMedicalController extends Controller
{
    public function getMedical()
    {
        return view('user.medical');
    } 
    public function doMedical(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'applicantName' => 'required|string|max:255',
            'committeeName' => 'required|string|max:255',
            'year' => 'required|integer|digits:4',
            'registerNo' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'panchayat' => 'required|string|max:255',
            'post' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'mobile1' => 'required|string|max:15',
            'mobile2' => 'nullable|string|max:15',
            'mahalName' => 'required|string|max:255',
            'projectplace' => 'required|string|max:255',
            'projectVillage' => 'required|string|max:255',
            'stateProject' => 'required|string|max:255',
            'familiesBenefited' => 'required|integer',
            'buildingPresent' => 'required|in:yes,no',
            'requirements' => 'required|string|max:255',
            'totalSqrFt' => 'required|integer',
            'location' => 'required|string|max:255',
            'expectedAmount' => 'required|numeric',
            'pharmacy' => 'required|in:yes,no',
            'legalPermissions' => 'required|in:yes,no',
            'permittedType' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'bedType' => 'nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $applicationId = $this->generateApplicationId('HC'); // 'OC' or your specific project code

        // Prepare data for creation
        $hospitaldata = $request->all();
        $hospitaldata['applicationId'] = $applicationId; // Set application_id
        Medical::create($hospitaldata);    
        return response()->json(['message' => 'Applicant submitted successfully!']);     

    } 
    private function generateApplicationId($projectCode)
    {
        // Get the current year
        $year = date('y'); // Get last two digits of the year

        // Generate a 5-digit unique number
        $latest = Medical::max('medicalId'); // Assuming 'id' is an auto-incrementing primary key
        $uniqueNumber = str_pad(($latest + 1), 5, '0', STR_PAD_LEFT); // Increment ID and pad with zeros

        return "APLRCFI{$year}{$projectCode}{$uniqueNumber}";
    }
    public function viewMedical()
    {
        $details =Medical::all();

        $totalRecords = count( $details); // Total records in your data source
        $filteredRecords = count( $details); // Number of records after applying filters
    
        return response()->json(['draw' => request()->get('draw'),
                                'recordsTotal' => $totalRecords,
                                 'recordsFiltered' => $filteredRecords,
                                  'data' =>  $details]);
        return response()->json(['error' => 'Invalid request'], 400);
    
 
    } 
    public function viewMoreMedical($id)
    {
        $medicalId = Medical::find($id);
        if (!$medicalId) {
            return response()->json(['error' => 'Medical Centre Application details not found'], 404);
        }
        return response()->json($medicalId);
    

    } 
    public function EditMedical($id)
    {
        $medicalID = Medical::findOrFail($id);
        return response()->json($medicalID);
   
    } 
    public function updateMedical(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'medicalId' =>'numeric',
            'applicantName' => 'string|max:255',
            'committeeName' => 'string|max:255',
            'year' => 'integer|digits:4',
            'registerNo' => 'string|max:255',
            'village' => 'string|max:255',
            'place' => 'string|max:255',
            'panchayat' => 'string|max:255',
            'post' => 'string|max:255',
            'district' => 'string|max:255',
            'state' => 'string|max:255',
            'mobile1' => 'string|max:15',
            'mobile2' => 'nullable|string|max:15',
            'mahalName' => 'string|max:255',
            'projectplace' => 'string|max:255',
            'projectVillage' => 'string|max:255',
            'stateProject' => 'string|max:255',
            'familiesBenefited' => 'integer',
            'buildingPresent' => 'in:yes,no',
            'requirements' => 'string|max:255',
            'totalSqrFt' => 'integer',
            'location' => 'string|max:255',
            'expectedAmount' => 'numeric',
            'pharmacy' => 'in:yes,no',
            'legalPermissions' => 'in:yes,no',
            'permittedType' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'bedType' => 'nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } 
        try {
            // Extract validated data
            $validatedData = $validator->validated();
            
            // Find the existing record by ID
           $medical = Medical::findOrFail($validatedData['medicalId']);
            
            // Update the record with validated data
           $medical->update($validatedData); // This uses the validated data directly
    
            // Return a success response
            return response()->json([
                'status' => 1,
                'message' => 'medical details updated successfully!',
                'data' =>$medical // Return updated object
            ]);
        } catch (\Exception $e) {
            // Log the exception message for debugging
            \Log::error('Update medical details Failed: '.$e->getMessage());
    
            // Return an error response in case of exception
            return response()->json([
                'status' => 0,
                'message' => 'Failed to update medical details. Please try again later.'
            ], 500);
        }
    }
    public function deleteMedical($id)
    {
        try {
            // Find the project by ID
            $Medical = Medical::findOrFail($id);
    
            // Delete the project
            $Medical->delete();
    
            // Return a success response
            return response()->json([
                'status' => 1,
                'message' => 'Medical Application deleted successfully!'
            ]);
        } catch (Exception $e) {
            // Return an error response if the project could not be deleted
            return response()->json([
                'status' => 0,
                'message' => 'Failed to delete Medical application. Please try again later.'
            ], 500);
    }
    }

}

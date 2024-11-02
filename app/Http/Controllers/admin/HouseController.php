<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\House;
use Illuminate\Support\Facades\Validator;

class HouseController extends Controller
{
    public function getHouse()
    {
        return view('admin.house');

    } 
    public function doHouse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'age' => 'integer',
            'fathersName' => 'string|max:255',
            'mothersName' => 'string|max:255',
            'houseName' => 'string|max:255',
            'location' => 'string|max:255',
            'panchayat' => 'string|max:255',
            'po' => 'string|max:255',
            'district' => 'string|max:255',
            'state' => 'string|max:255',
            'pinCode' => 'string|max:10',
            'mobile1' => 'string|max:15',
            'mobile2' => 'nullable|string|max:15',
            'applicant' => 'in:male,female',
            'education' => 'nullable|string|max:255',
            'married' => 'in:yes,no',
            'childrenCount' => 'nullable|integer',
            'maleChildren' => 'nullable|integer',
            'femaleChildren' => 'nullable|integer',
            'occupation' => 'in:yes,no',
            'monthlyIncome' => 'nullable|numeric',
            'otherIncome' => 'nullable|string|max:255',
            'healthStatus' => 'in:satisfactory,chronically ill,differently abled',
            'dailyTreatment' => 'nullable|string',
            'accommodation' => 'in:own house,ancestral home,rental home,other',
            'ownPlace' => 'in:yes,no',
            'measureOfLand' => 'nullable|string|max:255',
            'typeOfLand' => 'nullable|string|max:255',
            'desiredModel' => 'nullable|string|max:255',
            'totalSqrFt' => 'nullable|integer',
            'expected_amount' => 'nullable|numeric',
            'permission' => 'in:yes,no',
            'formOfIntendedHouse' => 'nullable|string|max:255',
            'officeUse' => 'nullable|string|max:255',
        ]); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $applicationId = $this->generateApplicationId('HO'); // 'OC' or your specific project code

        // Prepare data for creation
        $houses = $request->all();
        $houses['applicationId'] = $applicationId; // Set application_id

       
        House::create($houses);
    
        return response()->json(['message' => 'Applicant submitted successfully!']);
        
    } 
    private function generateApplicationId($projectCode)
    {
        // Get the current year
        $year = date('y'); // Get last two digits of the year

        // Generate a 5-digit unique number
        $latest = House::max('houseId'); // Assuming 'id' is an auto-incrementing primary key
        $uniqueNumber = str_pad(($latest + 1), 5, '0', STR_PAD_LEFT); // Increment ID and pad with zeros

        return "APLRCFI{$year}{$projectCode}{$uniqueNumber}";
    }
    public function viewHouse()
    {
        $details =House::all();

        $totalRecords = count( $details); // Total records in your data source
        $filteredRecords = count( $details); // Number of records after applying filters
    
        return response()->json(['draw' => request()->get('draw'),
                                'recordsTotal' => $totalRecords,
                                 'recordsFiltered' => $filteredRecords,
                                  'data' =>  $details]);
        return response()->json(['error' => 'Invalid request'], 400);
    
   
    } 
    public function viewMoreHouse($id)
    {
        $HouseId = House::find($id);
        if (!$HouseId) {
            return response()->json(['error' => 'House details not found'], 404);
        }
        return response()->json($HouseId);
    
    } 
    public function EditHouse($id)
    {
        $houseID = House::findOrFail($id);
        return response()->json($houseID);
    

    } 
    public function updateHouse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'houseId' =>'numeric',
            'name' => 'string|max:255',
            'age' => 'integer',
            'fathersName' => 'string|max:255',
            'mothersName' => 'string|max:255',
            'houseName' => 'string|max:255',
            'location' => 'string|max:255',
            'panchayat' => 'string|max:255',
            'po' => 'string|max:255',
            'district' => 'string|max:255',
            'state' => 'string|max:255',
            'pinCode' => 'string|max:10',
            'mobile1' => 'string|max:15',
            'mobile2' => 'nullable|string|max:15',
            'applicant' => 'in:male,female',
            'education' => 'nullable|string|max:255',
            'married' => 'in:yes,no',
            'childrenCount' => 'nullable|integer',
            'maleChildren' => 'nullable|integer',
            'femaleChildren' => 'nullable|integer',
            'occupation' => 'in:yes,no',
            'monthlyIncome' => 'nullable|numeric',
            'otherIncome' => 'nullable|string|max:255',
            'healthStatus' => 'in:satisfactory,chronically ill,differently abled',
            'dailyTreatment' => 'nullable|string',
            'accommodation' => 'in:own house,ancestral home,rental home,other',
            'ownPlace' => 'in:yes,no',
            'measureOfLand' => 'nullable|string|max:255',
            'typeOfLand' => 'nullable|string|max:255',
            'desiredModel' => 'nullable|string|max:255',
            'totalSqrFt' => 'nullable|integer',
            'expected_amount' => 'nullable|numeric',
            'permission' => 'in:yes,no',
            'formOfIntendedHouse' => 'nullable|string|max:255',
            'officeUse' => 'nullable|string|max:255',
        ]); 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            // Extract validated data
            $validatedData = $validator->validated();
            
            // Find the existing record by ID
           $house = House::findOrFail($validatedData['houseId']);
            
            // Update the record with validated data
           $house->update($validatedData); // This uses the validated data directly
    
            // Return a success response
            return response()->json([
                'status' => 1,
                'message' => 'House details updated successfully!',
                'data' =>$house // Return updated object
            ]);
        } catch (\Exception $e) {
            // Log the exception message for debugging
            \Log::error('Update house details Failed: '.$e->getMessage());
    
            // Return an error response in case of exception
            return response()->json([
                'status' => 0,
                'message' => 'Failed to update house details. Please try again later.'
            ], 500);
        }

    } 

    public function deleteHouse($id)
    {
        try {
            // Find the project by ID
            $house = House::findOrFail($id);
    
            // Delete the project
            $house->delete();
    
            // Return a success response
            return response()->json([
                'status' => 1,
                'message' => 'House Application deleted successfully!'
            ]);
        } catch (Exception $e) {
            // Return an error response if the project could not be deleted
            return response()->json([
                'status' => 0,
                'message' => 'Failed to delete House application. Please try again later.'
            ], 500);
    }
    
    }
}

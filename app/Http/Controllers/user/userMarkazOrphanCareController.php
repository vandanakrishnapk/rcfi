<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\MarkazOrphanCare;
use Illuminate\Http\Request;

class userMarkazOrphanCareController extends Controller
{
    public function getMarkazOrphanCare()
    {
        return view('user.MarkazOrphanCare');
    } 

    public function doMarkazOrphanCare(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'nameOfOrphan' => 'required|string|max:255',
            'nameOfFather' => 'required|string|max:255',
            'nameOfGrandFather' => 'required|string|max:255',
            'nameOfMother' => 'required|string|max:255',
            'nameOfMothersFather' => 'required|string|max:255',
            'maleOrFemale' => 'required|string|in:Male,Female',
            'dateOfBirth' => 'required|date',
            'Age' => 'required|integer',
            'aadharNumber' => 'required|string|unique:markaz_orphan_cares,aadharNumber',
            'nameOfPresentGuardian' => 'required|string|max:255',
            'relationWithOrphan' => 'required|string|max:255',
            'dateOfDeathOfFather' => 'required|date',
            'causeOfDeath' => 'required|string|max:255',
            'motherAliveOrNot' => 'required|string|in:Yes,No',
            'motherDateOfDeath' => 'nullable|date',
            'motherCauseOfDeath' => 'nullable|string|max:255',
            'motherReMarriedOrNot' => 'required|string|in:Yes,No',
            'noOfBrothersAndSisters' => 'required|integer',
            'maleSiblings' => 'required|integer',
            'femaleSiblings' => 'required|integer',
            'monthlyIncome' => 'required|numeric',
            'monthlyExpense' => 'required|numeric',
            'typeOfHouse' => 'required|string|in:Own House,Rental,Flat,Others',
            'nameOfSchool' => 'required|string|max:255',
            'classSchool' => 'required|string|max:255',
            'nameOfMadrassa' => 'required|string|max:255',
            'classMadrassa' => 'required|string|max:255',
            'notStudyReason' => 'required|string|max:255',
            'healthStatus' => 'required|string|max:255',
            'sponsershipDetails' => 'required|string|max:255',
            'houseName' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'postOffice' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'pinCode' => 'required|string|max:255',
            'mobile1' => 'required|string|max:255',
            'mobile2' => 'required|string|max:255',
        ]);
       

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
       
        $applicationId = $this->generateApplicationId('OC'); // 'OC' or your specific project code

        // Prepare data for creation
        $orphanCareData = $request->all();
        $orphanCareData['applicationId'] = $applicationId; // Set application_id

        // Create the record
        MarkazOrphanCare::create($orphanCareData);

        return response()->json(['message' => 'Data saved successfully']);
       }  

       private function generateApplicationId($projectCode)
       {
           // Get the current year
           $year = date('y'); // Get last two digits of the year
   
           // Generate a 5-digit unique number
           $latest = MarkazOrphanCare::max('orphancareId'); // Assuming 'id' is an auto-incrementing primary key
           $uniqueNumber = str_pad(($latest + 1), 5, '0', STR_PAD_LEFT); // Increment ID and pad with zeros
   
           return "APLRCFI{$year}{$projectCode}{$uniqueNumber}";
       }

    public function getMarkazOrphanCareDataTable()
    {
        $details =MarkazOrphanCare::all();
      

        $totalRecords = count( $details); // Total records in your data source
        $filteredRecords = count( $details); // Number of records after applying filters
    
        return response()->json(['draw' => request()->get('draw'),
                                'recordsTotal' => $totalRecords,
                                 'recordsFiltered' => $filteredRecords,
                                  'data' =>  $details]);
        return response()->json(['error' => 'Invalid request'], 400);
    } 

    public function getMarkazOpenCareViewMore($id)
    {

        $OrpanCareId = MarkazOrphanCare::find($id);
        if (!$OrpanCareId) {
            return response()->json(['error' => 'OrpanCare details not found'], 404);
        }
        return response()->json($OrpanCareId);
    } 

    public function editMarkazOrphanCare($id)
    {
        $orphanCare = MarkazOrphanCare::findOrFail($id);
        return response()->json($orphanCare);
    
    }  
    public function updateMarkazOrphanCare(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'orphancareId' => 'required|integer|exists:markaz_orphan_cares,orphancareId', // Ensure ID is valid
            'nameOfOrphan' => 'required|string|max:255',
            'nameOfFather' => 'required|string|max:255',
            'nameOfGrandFather' => 'nullable|string|max:255',
            'nameOfMother' => 'nullable|string|max:255',
            'nameOfMothersFather' => 'nullable|string|max:255',
            'maleOrFemale' => 'required|string|max:10',
            'dateOfBirth' => 'required|date',
            'Age' => 'required|integer',
            'aadharNumber' => 'required|string|max:20',
            'nameOfPresentGuardian' => 'nullable|string|max:255',
            'relationWithOrphan' => 'nullable|string|max:255',
            'dateOfDeathOfFather' => 'nullable|date',
            'causeOfDeath' => 'nullable|string|max:255',
            'motherAliveOrNot' => 'required|string|max:10',
            'motherDateOfDeath' => 'nullable|date',
            'motherCauseOfDeath' => 'nullable|string|max:255',
            'motherReMarriedOrNot' => 'nullable|string|max:10',
            'noOfBrothersAndSisters' => 'nullable|integer',
            'maleSiblings' => 'nullable|integer',
            'femaleSiblings' => 'nullable|integer',
            'monthlyIncome' => 'nullable|numeric',
            'monthlyExpense' => 'nullable|numeric',
            'typeOfHouse' => 'required|string|max:50',
            'nameOfSchool' => 'nullable|string|max:255',
            'classSchool' => 'nullable|string|max:10',
            'nameOfMadrassa' => 'nullable|string|max:255',
            'classMadrassa' => 'nullable|string|max:10',
            'notStudyReason' => 'nullable|string|max:255',
            'healthStatus' => 'nullable|string|max:255',
            'sponsershipDetails' => 'nullable|string|max:255',
            'houseName' => 'nullable|string|max:255',
            'place' => 'nullable|string|max:255',
            'town' => 'nullable|string|max:255',
            'postOffice' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'pinCode' => 'nullable|string|max:10',
            'mobile1' => 'nullable|string|max:15',
            'mobile2' => 'nullable|string|max:15',
        ]);
    
        try {
            // Find the existing record by ID
            $orphanCare = MarkazOrphanCare::findOrFail($validatedData['orphancareId']);
    
            // Update the record with validated data
            $orphanCare->update($validatedData);
    
            // Return a success response
            return response()->json([
                'status' => 1,
                'message' => 'Orphan care details updated successfully!',
                'data' => $orphanCare // Return updated object
            ]);
        } catch (\Exception $e) {
            // Log the exception message for debugging
            \Log::error('Update Orphan Care Failed: '.$e->getMessage());
    
            // Return an error response in case of exception
            return response()->json([
                'status' => 0,
                'message' => 'Failed to update orphan care details. Please try again later.'
            ], 500);
        }
    } 

    public function deleteMarkazOrphanCare($id)
    {

        try {
            // Find the record by ID
            $orphanCare = MarkazOrphanCare::findOrFail($id);
    
            // Delete the record
            $orphanCare->delete();
    
            // Return a success response
            return response()->json([
                'status' => 1,
                'message' => 'Orphan care record deleted successfully!'
            ]);
        } catch (\Exception $e) {
            // Return an error response if the record could not be deleted
            return response()->json([
                'status' => 0,
                'message' => 'Failed to delete orphan care record. Please try again later.'
            ], 500);
        }

    }  


    
    
}

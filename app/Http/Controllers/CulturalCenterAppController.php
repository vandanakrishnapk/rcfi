<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CulturalCentre;
use Illuminate\Support\Facades\Validator;


class CulturalCenterAppController extends Controller
{
    public function getCulturalCenterApp()
    {
        return view('admin.CulturalCenterApplication');
    } 

    public function doCulturalCentreApplication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'applicantName' => 'required|string|max:255',
            'committeeName' => 'required|string|max:255',
            'regNumber' => 'required|string|max:255',
            'year' => 'required|numeric|digits:4',
            'location' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'post' => 'required|string|max:255',
            'panchayath' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'contactNumber1' => 'required|string|max:15',
            'contactNumber2' => 'nullable|string|max:15',
            'submittedBefore' => 'required|string|max:255',
            'receivedSupport' => 'required|string|max:255',
            'mahalluName' => 'required|string|max:255',
            'mahalluLocation' => 'required|string|max:255',
            'mahalluVillage' => 'required|string|max:255',
            'mahalluDistrict' => 'required|string|max:255',
            'mahalluState' => 'required|string|max:255',
            'noOfFamilies' => 'required|integer',
            'requirement' => 'required|string|max:255',
            'hasBuilding' => 'required|string|max:255',
            'buildingStatus' => 'nullable|string|max:255',
            'culturalCenter' => 'required|string|max:255',
            'distanceToCulturalCenter' => 'required|numeric',
            'benefitedHouseholds' => 'required|integer',
            'projectType' => 'required|string|max:255',
            'buildingArea' => 'required|numeric',
            'landArea' => 'required|numeric',
            'proposedBudget' => 'required|numeric',
            'proposedBeneficiary' => 'required|integer',
            'legalApprovals' => 'required|string|max:255',
            'area' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        CulturalCentre::create($request->all());

        return response()->json(['message' => 'Application saved successfully'], 200);

   } 
   public function getCulturalCentreDataTable()
   {  
    $details =CulturalCentre::all();   
    $totalRecords = count( $details); // Total records in your data source
    $filteredRecords = count( $details); // Number of records after applying filters

    return response()->json(['draw' => request()->get('draw'),
                            'recordsTotal' => $totalRecords,
                             'recordsFiltered' => $filteredRecords,
                              'data' =>  $details]);
    return response()->json(['error' => 'Invalid request'], 400);
   } 

   public function getCulturalCentreViewMore($id)
   {
    $CulturalCentreId = CulturalCentre::find($id);
    if (!$CulturalCentreId) {
        return response()->json(['error' => 'Cultural Centre details not found'], 404);
    }
    return response()->json($CulturalCentreId);

   } 

   public function editCulturalCentreApplication($id)
   {
    $CulturalCentreId = CulturalCentre::findOrFail($id);
    return response()->json($CulturalCentreId);

   } 

   public function updateCulturalCentreApplication(Request $request)
   {
    
       // Create a new Validator instance
       $validator = Validator::make($request->all(), [
           'culturalcentreId' => 'required|integer|exists:cultural_centres,culturalcentreId', // Ensure ID is valid and exists
           'applicantName' => 'required|string|max:255',
           'committeeName' => 'required|string|max:255',
           'regNumber' => 'required|string|max:255',
           'year' => 'required|numeric|digits:4',
           'location' => 'required|string|max:255',
           'village' => 'required|string|max:255',
           'post' => 'required|string|max:255',
           'panchayath' => 'required|string|max:255',
           'district' => 'required|string|max:255',
           'state' => 'required|string|max:255',
           'contactNumber1' => 'required|string|max:15',
           'contactNumber2' => 'nullable|string|max:15',
           'submittedBefore' => 'required|string|max:255',
           'receivedSupport' => 'required|string|max:255',
           'mahalluName' => 'required|string|max:255',
           'mahalluLocation' => 'required|string|max:255',
           'mahalluVillage' => 'required|string|max:255',
           'mahalluDistrict' => 'required|string|max:255',
           'mahalluState' => 'required|string|max:255',
           'noOfFamilies' => 'required|integer',
           'requirement' => 'required|string|max:255',
           'hasBuilding' => 'required|string|in:Yes,No',
           'buildingStatus' => 'nullable|string|max:255',
           'culturalCenter' => 'required|string|max:255',
           'distanceToCulturalCenter' => 'required|numeric',
           'benefitedHouseholds' => 'required|integer',
           'projectType' => 'string',
           'buildingArea' => 'required|numeric',
           'landArea' => 'required|numeric',
           'proposedBudget' => 'required|numeric',
           'proposedBeneficiary' => 'required|integer',
           'legalApprovals' => 'required|string|max:255',
           'area' => 'required|string|max:255',
       ]);
   
       // Check if validation failed
       if ($validator->fails()) {
           return response()->json([
               'status' => 0,
               'message' => 'Validation failed',
               'errors' => $validator->errors()
           ], 422);
       }
   
       // Retrieve validated data
       $validatedData = $validator->validated();
   
       try {
           // Find the existing record by ID
           $culturalCentre = CulturalCentre::findOrFail($validatedData['culturalcentreId']);
   
           // Update the record with validated data
           $culturalCentre->update($validatedData);
   
           // Return a success response
           return response()->json([
               'status' => 1,
               'message' => 'Cultural centre details updated successfully!',
               'data' => $culturalCentre // Return updated object
           ]);
       } catch (\Exception $e) {
           // Log the exception message for debugging
           \Log::error('Update Cultural Centre Failed: '.$e->getMessage());
   
           // Return an error response in case of exception
           return response()->json([
               'status' => 0,
               'message' => 'Failed to update cultural centre details. Please try again later.'
           ], 500);
       }
   } 

   public function deleteCulturalCentreApplication($id)
   {
       try {
           // Find the record by ID
           $CulturalCentre = CulturalCentre::findOrFail($id);
   
           // Delete the record
           $CulturalCentre->delete();
   
           // Return a success response
           return response()->json([
               'status' => 1,
               'message' => 'Application deleted successfully!'
           ]);
       } catch (\Exception $e) {
           // Return an error response if the record could not be deleted
           return response()->json([
               'status' => 0,
               'message' => 'Failed to delete Application. Please try again later.'
           ], 500);
       }

   }
   
}

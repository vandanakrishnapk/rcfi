<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\EducationCentre;
use Illuminate\Support\Facades\Validator;
class EducationCenterAppController extends Controller
{
    public function getEducationCenterApplication()
    {
        return view('admin.EducationCentre');
    } 
    public function doEducationCentreApplication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'applicantName' => 'required|string|max:255',
            'committeeName' => 'required|string|max:255',
            'regNumber' => 'required|string|max:255',
            'year' => 'required|integer',
            'location' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'post' => 'required|string|max:255',
            'panchayath' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'contact1' => 'required|string|max:15',
            'contact2' => 'nullable|string|max:15',
            'submittedApplication' => 'nullable|string',
            'financialSupport' => 'nullable|string',
            'mahalluName' => 'required|string|max:255',
            'mahalluLocation' => 'required|string|max:255',
            'mahalluVillage' => 'required|string|max:255',
            'mahalluDistrict' => 'required|string|max:255',
            'mahalluState' => 'required|string|max:255',
            'noOfFamiliesInMahallu' => 'required|integer',
            'requirementRepairing' => 'required|string|max:255',
            'proposedSiteBuilding' => 'required|string|in:Yes,No',
            'currentBuildingStatus' => 'nullable|string',
            'studentsNumber' => 'required|integer',
            'boysNumber' => 'required|integer',
            'girlsNumber' => 'required|integer',
            'educationCenterNearby' => 'nullable|string',
            'culturalCentreDistance' => 'nullable|integer',
            'syllabus' => 'nullable|string',
            'projectType' => 'required|string|in:orphanage,classRoom,educationAcademy',
            'buildingArea' => 'required|integer',
            'landArea' => 'required|integer',
            'classroomsNumber' => 'required|integer',
            'numberOfStudents' => 'required|integer',
            'proposedBudget' => 'required|integer',
            'legalApprovals' => 'nullable|string',
            'area' => 'nullable|string']);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $applicationId = $this->generateApplicationId('EC'); // 'OC' or your specific project code

        // Prepare data for creation
        $educationcentre = $request->all();
        $educationcentre['applicationId'] = $applicationId; // Set application_id

        // Create the record
        EducationCentre::create($educationcentre);

        return response()->json(['message' => 'Data saved successfully']);
       }  

       private function generateApplicationId($projectCode)
       {
           // Get the current year
           $year = date('y'); // Get last two digits of the year
   
           // Generate a 5-digit unique number
           $latest = EducationCentre::max('educationcentreId'); // Assuming 'id' is an auto-incrementing primary key
           $uniqueNumber = str_pad(($latest + 1), 5, '0', STR_PAD_LEFT); // Increment ID and pad with zeros
   
           return "APLRCFI{$year}{$projectCode}{$uniqueNumber}";
       }


    

    public function getEducationCentreDataTable()
    {
    
        $details =EducationCentre::all();
      

        $totalRecords = count( $details); // Total records in your data source
        $filteredRecords = count( $details); // Number of records after applying filters
    
        return response()->json(['draw' => request()->get('draw'),
                                'recordsTotal' => $totalRecords,
                                 'recordsFiltered' => $filteredRecords,
                                  'data' =>  $details]);
        return response()->json(['error' => 'Invalid request'], 400); 
    } 

    public function getEducationCentreViewMore($id)
    {
        $EducationCentreId = EducationCentre::find($id);
        if (!$EducationCentreId) {
            return response()->json(['error' => 'Education Centre details not found'], 404);
        }
        return response()->json($EducationCentreId);
 

    } 

    public function editEducationCentreApplication($id)
    {
        $EducationCentreId = EducationCentre::findOrFail($id);
        return response()->json($EducationCentreId);
    
    }  

    public function updateEducationCentreApplication(Request $request)
    {
         // Validate incoming request data
    $validatedData = $request->validate([
        'educationcentreId' => 'required|integer', // Ensure ID is valid
        'applicantName' => 'required|string|max:255',
        'committeeName' => 'required|string|max:255',
        'regNumber' => 'required|string|max:255',
        'year' => 'required|integer',
        'location' => 'required|string|max:255',
        'village' => 'required|string|max:255',
        'post' => 'required|string|max:255',
        'panchayath' => 'required|string|max:255',
        'district' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'contact1' => 'required|string|max:15',
        'contact2' => 'nullable|string|max:15',
        'submittedApplication' => 'nullable|string',
        'financialSupport' => 'nullable|string',
        'mahalluName' => 'required|string|max:255',
        'mahalluLocation' => 'required|string|max:255',
        'mahalluVillage' => 'required|string|max:255',
        'mahalluDistrict' => 'required|string|max:255',
        'mahalluState' => 'required|string|max:255',
        'noOfFamiliesInMahallu' => 'required|integer',
        'requirementRepairing' => 'required|string|max:255',
        'proposedSiteBuilding' => 'required|string|in:Yes,No',
        'currentBuildingStatus' => 'nullable|string',
        'studentsNumber' => 'required|integer',
        'boysNumber' => 'required|integer',
        'girlsNumber' => 'required|integer',
        'educationCenterNearby' => 'nullable|string',
        'culturalCentreDistance' => 'nullable|integer',
        'syllabus' => 'nullable|string',
        'projectType' => 'required|string|in:orphanage,classRoom,educationAcademy',
        'buildingArea' => 'required|integer',
        'landArea' => 'required|integer',
        'classroomsNumber' => 'required|integer',
        'numberOfStudents' => 'required|integer',
        'proposedBudget' => 'required|integer',
        'legalApprovals' => 'nullable|string',
        'area' => 'nullable|string',
    ]);

    try {
        // Find the existing record by ID
        $educationCentre = EducationCentre::findOrFail($validatedData['educationcentreId']);

        // Update the record with validated data
        $educationCentre->update($validatedData);

        // Return a success response
        return response()->json([
            'status' => 1,
            'message' => 'Education centre details updated successfully!',
            'data' => $educationCentre // Return updated object
        ]);
    } catch (\Exception $e) {
        // Log the exception message for debugging
        \Log::error('Update Education Centre Failed: '.$e->getMessage());

        // Return an error response in case of exception
        return response()->json([
            'status' => 0,
            'message' => 'Failed to update education centre details. Please try again later.'
        ], 500);
    }

    } 

    public function deleteEducationCentreApplication($id)
    {
        try {
            // Find the record by ID
            $educationCentre = EducationCentre::findOrFail($id);
    
            // Delete the record
            $educationCentre->delete();
    
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

<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function getShopAndOthers()
    {
        return view('admin.shops');
    } 

    public function doShopAndOthers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'applicantName' => 'required|string|max:255',
            'committeeName' => 'required|string|max:255',
            'registerNumber' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'place' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'post' => 'required|string|max:255',
            'panchayat' => 'required|string|max:255',
            'district1' => 'required|string|max:255',
            'district2' => 'required|string|max:255',
            'state1' => 'required|string|max:255',
            'state2' => 'required|string|max:255',
            'mobileNumber1' => 'required|string|max:15',
            'mobileNumber2' => 'nullable|string|max:15',
            'mahalName' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'isBuildingCurrent' => 'required|string|max:255',
            'currentStatus' => 'nullable|string',
            'buildingArea' => 'required|integer',
            'placeStreet' => 'required|string|max:255',
            'estimatedAmount' => 'required|numeric',
            'familiesBenefited' => 'required|integer',
            'legalPermissions' => 'required|string|max:255',
            'typeApproved' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'numberOfRooms' => 'required|integer',
            'office_use' =>'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $applicationId = $this->generateApplicationId('SO'); // 'OC' or your specific project code
        // Prepare data for creation
        $shops = $request->all();
        $shops['applicationId'] = $applicationId; // Set application_id
        Shop::create($shops);
    
        return response()->json(['message' => 'Shop submitted successfully!']);

    } 
    private function generateApplicationId($projectCode)
    {
        // Get the current year
        $year = date('y'); // Get last two digits of the year

        // Generate a 5-digit unique number
        $latest = Shop::max('shopId'); // Assuming 'id' is an auto-incrementing primary key
        $uniqueNumber = str_pad(($latest + 1), 5, '0', STR_PAD_LEFT); // Increment ID and pad with zeros

        return "APLRCFI{$year}{$projectCode}{$uniqueNumber}";
    }

    public function viewShopAndOther()
    {
        $details =Shop::all();

        $totalRecords = count( $details); // Total records in your data source
        $filteredRecords = count( $details); // Number of records after applying filters
    
        return response()->json(['draw' => request()->get('draw'),
                                'recordsTotal' => $totalRecords,
                                 'recordsFiltered' => $filteredRecords,
                                  'data' =>  $details]);
        return response()->json(['error' => 'Invalid request'], 400);
 
    } 
    public function viewMoreShopAndOther($id)
    {
        $shopId = Shop::find($id);
        if (!$shopId) {
            return response()->json(['error' => 'Shops or others details not found'], 404);
        }
        return response()->json($shopId);

    } 

    public function EditShopAndOther($id)
    {
        $shopId = Shop::findOrFail($id);
        return response()->json($shopId);
      
    } 
    public function updateShopAndOther(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shopId' =>'numeric',
            'applicantName' => 'string|max:255',
            'committeeName' => 'string|max:255',
            'registerNumber' => 'string|max:255',
            'year' => 'integer|min:1900|max:' . date('Y'),
            'place' => 'string|max:255',
            'village' => 'string|max:255',
            'post' => 'string|max:255',
            'panchayat' => 'string|max:255',
            'district1' => 'string|max:255',
            'district2' => 'string|max:255',
            'state1' => 'string|max:255',
            'state2' => 'string|max:255',
            'mobileNumber1' => 'string|max:15',
            'mobileNumber2' => 'nullable|string|max:15',
            'mahalName' => 'string|max:255',
            'location' => 'string|max:255',
            'isBuildingCurrent' => 'string|max:255',
            'currentStatus' => 'nullable|string',
            'buildingArea' => 'integer',
            'placeStreet' => 'string|max:255',
            'estimatedAmount' => 'numeric',
            'familiesBenefited' => 'integer',
            'legalPermissions' => 'string|max:255',
            'typeApproved' => 'string|max:255',
            'area' => 'string|max:255',
            'numberOfRooms' => 'integer',
            'office_use' =>'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            // Extract validated data
            $validatedData = $validator->validated();
            
            // Find the existing record by ID
            $shop = Shop::findOrFail($validatedData['shopId']);
            
            // Update the record with validated data
            $shop->update($validatedData); // This uses the validated data directly
    
            // Return a success response
            return response()->json([
                'status' => 1,
                'message' => 'Shop and Other details updated successfully!',
                'data' => $shop // Return updated object
            ]);
        } catch (\Exception $e) {
            // Log the exception message for debugging
            \Log::error('Update Shop and other details Failed: '.$e->getMessage());
    
            // Return an error response in case of exception
            return response()->json([
                'status' => 0,
                'message' => 'Failed to update Shop and other details. Please try again later.'
            ], 500);
        }
    
    } 

    public function deleteShopAndOther($id)
    {
        try {
            // Find the project by ID
            $shop = Shop::findOrFail($id);
    
            // Delete the project
            $shop->delete();
    
            // Return a success response
            return response()->json([
                'status' => 1,
                'message' => 'Shops and other Application deleted successfully!'
            ]);
        } catch (Exception $e) {
            // Return an error response if the project could not be deleted
            return response()->json([
                'status' => 0,
                'message' => 'Failed to delete  shops and other application. Please try again later.'
            ], 500);
    }
    }
}

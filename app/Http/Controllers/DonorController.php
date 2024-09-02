<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DonorController extends Controller
{ 
    public function donorView()
    {
    return view('admin.donor_view');
    
    }

    public function getDonorData(Request $request)
    {
        if ($request->ajax()) {
            $donors = DB::table('donors')->select(['donor_id', 'partner_name', 'short_name', 'partner_website', 'type_of_partner', 'type_of_fund', 'contact_person', 'support_date', 'contact_email', 'contact_phone'])->get();
            $totalRecords = $donors->count(); // Total records in your data source
            $filteredRecords = $donors->count(); // Number of records after applying filters
    
            return response()->json([
                'draw' => (int) $request->get('draw'),
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $filteredRecords,
                'data' => $donors,
            ]);
    }
    
    return response()->json(['error' => 'Invalid request'], 400);
} 
public function show($id)
{
    $donor = Donor::findOrFail($id);
    return response()->json($donor);
}

public function edit($id)
{
    $donor = Donor::findOrFail($id);
    return response()->json($donor);
}

public function update(Request $request, $id)
{
    $donor = Donor::findOrFail($id);
    $validator = Validator::make($request->all(), [
        'partner_name' => 'string|max:255',
        'short_name' => 'string|max:100',
        'partner_website' => 'string',
        'type_of_partner' => 'string',
        'type_of_fund' => 'string',
        'contact_person' => 'string|max:255',
        'support_date' => 'date_format:Y-m',
        'contact_email' => 'email|max:255',
        'contact_phone' => 'string|max:10',
    ],
    [
        'partner_name.string' => 'name should be a string',
        'short_name.string' => 'short name should be a string',
        'partner_website.string' => 'should be a website name',
        'type_of_partner.string' => 'type of partner should be a string',
        'type_of_fund.string' => 'type of fund should be a string',
        'contact_person.string' => 'contact person should be a string',
        'support_date.month' => 'should select month and year',
        'contact_email.email' => 'contact mail should be an email id',
        'contact_phone.max' => 'contact phone should be 10 digits',
    ]
);

if ($validator->fails()) {
    // Return validation errors as JSON
    return response()->json([
        'status' => 0,
        'error' => $validator->errors()]);
}
  //update the partner

 
    if ($donor->update($request->all())) {
        return response()->json([
            'status' => 1,
            'message' => 'Partner updated successfully!',
        ]);
    } else {
        return response()->json([
            'status' => 2,
            'message' => 'Something went wrong!', 
        ]);
   
   
}
}

public function destroy($id)
{
    Donor::findOrFail($id)->delete();
    return response()->json([
        'status' =>1,
        'message' => 'Donor deleted successfully']);
}
   
}



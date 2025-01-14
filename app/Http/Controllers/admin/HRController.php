<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use App\Models\LeaveType;
use App\Models\LeaveAllocation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class HRController extends Controller
{
    public function getHRModule()
    {
        $emps = User::where('role','=',7)->get();
        $leaves = DB::table('leave_types')->select('leavetypeId','leave_name')->get();
        return view('admin.hrmodule',compact('emps','leaves'));
    } 

 
    
public function newEmployee(Request $request)
{
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'mobile' => 'required|numeric|digits:10',
            'designation' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'date_of_joining' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'marital_status' => 'nullable',
            'house_name_or_no' => 'nullable|string|max:255',
            'place' => 'nullable|string|max:255',
            'po' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'pin_code' => 'nullable|string|max:6',
            'mobile_professional' => 'nullable|string|max:15',
            'email_professional' => 'nullable|email',
            'aadhar_number' => 'nullable|string|max:12',
            'pan_card_number' => 'nullable|string|max:10',
            'account_number' => 'nullable|string|max:20',
            'bank_name' => 'nullable|string|max:255',
            'bank_branch' => 'nullable|string|max:255',
            'ifsc_code' => 'nullable|string|max:11',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'designation' => $request->designation,
            'password' => bcrypt($request->password), // Hashing the password
            'role' =>7,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'date_of_birth' => $request->date_of_birth,
            'date_of_joining' => $request->date_of_joining,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'house_name_or_no' => $request->house_name_or_no,
            'place' => $request->place,
            'po' => $request->po,
            'district' => $request->district,
            'state' => $request->state,
            'pin_code' => $request->pin_code,
            'mobile_professional' => $request->mobile_professional,
            'email_professional' => $request->email_professional,
            'aadhar_number' => $request->aadhar_number,
            'pan_card_number' => $request->pan_card_number,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'ifsc_code' => $request->ifsc_code,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    

       
        return response()->json(['message' => 'Employee created successfully!']);
    }


public function getEmployeeName($id)
{
  // Find the employee by ID (make sure Employee model exists)
  $employee = User::find($id);

  if ($employee) {
      // Return the employee name as a JSON response
      return response()->json(['employee_name' => $employee->name]);
  } else {
      // If employee is not found, return an error message
      return response()->json(['error' => 'Employee not found'], 404);
  }

}




public function empDatatable(Request $request)
{
    if ($request->ajax()) {
        $data = DB::table('users')->where(['role'=>7])
               ->get();

        // Retrieve parameters from DataTables
        $draw = $request->get('draw');
        $totalRecords = count($data);
        $filteredRecords = count($data);

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data,
        ]);
    }
    return response()->json(['error' => 'Invalid request'], 400);
} 

public function editEmployee($id)
{
    $user = User::findOrFail($id);
    return response()->json($user);
} 

public function updateEmployee(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email',
        'mobile' => 'required|numeric|digits:10',
        'designation' => 'required|string|max:255',
        'father_name' => 'nullable|string|max:255',
        'mother_name' => 'nullable|string|max:255',
        'date_of_birth' => 'nullable|date',
        'date_of_joining' => 'nullable|date',
        'gender' => 'nullable|in:Male,Female,Other',
        'marital_status' => 'nullable',
        'house_name_or_no' => 'nullable|string|max:255',
        'place' => 'nullable|string|max:255',
        'po' => 'nullable|string|max:255',
        'district' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'pin_code' => 'nullable|string|max:6',
        'mobile_professional' => 'nullable|string|max:15',
        'email_professional' => 'nullable|email',
        'aadhar_number' => 'nullable|string|max:12',
        'pan_card_number' => 'nullable|string|max:10',
        'account_number' => 'nullable|string|max:20',
        'bank_name' => 'nullable|string|max:255',
        'bank_branch' => 'nullable|string|max:255',
        'ifsc_code' => 'nullable|string|max:11',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }  
    try {
        $project = User::findOrFail($request->input('id'));
        $project->update($validator->validated());

        return response()->json([
            'status' => 1,
            'message' => 'Project updated successfully.',
        ]);
    } catch (\Exception $e) {
        \Log::error('Update Employee Failed: ' . $e->getMessage());
        return response()->json([
            'status' => 0,
            'message' => 'Failed to update employee. Please try again later.'
        ], 500);
    }


}

public function leaveDetails($id)
{
    $leaveApplications = DB::table('leave_applications')
        ->join('leave_types', 'leave_types.leavetypeId', '=', 'leave_applications.leave_type_id')
        ->select(
            'leave_applications.leave_duration_start',
            'leave_applications.leave_duration_end',
            'leave_types.leave_name',
            DB::raw('DATEDIFF(leave_applications.leave_duration_end, leave_applications.leave_duration_start) + 1 as leave_days') // +1 because we include the start day
        )
        ->where('leave_applications.user_id', $id) // Filter by the employee's ID
        ->get();

    // Format the dates using Carbon and return the formatted data as JSON
    $leaveApplications->transform(function ($item) {
        $item->leave_duration_start = Carbon::parse($item->leave_duration_start)->format('d M, Y');
        $item->leave_duration_end = Carbon::parse($item->leave_duration_end)->format('d M, Y');
        return $item;
    });

    // Return the leave details as JSON
    return response()->json([
        'leaveApplications' => $leaveApplications
    ]);
}
}

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
class HRController extends Controller
{
    public function getHRModule()
    {
        $emps = User::where('role','=',7)->get();
        $leaves = LeaveType::all();
        return view('admin.hrmodule',compact('emps','leaves'));
    } 

 
    
public function newEmployee(Request $request)
{
    // Validation rules
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email',
        'mobile' => 'required|string|max:15',
        'designation' => 'required|string|max:255',
        'password' => 'required|string|min:6', // Make sure to validate password properly
    ]);

    // If validation fails
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Prepare the data for storage
    $employeeData = $request->all();
    
    // Encrypt password before storing it in the database
    $employeeData['password'] = bcrypt($request->password);
    $employeeData['role'] =7;

    // Insert into the database (assuming you have an Employee model)
    User::create($employeeData);

    // Respond with a success message
    return response()->json(['message' => 'Employee submitted successfully!']);
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
public function doLeaveAllocate(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'employeeId' => 'required|exists:users,id',  // Make sure employee exists
        'employee_name' => 'required|string|max:255',
        'leave_type' => 'required', // Validate leave type
        'leave_days' => 'required|integer|min:1',
    ]);

    // Assuming you have a model called LeaveAllocation to save leave records
    $leaveAllocation = new LeaveAllocation();
    $leaveAllocation->employeeId = $request->employeeId;
    $leaveAllocation->employee_name = $request->employee_name;
    $leaveAllocation->leave_type = $request->leave_type;
    $leaveAllocation->leave_days = $request->leave_days;
    $leaveAllocation->allocated_by = Auth::user()->id;  // Assuming HR is authenticated and you save the HR's user ID
    $leaveAllocation->save();

    return response()->json(['message' => 'Leave allocated successfully!']);
}


public function empDatatable(Request $request)
{
    if ($request->ajax()) {
        // Modify the query to filter only orphan care projects (project_id contains 'OC')
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
    
}

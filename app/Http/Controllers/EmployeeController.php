<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LeaveType;
use App\Models\LeaveAllocation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\LeaveApplication;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class EmployeeController extends Controller
{
    public function getEmployeeDashboard()
    { 
        $leavetypes = DB::table('leave_types')->get();
        return view('user.employee.empdashboard',compact('leavetypes'));
    } 
 
public function doLeaveRequest(Request $request)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'leave_type_id' => 'required|exists:leave_types,leavetypeId',
        'leave_duration_start' => 'required|date',
        'leave_duration_end' => 'required|date|after_or_equal:leave_duration_start',
        'remarks' => 'nullable|string',
    ]);

    // Get the authenticated employee (user)
    $employee = Auth::user(); // Assuming the employee is authenticated

    // Get the leave type
    $leaveType = DB::table('leave_types')->where('leavetypeId', $validated['leave_type_id'])->first();

    // Check if the employee has exceeded the yearly leave limit across all leave types
    $usedLeavesCount=null;
    $usedLeavesCount = LeaveApplication::where('user_id', $employee->id) // Filter by the employee
    ->whereYear('leave_duration_start', Carbon::now()->year) // Filter by the current year
    ->where('leave_type_id', $leaveType->leavetypeId) // Filter by the specific leave type (e.g., Sick Leave)
    ->sum(DB::raw('DATEDIFF(leave_duration_end, leave_duration_start) + 1')); // Sum the days taken


    // If the employee has already used more leaves than the yearly limit
    if ($usedLeavesCount > $leaveType->yearly_limit) 
{
    return response()->json([
        'success' => false,
        'message' => "You have already used all your " . $leaveType->leave_name . " for the year."
    ], 400);
}


    // // Calculate the number of leave days requested
    // $leaveDaysRequested = Carbon::parse($validated['leave_duration_start'])
    //     ->diffInDays(Carbon::parse($validated['leave_duration_end'])) + 1; // inclusive of both days

    // // Ensure that the employee doesn't exceed the yearly limit after the requested leave
    // if (($usedLeavesCount + $leaveDaysRequested) > $leaveType->yearly_limit) {
    //     return response()->json([
    //         'success' =>false,
    //         'message' => "You do not have enough leave balance for this request. Your yearly limit is " . $leaveType->yearly_limit . " days. and you have used" .$usedLeavesCount ."days already"
    //     ], 400);
    // }

    // Proceed with creating the leave request application
    LeaveApplication::create([
        'user_id' => $employee->id,
        'leave_type_id' => $validated['leave_type_id'],
        'leave_duration_start' => $validated['leave_duration_start'],
        'leave_duration_end' => $validated['leave_duration_end'],
        'remarks' => $validated['remarks'],
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Leave request submitted successfully.'
    ]);
}
 
public function viewProfile()
{
   
    // Retrieve the currently logged-in user (employee)
    $employee = Auth::user();

    // Fetch all leave types (for displaying leave types on the profile page)
    $leavetypes = DB::table('leave_types')->get();

    // Fetch leave applications for the employee
    $leaveApplications = DB::table('leave_applications')
        ->join('leave_types', 'leave_types.leavetypeId', '=', 'leave_applications.leave_type_id')
        ->select(
            'leave_applications.leave_duration_start', 
            'leave_applications.leave_duration_end', 
            'leave_types.leave_name',
            DB::raw('DATEDIFF(leave_applications.leave_duration_end, leave_applications.leave_duration_start) + 1 as leave_days') // +1 because we include the start day
        )
        ->where('leave_applications.user_id', $employee->id) // Filter by the authenticated user
        ->get(); // Get all leave applications for the user

    // Pass the employee, leave types, and leave applications data to the view
    return view('user.employee.viewprofile', compact('employee', 'leaveApplications', 'leavetypes'));
}
 

    
}

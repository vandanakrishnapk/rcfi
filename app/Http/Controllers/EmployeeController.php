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
class EmployeeController extends Controller
{
    public function getEmployeeDashboard()
    { 
        $leavetypes = LeaveType::all();
        return view('user.employee.empdashboard',compact('leavetypes'));
    } 
 

    public function doLeaveRequest(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'leave_duration_start' => 'required|date',
            'leave_duration_end' => 'required|date',
            'leave_type_id' => 'required|exists:leave_types,leavetypeId',
            'remarks' => 'nullable|string|max:255',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            // Return validation errors with 422 status code (Unprocessable Entity)
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
    
        // Create a new leave request if validation passes
        LeaveApplication::create([
            'user_id' => Auth::id(),  // Assuming the user is logged in
            'leave_duration_start' => $request->leave_duration_start,
            'leave_duration_end' => $request->leave_duration_end,
            'leave_type_id' => $request->leave_type_id,
            'remarks' => $request->remarks,
        ]);
    
        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Leave request submitted successfully!',
        ]);
    } 

    public function viewProfile()
    { 
        $data =DB::table('leave_applications')
           ->leftjoin('leave_types','leave_applications.leave_type_id','=','leave_types.leavetypeId')
           ->leftjoin('leave_allocations','leave_allocations.employeeId','=','leave_applications.userId')
           ->get();
        return view('user.employee.viewprofile',compact('data'));
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
class HRController extends Controller
{
    public function getHRModule()
    {
        return view('admin.hrmodule');
    } 

 
    
public function newEmployee(Request $request)
{
    // Validation rules
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email',
        'mobile' => 'required|string|max:15',
        'position' => 'required|string|max:255',
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

    // Insert into the database (assuming you have an Employee model)
    Employee::create($employeeData);

    // Respond with a success message
    return response()->json(['message' => 'Employee submitted successfully!']);
}
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
  
        public function getUserData(Request $request)
        {
            if ($request->ajax()) {
                $users = User::select(['id','name', 'email', 'mobile','designation'])->get();
                $totalRecords = count($users); // Total records in your data source
                $filteredRecords = count($users); // Number of records after applying filters
            
                return response()->json(['draw' => request()->get('draw'),
                                        'recordsTotal' => $totalRecords,
                                         'recordsFiltered' => $filteredRecords,
                                          'data' => $users]);
            }
            return response()->json(['error' => 'Invalid request'], 400);
        }
    
        public function home()
        {
            return view('user.home');
        } 
        public function show($id)
        {
            $user = User::findOrFail($id);
            return response()->json($user);
        }
    
        public function edit($id)
        {
            $user = User::findOrFail($id);
            return response()->json($user);
        }
    
        public function update(Request $request, $id)
        {
            $user = User::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'name' => 'min:2',
                'email' => 'email',
                'mobile' => 'digits:10',
                'password' => 'min:8',
                'designation' => 'string',
                    ], 
                    [                       
                        'name.min' => 'Name must be at least 2 characters.',                        
                        'email.email' => 'Invalid email format.',                        
                        'mobile.digits' => 'Mobile number must be 10 digits.',                       
                        'password.min' => 'Password must be at least 8 characters.',
                    ]);
        
            // Check if validation fails
            if ($validator->fails()) {
                // Return validation errors as JSON
                return response()->json([
                    'status' => 0,
                    'error' => $validator->errors()]);
            }
        
            if($user->update($request->all()))
            {
                return response()->json([
                    'status' =>1,
                    'message' =>'User updated successfully',
                ]);
            }
            else {
                return response()->json([
                    'status' => 2,
                    'message' => 'Something went wrong!', 
                ]);
            }
            
        }
    
        public function destroy($id)
        {
            User::findOrFail($id)->delete();
            return response()->json([
                'status' =>1,
                'message' => 'User deleted successfully']);
        }
    }
    


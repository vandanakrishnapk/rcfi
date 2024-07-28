<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
            $user->update($request->all());
            return response()->json(['success' => 'User updated successfully']);
        }
    
        public function destroy($id)
        {
            User::findOrFail($id)->delete();
            return response()->json(['success' => 'User deleted successfully']);
        }
    }
    


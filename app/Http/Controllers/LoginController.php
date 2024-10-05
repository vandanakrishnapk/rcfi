<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function admin_login()
    {
        return view('admin.pages-login');
    } 
 
    public function do_admin_login(Request $request)
    { 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only(['email','password']);
        if(Auth::attempt($credentials))
        {
              
            $user = Auth::user();
            if ($user->role === 1 || $user->role === 2) {
                $request->session()->regenerate();
                return redirect()->route('admin.home');
            }
            elseif($user->role === 3 || $user->role === 4) 
            {
                
                $request->session()->regenerate();
                return redirect()->route('user.home');
            }
            else
           {
                // Handle the case where the role is not 0
                Auth::logout();
                return redirect()->route('login')->withErrors(['role' => 'Unauthorized role.']);
            }

        }
        
        else {
            // Handle failed login attempt
            return redirect()->route('login')->withErrors(['email' => 'The provided credentials do not match our records.']);
        }
} 
public function logout()
{
    Auth::guard('admin')->logout();
    return redirect()->route('login');
} 
}

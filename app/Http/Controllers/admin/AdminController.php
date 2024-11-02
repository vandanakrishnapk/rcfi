<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\User;
use App\Models\Donor;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    // public function index()
    // {
    //     return view('index');
    // } 

public function admin_home()
{
    $user =DB::table('users')->count();
    $donor = DB::table('donors')->count();

    $markaz =DB::table('markaz_orphan_cares')->count();
    $educ =DB::table('education_centres')->count();
    $sweet =DB::table('sweet_water_projects')->count();
    $cult =DB::table('cultural_centres')->count();
    $applications =$markaz+$educ+$sweet+$cult;
    $pro =DB::table('projects')->count();
    return view('admin.admin_home',compact('user','donor','applications','pro'));
}

public function forgot_password()
{
    return view('admin.pages-recoverpw');
}
public function send_mail_reset()
{
return view('email.reset_password');
}
public function submitForgetPasswordForm(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $token = Str::random(64);

    DB::table('password_reset_tokens')->insert([
        'email' => $request->email, 
        'token' => $token, 
        'created_at' => Carbon::now()
    ]);

    Mail::send('email.reset_password', ['token' => $token], function($message) use($request) {
        $message->to($request->email);
        $message->subject('Reset Password');
    });

    return back()->with('message', 'We have sent an email with the password reset link!');
}

public function change_password_form($token)
{
    return view('email.change_password_form',['token'=>$token]);
}



 /**
  * Write code on Method
  *
  * @return response()
  */
  public function submitResetPasswordForm(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string|min:8',
        'password_confirmation' => 'required|same:password'
    ], [
        'email.required' => 'Email ID is required',
        'email.email' => 'Please enter a valid email address',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 8 characters',
        'password_confirmation.required' => 'Confirm password is required',
        'password_confirmation.same' => 'The confirm password and password must match',
    ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }
  
      $updatePassword = DB::table('password_reset_tokens')
          ->where([
              'email' => $request->email,
              'token' => $request->token
          ])->first();
  
      if (!$updatePassword) {
          return back()->withInput()->with('error', 'Invalid token!');
      }
  
      $user = Admin::where('email', $request->email)
          ->update(['password' => bcrypt($request->password)]);
  
      DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();
  
      return redirect()->route('login')->with('message', 'Password has been changed!');
  } 
public function data_table()
{
    return view('admin.data_table');
} 

public function do_add_user(Request $request)
{
   
  // Validation rules
$validator = Validator::make($request->all(), [
    'name' => 'required|min:2',
    'email' => 'required|email',
    'mobile' => 'required|digits:10',
    'password' => 'required|min:8',
    'designation' => 'required|string',
], [
    'name.required' => 'Name is required.',
    'name.min' => 'Name must be at least 2 characters.',
    'email.required' => 'Email is required.',
    'email.email' => 'Invalid email format.',
    'mobile.required' => 'Mobile number is required.',
    'mobile.digits' => 'Mobile number must be 10 digits.',
    'password.required' => 'Password is required.',
    'password.min' => 'Password must be at least 8 characters.',
    'designation.required' => 'Designation is required.',
]);

// Check if validation fails
if ($validator->fails()) {
    return response()->json([
        'status' => 0,
        'error' => $validator->errors()
    ]);
}

// Determine role based on designation
$designation = $request->input('designation');
$role = null;

switch ($designation) {
    case 'Admin':
        $role = 1;
        break;
    case 'COO':
        $role = 2; // assuming COO is role 2, not 3
        break;
    case 'Project Manager':
        $role = 3;
        break;
    case 'Project Engineer':
        $role = 4;
        break;
    case 'Financial Manager':
        $role = 5;
        break;
    case 'HOD':
        $role = 6;
        break;
    default:
        return response()->json([
            'status' => 0,
            'error' => 'Invalid designation.'
        ]);
}

// Prepare data for insertion
$data = [
    'name' => $request->input('name'),
    'email' => $request->input('email'),
    'mobile' => $request->input('mobile'),
    'designation' => $designation,
    'password' => bcrypt($request->input('password')),
    'role' => $role, // Add the role to the data array
];

// Insert data into the database
if (DB::table('users')->insert($data)) {
    return response()->json([
        'status' => 1,
        'message' => 'User created successfully!',
    ]);
} else {
    return response()->json([
        'status' => 2,
        'message' => 'Something went wrong!', 
    ]);
}

}

public function doAddDonor(Request $request)
{
    $validator = Validator::make($request->all(), [
        'partner_name' => 'required|string|max:255',
        'short_name' => 'required|string|max:100',
        'partner_website' => 'required',
        'type_of_partner' => 'required|string',
        'type_of_fund' => 'required|string',
        'contact_person' => 'required|string|max:255',
        'support_date' => 'required|date_format:Y-m',
        'contact_email' => 'required|email|max:255',
        'contact_phone' => 'required|string|max:12',
    ],
    [
        'partner_name.required' => 'name is required',
        'short_name.required' => 'short name is required',
        'partner_website.required' => 'website name required',
        'type_of_partner.required' => 'type of partner required',
        'type_of_fund.required' => 'type of fund is required',
        'contact_person.required' => 'contact person is required',
        'support_date.required' => 'support date is required',
        'contact_email.required' => 'contact mail required',
        'contact_phone' => 'contact phone is required',
    ]
);

if ($validator->fails()) {
    // Return validation errors as JSON
    return response()->json([
        'status' => 0,
        'error' => $validator->errors()]);
}
    // Create the partner
    $data = [
        'partner_name' => $request->input('partner_name'),
        'short_name' => $request->input('short_name'),
        'partner_website' => $request->input('partner_website'),
        'type_of_partner' => $request->input('type_of_partner'),
        'type_of_fund' => $request->input('type_of_fund'),
        'contact_person' => $request->input('contact_person'),
        'support_date' => $request->input('support_date'),
        'contact_email' => $request->input('contact_email'),
        'contact_phone' => $request->input('contact_phone'),
    ];
    if (DB::table('donors')->insert($data)) {
        return response()->json([
            'status' => 1,
            'message' => 'Partner created successfully!',
        ]);
    } else {
        return response()->json([
            'status' => 2,
            'message' => 'Something went wrong!', 
        ]);
    }

   
}  

public function getApplications()
{
    $markazCount = DB::table('markaz_orphan_cares')->count();

    $sweetCount = DB::table('sweet_water_projects')->count();

    $diffCount = DB::table('differently_abled')->count();

    $famCount = DB::table('families')->count();

   $general = DB::table('general_projects')->count();
    return view('admin.applications',compact('markazCount','sweetCount','diffCount','famCount','general'));
}
 

}
  



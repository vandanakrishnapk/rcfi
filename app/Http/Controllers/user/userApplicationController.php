<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\User;
use App\Models\Donor;
class userApplicationController extends Controller
{
    public function getApplications()
    {
       
    $markazCount = DB::table('markaz_orphan_cares')->count();

    $sweetCount = DB::table('sweet_water_projects')->count();

    $diffCount = DB::table('differently_abled')->count();

    $famCount = DB::table('families')->count();

   $general = DB::table('general_projects')->count();
    return view('user.applications',compact('markazCount','sweetCount','diffCount','famCount','general'));
    }
}

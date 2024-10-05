<?php

namespace App\Http\Controllers;

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
        $eduCount = DB::table('education_centres')->count();
        $culturalCount = DB::table('cultural_centres')->count();
        $sweetCount = DB::table('sweet_water_projects')->count();
    
        return view('user.applications',compact('markazCount','eduCount','culturalCount','sweetCount'));
    }
}

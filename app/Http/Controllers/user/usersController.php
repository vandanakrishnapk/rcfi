<?php


namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class usersController extends Controller
{                
        
            public function home()
            {
                $markaz =DB::table('markaz_orphan_cares')->count();
                $educ =DB::table('education_centres')->count();
                $sweet =DB::table('sweet_water_projects')->count();
                $cult =DB::table('cultural_centres')->count();
                $applications =$markaz+$educ+$sweet+$cult;
                $pro =DB::table('projects')->count();
                return view('user.home',compact('applications','pro'));
            } 
          
        
          
        }
        
    
    


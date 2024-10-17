<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConstructionController extends Controller
{
    public function getConstruction()
    {
        $eduCount = DB::table('education_centres')->count();
       $culturalCount = DB::table('cultural_centres')->count();
   
        return view('admin.construction',compact('eduCount','culturalCount'));
    }
}

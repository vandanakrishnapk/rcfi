<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConstructionController extends Controller
{
    public function getConstruction()
    {
        $eduCount = DB::table('education_centres')->count();
       $culturalCount = DB::table('cultural_centres')->count();
       $medical = DB::table('medicals')->count();
       $shops = DB::table('shops')->count();
       $house = DB::table('houses')->count();
        return view('admin.construction',compact('eduCount','culturalCount','medical','shops','house'));
       
    } 
    public function getProConstruction()
    {
        $Education = DB::table('projects')->where('typeOfProject','=','Education Centre')->count();

        $culturalCount = DB::table('projects')->where('typeOfProject','=','Cultural Centre')->count();
        $medical = DB::table('projects')->where('typeOfProject','=','Hospitals or Clinics')->count();
        $shops = DB::table('projects')->where('typeOfProject','=','Shops and Other')->count();
        $house = DB::table('projects')->where('typeOfProject','=','House')->count();
        return view('admin.proconstruction',compact('Education','culturalCount','medical','shops','house'));
    }
}

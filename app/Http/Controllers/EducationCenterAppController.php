<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationCenterAppController extends Controller
{
    public function getEducationCenterApplication()
    {
        return view('admin.EducationCentre');
    }
}

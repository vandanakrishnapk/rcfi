<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SweetWaterProjectController extends Controller
{
    public function getSweetWaterProject()
    {
        return view('admin.SweetWaterProject');
    }
}

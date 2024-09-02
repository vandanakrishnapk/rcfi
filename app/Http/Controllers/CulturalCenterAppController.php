<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CulturalCenterAppController extends Controller
{
    public function getCulturalCenterApp()
    {
        return view('admin.CulturalCenterApplication');
    }
}

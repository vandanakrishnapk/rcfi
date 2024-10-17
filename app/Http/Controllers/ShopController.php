<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getShopAndOthers()
    {
        return view('admin.shops');
    }
}

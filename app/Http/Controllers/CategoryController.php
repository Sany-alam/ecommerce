<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function admin(Request $Request)
    {
        return view('admin.category');
    }

    public function create_category(Request $Request)
    {
        return $Request;
    }
}

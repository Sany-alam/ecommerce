<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function admin(Request $Request)
    {

        return view('admin.category');
    }
}

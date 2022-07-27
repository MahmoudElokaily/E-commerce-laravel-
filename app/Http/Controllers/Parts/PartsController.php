<?php

namespace App\Http\Controllers\Parts;

use App\Http\Controllers\Controller;
use App\Models\Category;

class PartsController extends Controller
{
    public function footerShow(){
        $categories = Category::select('name')->get();
        return view('layout.footer' , compact('categories'));
    }
}

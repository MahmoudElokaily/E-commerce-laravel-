<?php

namespace App\Http\Controllers\general;

use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function error(){
        return view('pages.error');
    }
    public function success(){
        return view('pages.success');
    }
}

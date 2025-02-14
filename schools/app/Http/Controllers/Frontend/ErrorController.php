<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ErrorController extends Controller
{


    public function index()
    {

        return view('frontend.error');
    }
    
}

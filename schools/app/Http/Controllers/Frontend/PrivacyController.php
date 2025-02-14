<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PrivacyController extends Controller {


    public function index () {

        return view('frontend.privacy');
    }

}

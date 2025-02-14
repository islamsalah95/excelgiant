<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Services;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{


    public function index($service)
    {
        $service= Services::with('sub_services.blog','sub_services.allChildren','sub_services.pricingPlans.pricingPlan')->where('id',$service)->first();
        
        return view('frontend.service', compact('service'));
    }
    
}

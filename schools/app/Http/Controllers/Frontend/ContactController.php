<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contacts;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactsRequest;

class ContactController extends Controller
{


    public function index()
    {

        return view('frontend.contact');
    }


    // public function store(StoreContactsRequest $request)
    // {
    //     Contacts::create($request->validated());
        
    //     return redirect()->back()->with('message', __('share.message.create'));
    // }
    
}

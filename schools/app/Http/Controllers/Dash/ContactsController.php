<?php

namespace App\Http\Controllers\Dash;
use App\Http\Controllers\Controller;


class ContactsController extends Controller
{
    public function __construct()
    {
        // Protect routes with permissions
        $this->middleware('permission:contact-list')->only(['index']);
        $this->middleware('permission:contact-create')->only(['create', 'store']);
        $this->middleware('permission:contact-edit')->only(['edit', 'update']);
        $this->middleware('permission:contact-delete')->only(['destroy']);
        $this->middleware('permission:contact-profile')->only(['profile']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dash.contacts.index');
        
    }

    /**
     * Show the form for show a new resource.
     */
    public function show($contact,$slug){

        return view('dash.contacts.show',['contact'=>$contact,'slug'=>$slug]);
    }

}

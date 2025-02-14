<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Employ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{



    public function index()
    {

        return view('frontend.signup');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients,email'],
            'phone' => ['required', 'numeric', 'unique:clients,phone'],
            'company' => ['nullable', 'string', 'max:255'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        $validated['password'] = Hash::make($request->password);

        $client = User::create($validated);

        Auth::guard('client')->login($client);

        return redirect()->route('hom.index');
    }

}

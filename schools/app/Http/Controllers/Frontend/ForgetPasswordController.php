<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Mail\Clients\SendPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{


    public function index()
    {

        return view('frontend.forget_password');
    }

    public function reset(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:clients,email'], 
        ]);
        
        $client = Client::where('email', $request->email)->first();
        $code = rand(10000, 99999);
        $client->code = $code;
        $client->updated_at = now();
        $client->save();

        Mail::to($client->email)->send(new SendPassword($client));
        return redirect()->route('forget_password.edit')->with('success', 'Password sent to your email');

    }


    public function edit()
    {
        return view('frontend.edit_password');
    }


    public function updait(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string','exists:clients,code'], 
            'password' => ['required', 'string', 'confirmed'],
        ]);
        $client = Client::where('code', $validated['code'])->first();
        $client->password = bcrypt($validated['password']);
        $client->updated_at = now();
        $client->save();
        return redirect()->route('signin.index')->with('success', 'Password updated successfully');
    }

}

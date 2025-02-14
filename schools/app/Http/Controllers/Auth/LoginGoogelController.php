<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use App\Models\Employ;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginGoogelController extends Controller
{

    public function callback()
    {
        try {
            $user  = Socialite::driver('google')->user();
            // // OAuth 2.0 providers...
            // $token = $user->token;
            // $refreshToken = $user->refreshToken;
            // $expiresIn = $user->expiresIn;
            // // OAuth 1.0 providers...
            // $token = $user->token;
            // $tokenSecret = $user->tokenSecret;
            // // All providers...
            // $Id = $user->getId();
            // $Nickname = $user->getNickname();
            // $Name = $user->getName();
            // $Avatar = $user->getAvatar();
            // }
            $Email = $user->getEmail();

            if (User::where('email', $Email)->first()) {
                $user = User::where('email', $Email)->first();
                if ($user) {
                    Auth::login($user);
                    return redirect()->route('services.index');
                } else {
                    // Handle user registration or show an error
                    session()->flash('error', 'User  not found.');
                    return view('errors.error', ['message' => 'User not found.', 'code' => 404]);
                }
            } else if (User::where('email', $Email)->first()) {
                $user = User::where('email', $Email)->first();
                if ($user) {
                    Auth::guard('client')->login($user);
                    return redirect()->route('hom.index');
                } else {
                    // Handle user registration or show an error
                    session()->flash('error', 'User  not found.');
                    return view('errors.error', ['message' => 'User not found.', 'code' => 404]);
                }
            } else {
                session()->flash('error', 'User not found.');
                return view('errors.error', ['message' => 'User not found.', 'code' => 404]);
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Authentication failed. Please try again.');
            return view('errors.error', ['message' => 'Authentication failed. Please try again.', 'code' => 404]);
        }
    }


    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
}

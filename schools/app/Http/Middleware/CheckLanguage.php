<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class CheckLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     $supportedLocales = ['en', 'ar']; // Supported languages

    //     $defaultLocale = 'en'; // Default language

    //     // Determine language priority
    //     $lang = session('lang'); // Priority 1: Query parameter
    //     if (!$lang || !in_array($lang, $supportedLocales)) {
    //         session(['lang' => $defaultLocale ]);// Priority 2: Session value
    //     }

    //     App::setLocale($lang);
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next): Response
    {


        if ($request->method() == 'GET') {
            if ($request->path() == "auth/callback") {
                return $next($request);
            }
            if ($request->path() == "client/redirect") {
                return $next($request);
            }
            if ($request->has('lang')) {
                $lang = $request->input('lang');

                $supportedLocales = config('app.locales');
                if (in_array($lang, $supportedLocales)) {
                    app()->setLocale($lang);
                    $response = $next($request);
                    return $response->cookie('lang', $lang); // Set cookie and return response
                } else {
                    app()->setLocale('en');
                    $response = $next($request);
                    return $response->cookie('lang', 'en'); // Set cookie and return response
                }
            } else {
                $myLang = Cookie::get('lang', 'en'); // Get the lang cookie value, default to 'en'
                // If 'lang' cookie is not set, use default 'en' and set the cookie
                if (!Cookie::has('lang')) {
                    $response = new RedirectResponse($request->url() . '?lang=' . $myLang);
                    return $response->cookie('lang', $myLang);
                }
                // Get the current URL without the lang parameter
                $url = $request->url();
                // Add the lang parameter to the URL
                $redirectUrl = $url . '?lang=' . $myLang;
                // Redirect back to the same page with the lang parameter added
                return new RedirectResponse($redirectUrl);
            }
        } else {
            return $next($request);
        }
    }
}

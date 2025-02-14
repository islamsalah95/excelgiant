<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the locale prefix from the URL
        $locale = $request->segment(1); // Get the first URL segment
        
        // Check if the locale is not 'en' or 'ar'
        if (!in_array($locale, ['en', 'ar'])) {
            // Add 'en' as the default locale while preserving the path
            $newUrl = url('/en' . $request->getRequestUri());

            // Redirect to the new URL with the default locale
            return redirect($newUrl);
        }

        // Continue to the next middleware or request
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LivewireConvert
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Skip middleware for Livewire routes
        if ($request->is('livewire/*')) {
            return $next($request);
        }

        // Get the locale from the first URL segment
        $locale = $request->segment(1);

        // List of valid locales
        $validLocales = config('app.locales', ['en', 'ar']); // Default locales if not defined in config

        // Check if the locale is not valid
        if (!in_array($locale, $validLocales)) {
            // Redirect to the fallback locale ('en') with the same path
            $fallbackLocale = config('app.fallback_locale', 'en'); // 'en' as default fallback
            $newUrl = url('/' . $fallbackLocale . $request->getRequestUri());

            return redirect($newUrl);
        }

        // Set the application locale
        App::setLocale($locale);

        return $next($request);
    }
}

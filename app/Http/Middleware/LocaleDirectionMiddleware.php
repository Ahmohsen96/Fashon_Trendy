<?php

namespace App\Http\Middleware;

use Closure;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LocaleDirectionMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = LaravelLocalization::getCurrentLocale();

        // Determine direction
        $direction = in_array($locale, config('laravellocalization.rtl_locales')) ? 'rtl' : 'ltr';

        // Set the direction in the session or as a global variable
        session(['direction' => $direction]);

        // Pass it to the view
        view()->share('direction', $direction);

        return $next($request);
    }
}

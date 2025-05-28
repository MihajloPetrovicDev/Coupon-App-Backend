<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $acceptedLocales = config('locale.accepted_locales');
        $defaultLocale = config('locale.default_locale');
        $locale = $request->header('Accept-Language');

        $locale = strtolower($locale ?? $defaultLocale);

        if(!in_array($locale, $acceptedLocales)) {
            $locale = $defaultLocale;
        }

        app()->setLocale($locale);

        return $next($request);
    }
}

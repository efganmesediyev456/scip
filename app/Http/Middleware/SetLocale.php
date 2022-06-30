<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);

        abort_if($locale === config('app.fallback_locale'), Response::HTTP_NOT_FOUND);

        if (!in_array($locale, config('app.locales'))) {
            $locale = config('app.fallback_locale');
        }

        app()->setLocale($locale);
        Carbon::setLocale($locale);
        $request->setLocale($locale);

        return $next($request);
    }
}

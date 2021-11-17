<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        App::setLocale(in_array($request->pathlang, ['en', 'ka'])? $request->pathlang : config('app.fallback_locale'));
        
        // dd(app()->currentLocale());
        return $next($request);
    }
}

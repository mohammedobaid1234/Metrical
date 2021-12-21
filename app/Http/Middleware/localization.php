<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        $value = $request->header('lang');

        if ($value) {
            app()->setLocale($value);
        } else {
            app()->setLocale('en');
        }


        return $next($request);
    }
}

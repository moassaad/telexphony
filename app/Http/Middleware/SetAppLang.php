<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class SetAppLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     // URL >>> domain/{lang}/{route} 
    //     // segment(2) ==> {lang} value
    //     if (! in_array($request->segment(1), config('app.available_locales'))) {
    //         return response("404");
    //         // abort(400);
    //     }
    //     App::setLocale($request->segment(1));
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('localLang')) {
            $localLang = session()->get('localLang');
            if (in_array($localLang, config('app.available_locales'))) {
                App::setLocale($localLang);
            }
            else {
                App::setLocale('en');
            }
        }
        return $next($request);
    }
}

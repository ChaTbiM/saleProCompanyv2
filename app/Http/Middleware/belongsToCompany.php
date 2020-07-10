<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class belongsToCompany
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

        if (!Auth::check()) {
            return redirect()->away('http://127.0.0.1:8000/login');
        }

        $company_name = \App\GeneralSetting::find(1)->site_title; // 
        // dd(Auth::user()->companies[0]->name);

        $companies = collect(Auth::user()->companies);
        foreach ($companies as $company) {
            if ($company->name == $company_name) {
                return $next($request);
            }
        }

        return redirect()->away('http://127.0.0.1:8000/home');
    }
}
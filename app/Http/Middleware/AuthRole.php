<?php

namespace App\Http\Middleware;

use Closure,Auth;
use Illuminate\Http\Request;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
       
       // dd($levels);
        if (Auth::guard('admin')->user()) {
            $role = Auth::guard('admin')->user()->level;
        }
        
        if (in_array($role,$levels)) {
            return $next($request);
        }

        // if ($role=="Production") {
        //     return redirect()->route('request');
        // }else{
            return redirect()->route('biodata');

        //}
    }
}

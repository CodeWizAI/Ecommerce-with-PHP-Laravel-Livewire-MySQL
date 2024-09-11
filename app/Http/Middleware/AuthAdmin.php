<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
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
        //cheking user type session is available or not
        if(session('utype') === 'admin')
        {
            return $next($request);
        }
        //flushing session if user type is not admin and redirect to tahe login page
        else{
            session()->flush();
            return redirect()->route('login');
        }
        return $next($request);
    }
}

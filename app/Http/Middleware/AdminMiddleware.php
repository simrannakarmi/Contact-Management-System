<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            //admin=1
            //user=0

            if(Auth::user()->role == '1') {

                //dd('admin');
                return $next($request);
            }
            else
            {
               // dd('NOt admin');
                return redirect()->route('home.user')->with('message','User View');
            }
        }
        else
        {
            return redirect()->route('login-view')->with('message','Enter valid Email and Password');
        }
    }
}

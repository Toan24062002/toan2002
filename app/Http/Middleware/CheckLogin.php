<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
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
            
            $role = session('role');
            if ($role !="") {
                if ($role == 1) {
                    return $next($request);
                } 
                else {
                    return redirect()->route('account.login')->with('notrole','');
                }
            }
            else return redirect()->route('account.login')->with('notlogin','');
    }
}
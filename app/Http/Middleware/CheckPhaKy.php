<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPhaKy
{
   /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = session('role');
        if ($role !="") {
            if ($role == 1 or $role == 2 or $role == 3) {
                return $next($request);
            } 
            else {
                return redirect()->route('account.login_user')->with('notrole','');
            }
        }
        else return redirect()->route('account.login_user')->with('notlogin','');
    }
}


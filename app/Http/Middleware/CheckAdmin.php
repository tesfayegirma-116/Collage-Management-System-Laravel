<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class CheckAdmin
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
       $userRoles = Auth:: user()->roles->pluck('name');
       if(!$userRoles->contains('admin')){
           return redirect ('\admin.index');
       }
       return $next($request);
    }
}

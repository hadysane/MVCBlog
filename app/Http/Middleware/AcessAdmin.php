<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AcessAdmin
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
        
       if(Auth::user()->hasAnyRole('admin')) {
           $value = session()->push('status', 'admin');
           return $next($request);
       }
       return redirect('home');
       
    }
}

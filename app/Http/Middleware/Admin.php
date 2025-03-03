<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if( Auth::check() && Auth::user()->user_type == 0){
            return $next($request);
        }
        
        elseif(!Auth::user()->id || Auth::user()->user_type == 0){
                abort(code:403);    
        } 


        elseif( !Auth::check() || !Auth::user()->id || !Auth::user()->user_type == 0){
                abort(code:403);    
        } 
 
        
        else{
            return redirect()->route('login');
        }
    }
}

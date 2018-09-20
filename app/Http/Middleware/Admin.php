<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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
        if(Auth::check()){
            if(!Auth::user()->admin){
            
                Session::flash('info', "Kamu tidak memiliki akses ke halaman ini");
    
                return redirect()->route('login');
            }
        }else if(!Auth::check()){
            return redirect()->route('login');            
        }
        return $next($request);
    }
}

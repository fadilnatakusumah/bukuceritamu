<?php

namespace App\Http\Middleware;

use Closure;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class User
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
            $checkUser = Profile::where('user_id', Auth::user()->id);
            // dd($user->id);
            if($checkUser->count() > 0 ){
                return $next($request);
            }else{
                Session::flash('info', 'Silahkan isi data profil terlebih dahulu');
                return redirect()->route('user.profile.fill');                
            }

        }else{
            return redirect()->route('login');            
        }

        
        return $next($request);
    }
}

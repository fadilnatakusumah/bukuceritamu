<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */
  
  use AuthenticatesUsers {
    logout as performLogout;
    redirectPath as laravelRedirectPath;
  }
  
  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  // protected $redirectTo = '/home';
  protected function redirectTo()
  {
    if(Auth::user()->admin){
      // return view('admin.index');
      return '/admin';
    }else{
      return '/user';
      // return view('user.index');
    }
    
  }
  
  public function showLoginForm()
  {
    $title = "Login Page";
    return view('auth.login')->with('title', $title);
  }
  
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    // $this->middleware('guest')->except('logout');
    $this->middleware('guest')->except('logout');
  }
  
  protected function validateLogin(Request $request){
    
    return $this->validate($request, [
      'email' => 'required|email|max:255',
      'password' => 'required'
      ]);

    }

    public function redirectPath(){
    // Do your logic to flash data to session...
    session()->flash('successLogin', 'Berhasil Login');

    // Return the results of the method we are overriding that we aliased.
    return $this->laravelRedirectPath();
    }
    
    protected function sendFailedLoginResponse(Request $request)
    {
        Session::flash('error', 'Email & Password yang kamu masukan salah');
        return redirect()->back();

    }

    public function logout(Request $request)
    {
      $this->performLogout($request);
      return redirect()->route('login');
    }
    
    
  }
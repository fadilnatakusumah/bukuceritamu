<?php

namespace App\Http\Controllers\Admin;

use App\Suggestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function __construct(){
        $this->middleware('admin');
    }
    
    public function index()
    {
        //
        $title = "Admin Home";
        return view('admin.index')->with('user', Auth::user())->with('title', $title);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
    
    // update profile admin
    public function update_profile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|max:255|email',
            'address' => 'required|max:255'
        ]);
        
        $user = Auth::user();
        $user->name = $request->name;
        $user->profile->username = $request->username;
        $user->email = $request->email;
        $user->profile->address = $request->address;
        if($request->hasFile('avatar')){
            $ava = $request->avatar;
            
            $ava_new_name = time().$ava->getClientOriginalName();
            $ava->move('assets/avatars/', $ava_new_name);
            $user->profile->avatar = 'assets/avatars/'.$ava_new_name;
            $user->save();
            
        }
        $user->save();
        
        Session::flash('info', 'Profil berhasil diperbaruhi');
        return redirect()->back();
        
            
            // return view('admin.edit_profile')->with('user', Auth::user());
        }
        public function viewSuggestions(){
            $sugg = Suggestion::all();
            return view('admin.suggestions')
            ->with('suggestions',$sugg)
            ->with('title', 'Kritik & Saran');
        }

        // save update password
        // public function update_password(){
        //     $this->validate(request(), [
        //         'oldpassword' => 'required|max:255',
        //         'password' => 'required|max:255',
        //     ]);
        //     $op = bcrypt(trim(request()->oldpassword));
        //     $oldpass = bcrypt(request()->oldpassword);
        //     $newpass = bcrypt(request()->password);
        //     $pass = Auth::user()->password;
        //     if($oldpass === $pass){
        //         // $user->password = $newpass;
        //         // $user->save();
        //     Session::flash('warning', "AHAHA ".$oldpass.'!==='.$pass);
        //     // Session::flash('info', 'Password berhasil diperbaruhi');
        //         return redirect()->back();
        //     }
        //     Session::flash('warning', $oldpass.'!==='.$pass."====".$op);
        //     return redirect()->back();
            

        // }
        
        
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
            //
        }
        
        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function destroy($id)
        {
            //
        }
    }
    
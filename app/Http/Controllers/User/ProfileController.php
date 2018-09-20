<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $title = "Fill New User Profile";
        return view('user.profile.index')->with('profile', Auth::user())
        ->with("title", $title);
    }
    
     public function firstFill()
    {
        //
        $title = "Fill New User Profile";
        return view('user.profile.edit')->with("title", $title);
    }

    public function updateProfile(Request $req){
        $err = Validator::make($req->all(), [
            'name'=> 'required|max:255',
            'email'=> 'required|max:255|email',
            'username'=> 'required|max:255',
            'address'=> 'required|max:255'
        ]);
        if($err->fails()){
            Session::flash('fails', 'Mohon untuk mengisi data dengan benar - Pesan: "'.$err->messages().'"');
            return redirect()->back();
        }

        $user = User::find(Auth::user()->id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->profile->username = $req->username;
        $user->profile->address = $req->address;

        $user->profile->save();
        $user->save();

        Session::flash('success', 'Berhasil memperbaruhi data');
        return redirect()->back();

    }

    public function updatePassword(Request $req){
        $user = Auth::user();
        $this->validate($req, [
            'newPassword' => 'required|max:255',
            'oldPassword' => 'required|max:255',
        ]);
        
        if(Hash::check($req->oldPassword, $user->password)){
            $user->password = bcrypt($req->newPassword) ;
            $user->save();

            Session::flash('success', 'Berhasil memperbaruhi password');
            return redirect()->back();

        }else{
            Session::flash('fails', 'Terjadi kesalahan - Password lama tidak sesuai');
            return redirect()->back();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function submit(Request $req){
        $user = Auth::user();
        $this->validate($req, [
            'username' => 'required|max:255:unique:profiles',
            'address' => 'required|max:255',
        ]);
        
        $profile = Profile::create([
            "username" => $req->username,
            "address" => $req->address,
            "user_id" => $user->id,
            "avatar" => "assets/avatars/default.png"
        ]);
        if($req->hasFile('avatar')){
            $ava = $req->avatar;
            $ava_new_name = 'assets/avatars/'.$user->id.time().$ava->getClientOriginalName();
            
            $ava->move('assets/avatars/', $ava_new_name);
            
            // $file = $ava_new_name;
            $profile->avatar = $ava_new_name;
            $profile->save();
        }
            // $profile = Profile::create([
            //     "username" => $req->username,
            //     "address" => $req->address,
            //     "user_id" => $user->id,
            //     "avatar" => 'assets/avatars/default.png'
            // ]);
        Session::flash('success', 'Profile berhasil diperbaruhi');
        return redirect()->route('user.index');
        
        
        
        // $profile->save();

        // Session::flash('success', 'Profile berhasil diperbaruhi');
    }

 
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

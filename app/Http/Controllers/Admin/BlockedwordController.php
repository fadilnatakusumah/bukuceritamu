<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Blockedword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BlockedwordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Halaman Kosa Kata";
        $b = Blockedword::all();
        return view('admin.blockedword.index')->with('title', $title)
        ->with('b', $b);
    }

    public function deleteWord($id){
        $b = Blockedword::find($id);
        $b->delete();

        Session::flash('success','Kata berhasil dihapus');
        return redirect()->back();
    }

    public function updateWord(Request $req){
        $b = Blockedword::find($req->id);
        $b->blocked_word = $req->word;
        $b->save();

        Session::flash('success', 'Kata berhasil diperbaruhi');
        return redirect()->back();
    }
    public function addWord(Request $r){
        $this->validate($r,[
            'word' => 'required'
        ]);

        $n = new Blockedword;
        $n->blocked_word = $r->word;
        $n->save();

        Session::flash('success', 'Kata berhasil ditambahkan');
        return redirect()->back();

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

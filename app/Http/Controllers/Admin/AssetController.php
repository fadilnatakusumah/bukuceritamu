<?php

namespace App\Http\Controllers\Admin;

use App\Asset;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Assets Page";
        $cat = Category::all();
        if($cat->count() > 0){
            return view('admin.asset.index')->with('assets', Asset::all())
            ->with('categories', $cat)
            ->with('title', $title);
        }else{  
            Session::flash('info', 'Kategori belum tersedia, Untuk menambah Asset, kategori harus ada terlebih dahulu');
            return redirect()->back();
        }
    }

    public function add(Request $req){

        $this->validate($req, [
            'name' => 'required|max:255',
            'category_id' => 'required',
        ]);

        // dd($req);

        if($req->hasFile('image')){
            $newAsset = new Asset;

            $newAsset->name = $req->name;
            $newAsset->category_id = $req->category_id;
            
            $image = $req->image;
            $image_new_name = 'assets/assets/'.time().$image->getClientOriginalName();
             
            $image->move('assets/assets/', $image_new_name);
            $newAsset->location = $image_new_name;

            $newAsset->save();

            Session::flash('success', 'Asset berhasil ditambahkan');
            return redirect()->route('admin.assets.index');
        }else{
            Session::flash('error', 'Terjadi kesalahan!');            
            return redirect()->bacK();
        }

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
    public function edit(Request $req)
    {
        //
        $this->validate($req, [
            'name' => 'required|max:255'
        ]);

        $oldAsset = Asset::find($req->id);
        $oldAsset->name = $req->name;

        $oldAsset->save();
        
        Session::flash('success', 'Asset berhasil diperbaruhi');
        return redirect()->back(); 
    }

    public function delete($id){

        $deleteAsset = Asset::find($id);

        $deleteAsset->delete();

        Session::flash('success', 'Asset Berhasil dihapus');
        return redirect()->back();

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

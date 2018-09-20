<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Halaman Kategori";
        $cat = Category::all();
        return view('admin.category.index')->with('categories', $cat)->with('title', $title);
        //
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


    public function add(Request $req){

        $this->validate($req, [
            'name' => 'required|max:255'
        ]);

        $newCat = Category::create([
            'name' => $req->name
        ]);
        // dd($newCat);
        
        Session::flash('success', 'Kategori baru berhasil ditambahkan');
        
        return redirect()->route('admin.categories.index');
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
        return view('admin.category.edit')->with('category', Category::find($id))->with('title', 'Admin Edit Kategori');
    }

    public function save(){

        $this->validate(request(), [
            'name' => 'required|max:255',
        ]);

        $cat = Category::find(request()->id);

        $cat->name = request()->name;
        $cat->save();

        Session::flash('success', 'Kategori berhasil diperbaruhi');
        return redirect()->route('admin.categories.index');

    }

    public function delete($id){
        
        $cat = Category::find($id);
        $cat->asset()->delete();
        $cat->delete();
        
        Session::flash('success', 'Kategori berhasil dihapus');
        return redirect()->route('admin.categories.index');
        
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

<?php

namespace App\Http\Controllers\User;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Unregistered extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function searchBook(Request $request){
        // dd($request->search);
        $book = Book::where('title', 'LIKE', '%'.$request->search.'%')->with('profile')->get();
        // dd($book);

        if($book->count() > 0){
            return view('unregistered.allbooks')->with('title', 'search: '.$request->search)
            ->with('allbooks',$book)
            ->with('search', $request->search);
        }else{
            $notfound = "Buku yang kamu cari tidak ditemukan, silahkan cari lagi";
            return view('unregistered.allbooks')->with('title', 'not found')
            ->with('notfound',$notfound)
            ->with('search', $request->search);
        }

    }

    public function allbooks(){
        $book = Book::where('approved', '1')->with('profile')->get();
        return view('unregistered.allbooks')->with('title', 'Semua Buku')
        ->with('allbooks',$book);
    }

    // public function searchedBook(){
    //     return view
    // }
    public function index()
    {
        //
    }
    public function readBook($slug){
        $book = Book::where('slug', $slug)->first();

        return view('user.books.read')
        ->with('title', 'Baca '.$book->slug)
        ->with('book', $book);
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

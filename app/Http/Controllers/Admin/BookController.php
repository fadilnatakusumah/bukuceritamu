<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('canvas')->get();
        return view('admin.book.index')->with('title', 'Books Page')
        ->with('books', $books);
        //
    }

    public function read($slug){
        $book = Book::where('slug', $slug)->first();
        return view('admin.book.read')->with('title', 'Read - '.$book->title)
        ->with('book', $book);
    }

    public function sendBookExplanation(Request $req){

        $book = Book::find($req->book_id);

        $book->approved = 0;
        $book->denied = 1;
        $book->explanation = $req->explanation;

        $book->save();

        return response()->json("Buku ditolak, dan berhasil dikirim kepada Penulis. Data akan diperbaruhi saat Refresh");

    }
    
    public function giveBookApproval(Request $req){
        $book = Book::find($req->book_id);

        $book->approved = 1;
        $book->denied = 0;
        $book->save();

        return response()->json("Buku diizinkan, dan berhasil dipublikasikan. Data akan diperbaruhi saat Refresh");

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
        dd($request);
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
        $book = Book::find($id);
        $book->canvas()->delete();
        $book->delete();

        Session::flash('info', 'Buku berhasil dihapus');
        return redirect()->back();
    }
}

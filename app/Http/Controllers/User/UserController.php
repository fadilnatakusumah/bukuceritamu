<?php

namespace App\Http\Controllers\User;
// namespace App\Http\Controllers\Admin;

use App\Book;
use App\Suggestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "User Home";
        return view('user.index')->with("title", $title)
        ->with('books', Book::where('profile_id', Auth::user()->id)->get());
    }

    public function profile(){
        return view('user.profile');
    }

    public function allBooks(){
        return view('user.books.index')
        ->with('title', 'Read Books')
        ->with('books',Book::where('approved', '1')->with('profile')->get());
    }
    
    public function myBooks(){
        return view('user.index')
        ->with('title', 'Read Books')
        ->with('books',Book::where('profile_id',Auth::user()->id)->get());
    }

    public function readOneBook($slug){
        $book = Book::where('slug', $slug)->first();

        return view('user.books.read')
        ->with('title', 'Baca '.$book->slug)
        ->with('book', $book);
    }

    public function searchBook(Request $request){
        $book = Book::where('title', 'LIKE', '%'.$request->search.'%')->with('profile')->get();
        // dd($book);

        if($book->count() > 0){
            return view('user.books.index')->with('title', 'search: '.$request->search)
            ->with('books',$book)
            ->with('search', $request->search);
        }else{
            $notfound = "Buku yang kamu cari tidak ditemukan, silahkan cari lagi";
            return view('user.books.index')->with('title', 'not found')
            ->with('notfound',$notfound)
            ->with('search', $request->search);
        }
    }
           
    public function giveInput(){
        return view('user.input')->with('title', "Beri masukan kepada Admin");
    }

    public function sendInput(Request $req){
        $this->validate($req, [
            'inputToAdmin' => 'required'
        ]);

        $newS = Suggestion::create([
           'suggestion' => $req->inputToAdmin,
           'user_id' => Auth::user()->id 
        ]);

        Session::flash('success', 'Berhasil mengirim masukan');
        return redirect()->back();
    }
    
    public function contactPage(){
        return view('user.contact')->with('title', 'Halaman Kontak');
    }

    public function helpPage(){
        return view('user.help')->with('title', 'Halaman Bantuan');
    }
    
}

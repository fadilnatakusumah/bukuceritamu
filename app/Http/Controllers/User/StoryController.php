<?php

namespace App\Http\Controllers\User;

use App\Book;
use App\User;
use App\Asset;
use App\Canvas;
use App\Category;
use App\Stopword;
use App\Blockedword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
        // var user = Auth::user();
        
        return view('user.story.index')->with('title', 'Buat Cerita')
        ->with('background', Category::where('name', 'Latar Belakang')->first())
        ->with('categories', Category::where('id', '>', 1)->get())
        ->with('profile', Auth::user());
        // ->with('books', Book::all()->where('profile_id', user->id)->orderBy('id','desc'))->get());
        // return response()->json(Asset::where('category_id', '>', 1)->get());
        // return view('user.story.index')->with('title', 'Buat Cerita')
        // ->with('asset', Asset::where('category_id', '>', 1)->get());
    }

    public function editStory($id){
        $book = Book::find($id);
        if($book->profile_id == Auth::user()->id){
            return view('user.story.edit')->with('title', 'Edit Cerita')
            ->with('background', Category::where('name', 'Latar Belakang')->first())
            ->with('categories', Category::where('id', '>', 1)->get())
            ->with('profile', Auth::user())
            ->with('book', $id)
            ->with('bookTitle',$book->title);
        }else{
            return redirect()->back();
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

        if($request->finished == "true"){
            $request->finished = 1;
        }else{
            $request->finished = 0;
        }
  
        $newStory = new Book;
        $newStory->title = $request->title;
        $newStory->profile_id = $request->id_user;
        $newStory->slug = str_slug($request->title);
        $newStory->finished = $request->finished;
        $newStory->approved = 0;
        $newStory->denied = 0;
        $newStory->explanation = $request->explain;
        $newStory->cover = $request->cover;
        
        $newStory->save();
        $newCanvas = [];
        for($i = 0; $i < count($request->canvas); $i++){
        $newCanvas[$i] = Canvas::create([
            'json_data'=> $request->canvas[$i],
            'book_id' => $newStory->id,
            'canvas_height' => $request->canvasHeight,
            'canvas_width' => $request->canvasWidth,
            ]);
        }

        return response()->json($request);
        // return response()->json("Success saving your story");
 
    }


    public function saveEditedStory(Request $request){
            $deleteOldStory = Book::find($request->bookID);
            $deleteOldStory->canvas()->delete();
            $deleteOldStory->delete();

            if($request->finished == "true"){
                $request->finished = 1;
            }else{
                $request->finished = 0;
            }
    
            $newStory = new Book;
            $newStory->title = $request->title;
            $newStory->profile_id = $request->id_user;
            $newStory->slug = str_slug($request->title);
            $newStory->finished = $request->finished;
            $newStory->approved = 0;
            $newStory->denied = 0;
            $newStory->explanation = $request->explain;
            $newStory->cover = $request->cover;
            
            $newStory->save();
            $newCanvas = [];
            for($i = 0; $i < count($request->canvas); $i++){
            $newCanvas[$i] = Canvas::create([
                'json_data'=> $request->canvas[$i],
                'book_id' => $newStory->id,
                'canvas_height' => $request->canvasHeight,
                'canvas_width' => $request->canvasWidth,
                ]);
            }
            // Canvas::where('book_id',$request->bookID)->delete();

            return response()->json($newStory);
 
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
        $response = Book::where('id',$id)->with('canvas')->first();
        // $response = Canvas::where('book_id', $id)->with('book')->get();
        return response()->json($response);
    }
    
    
    public function assets(){
        $assets = Asset::where('id', '>', '1')->get();
        return response()->json($assets);
    }
    
    public function getStopwords(){
        $response = Stopword::all();
        return response()->json($response);
    }
    
    public function getBlockedwords(){
        $response = Blockedword::all();
        return response()->json($response);
    }
    // public function getBook($id){
    //     $response = Book::find($id);
    //     // dd($response);
    //     return response()->json($response);
    // }
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    // public function edit($id)
    // {
    //     //
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
    public function deleteStory($id)
    {
        //
        $deleteBook = Book::find($id);
        // $deleteCanvas = Canvas::where('book_id', $id)->get();

        // $deleteCanvas->destroy();
        $deleteBook->canvas()->delete();
        $deleteBook->delete();

        Session::flash('success', 'Cerita berhasil dihapus');
        return redirect()->back();
    }


}
<?php

use App\Book;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()){
        if(Auth::user()->admin){
            return redirect()->route('admin.index');
        }else{
            return redirect()->route('user.index');            
        }
    }
    return view('unregistered.index')->with('title', "Index Page")
    ->with('latestbooks', Book::where('approved', '1')->with('profile')->take(3)->get())
    ->with('search', '');
    
})->name('index');

Auth::routes();
       



// Route for unregisterd user
// ALL BOOKS
Route::get('/all-books',[
    'uses' => 'User\Unregistered@allBooks',
    'as' => 'unreg.allbooks'
]);

// READ A BOOK
Route::get('/read-a-book/{slug}',[
    'uses' => 'User\Unregistered@readBook',
    'as' => 'unreg.read.book'
]);

// SEARCHING A BOOK
Route::get('/s/',[
    'uses' => 'User\Unregistered@searchBook',
    'as' => 'unreg.search.book'
]);

// TUTORIAL
Route::get('/tutorial',[
    'uses' => 'User\Unregistered@tutorial',
    'as' => 'unreg.tutorial'
]);

// SEARCHED BOOKS
// Route::get('/book',[
//     'uses' => 'User\Unregistered@searchedBook',
//     'as' => 'unreg.searched.book'
// ]);





// Route for registered user 
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    
    // FILL PROFILE FOR NEW USER 
    Route::get('/profile-fill', [
        'uses' => 'User\ProfileController@firstFill',
        'as' => 'user.profile.fill'
    ]);
    Route::post('/profile-submit', [
        'uses' => 'User\ProfileController@submit',
        'as' => 'user.profile.submit'
    ]);
    Route::group(['middleware' => 'user'], function(){
        // HOME
        Route::get('/', [
            'uses' => 'User\UserController@index',
            'as' => 'user.index'
        ]);
        // PROFILE ROUTE
        Route::get('/my-profile', [
            'uses' => 'User\ProfileController@index',
            'as' => 'user.my.profile'
        ]);

        Route::post('/update-my-profile', [
            'uses' => 'User\ProfileController@updateProfile',
            'as' => 'user.update.profile'
        ]);

        Route::post('/update-my-password', [
            'uses' => 'User\ProfileController@updatePassword',
            'as' => 'user.update.password'
        ]);
    
    
        // STORY
        Route::get('/make-story', [
            'uses' => 'User\StoryController@index',
            'as' => 'user.make.story'
        ]);
        Route::get('/user-delete-my-story/{id}', [
            'uses' => 'User\StoryController@deleteStory',
            'as' => 'user.delete.story'
        ]);
        
        Route::get('/edit-story/{id}',[
            'uses' => 'User\StoryController@editStory',
            'as' => 'user.edit.story'
        ]);


        // READ BOOKS
        Route::get('/all-books', [
            'uses' => 'User\UserController@allBooks',
            'as' => 'user.all.books'
        ]);
        Route::get('/my-books', [
            'uses' => 'User\UserController@myBooks',
            'as' => 'user.my.books'
        ]);
        Route::get('/read-a-story/{slug}', [
            'uses' => 'User\UserController@readOneBook',
            'as' => 'user.read.story'
        ]);

        // GIVE INPUT TO ADMIN
        Route::get('/give-input-to-admin', [
            'uses' => 'User\UserController@giveInput',
            'as' => 'user.give.input'
        ]);
        Route::post('/send-input-to-admin', [
            'uses' => 'User\UserController@sendInput',
            'as' => 'user.send.input'
        ]);

        // SEARCH BOOK 
        Route::get('s/', [
            'uses' => 'User\UserController@searchBook',
            'as' => 'user.search.book'
        ]);

        // CONTACS
        Route::get('/contact',[
            'uses' => 'User\UserController@contactPage',
            'as' => 'user.contact.page'
        ]);
        
        // HELPS
        Route::get('/help',[
            'uses' => 'User\UserController@helpPage',
            'as' => 'user.help.page'
        ]);
        
    });
});





// Route for admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', [
        'uses' => 'Admin\AdminController@index',
        'as' => 'admin.index'
    ]);
    Route::post('/update', [
        'uses' => 'Admin\AdminController@update_profile',
        'as' => 'admin.update'
    ]);
    Route::post('/update.password', [
        'uses' => 'Admin\AdminController@update_password',
        'as' => 'admin.update.password'
    ]);

    // ASSETS
    Route::get('/assets', [
        'uses' => 'Admin\AssetController@index',
        'as' => 'admin.assets.index'
    ]);
    Route::post('/assets-add', [
        'uses' => 'Admin\AssetController@add',
        'as' => 'admin.add.asset'
    ]);

    Route::post('/assets-edit', [
        'uses' => 'Admin\AssetController@edit',
        'as' => 'admin.edit.asset'
    ]);

    Route::get('/asset-delete/{id}', [
        'uses' => 'Admin\AssetController@delete',
        'as' => 'admin.delete.asset'
    ]);

    // CATEGORIES
    Route::get('/categories', [
        'uses' => 'Admin\CategoryController@index',
        'as' => 'admin.categories.index'
    ]);

    Route::post('/add-category', [
        'uses' => 'Admin\CategoryController@add',
        'as' => 'admin.add.category'
    ]);

    
    Route::get('/update-category/{id}', [
        'uses' => 'Admin\CategoryController@edit',
        'as' => 'admin.edit.category'
    ]);

    Route::post('/save-category/', [
        'uses' => 'Admin\CategoryController@save',
        'as' => 'admin.save.category'
    ]);

    Route::post('/save-category/', [
        'uses' => 'Admin\CategoryController@save',
        'as' => 'admin.save.category'
    ]);

    Route::get('/delete-category/{id}', [
        'uses' => 'Admin\CategoryController@delete',
        'as' => 'admin.delete.category'
    ]);

    
    // USERS
    Route::get('/users', [
        'uses' => 'Admin\UserController@index',
        'as' => 'admin.users.index'
        ]);

    // delete user
    Route::get('/delete-user/{id}', [
        'uses' => 'Admin\UserController@destroy',
        'as' => 'admin.user.delete'
    ]);

    // BOOKS
    // get all books
    Route::get('/books', [
        'uses' => 'Admin\BookController@index',
        'as' => 'admin.books.index'
    ]);


    // delete a book
    Route::get('/delete-book/{id}', [
        'uses' => 'Admin\BookController@destroy',
        'as' => 'admin.book.delete'
    ]);

    // read a book
    Route::get('/read-a-book/{slug}',[
        'uses' => 'Admin\BookController@read',
        'as' => 'admin.read.book'
    ]);

    // WORDS
    Route::get('/words', [
        'uses' => 'Admin\BlockedwordController@index',
        'as' => 'admin.words.index'
    ]);

    Route::get('/delete-words/{id}', [
        'uses' => 'Admin\BlockedwordController@deleteWord',
        'as' => 'admin.delete.blockedword'
    ]);
    
    Route::post('/add-words', [
        'uses' => 'Admin\BlockedwordController@addWord',
        'as' => 'admin.add.blockedword'
    ]);
    
    Route::post('/edit-words/{id}', [
        'uses' => 'Admin\BlockedwordController@updateWord',
        'as' => 'admin.save.blockedword'
    ]);

    // VIEW SUGGESTION
    Route::get('/suggestions', [
        'uses' => 'Admin\AdminController@viewSuggestions',
        'as' => 'admin.suggestions'
    ]);
});
                        
                        
                        
                        
                        
                        
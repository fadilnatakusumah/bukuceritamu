<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// User
Route::post('/save-book', 'User\StoryController@store');
Route::post('/save-edit-story','User\StoryController@saveEditedStory');

// User make story
Route::get('/get-a-book/{id}', 'User\StoryController@show');
Route::get('/get-assets', 'User\StoryController@assets');
Route::get('/get-stopwords', 'User\StoryController@getStopwords');
Route::get('/get-blockedwords', 'User\StoryController@getBlockedwords');

// Admin
Route::post('/send-book-explanation', 'Admin\BookController@sendBookExplanation');
Route::post('/give-book-approval', 'Admin\BookController@giveBookApproval');


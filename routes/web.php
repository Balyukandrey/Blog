<?php

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

//Route::get('/' , 'PagesController@getIndex')->name('index');
Route::get('blog/{slug}' , ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d-\_]+');
Route::get('/' , ['uses' => 'BlogController@getIndex' , 'as' => 'blog.index']);
Route::get('contact' , 'PagesController@getContact')->name('contact');
Route::get('about' , 'PagesController@getAbout')->name('about');
Route::get('chat' , 'ChatController@getChat')->name('chat');
Route::post('chat/send' , 'ChatController@sendMessage')->name('sendMessage');
Route::post('chat/get' , 'ChatController@getMessage')->name('getMessage');
Route::get('user/{id}' , 'PagesController@getUser')->name('getUser');


Route::resource('posts', 'PostController');
Route::resource('categories','CategoryController');
Route::resource('tags','TagController');

Route::post('comments/{post_id}','CommentsController@store')->name('comments.store');
Route::get('comments/{id}/edit' , 'CommentsController@edit')->name('comments.edit');
Route::put('comments/{id}' , 'CommentsController@update')->name('comments.update');
Route::delete('comments/{id}' , 'CommentsController@destroy')->name('comments.destroy');
Route::get('comments/{id}' , 'CommentsController@delete')->name('comments.delete');

Route::post('/like' , 'LikeController@like')->name('like');
Route::post('/dislike' , 'LikeController@dislike')->name('dislike');

Auth::routes();



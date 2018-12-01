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
/*
Route::get('/', function () {
    return view('welcome');
});
//*/

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});




Route::middleware(['auth'])->group(function () {
    
	Route::get('posts/post/{slug}', ['uses' => 'PostController@post', 'as' => 'posts.post']);
	
	Route::resource('posts', 'PostController');    
    

});

Route::middleware(['guest'])->group(function () {



});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome', 'WelcomeController@index')->name('welcome');

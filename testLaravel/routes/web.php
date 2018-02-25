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
Route::get('/hello', function () {
    return view('testHello.hello');       //Returns hello.php webpage
});

//Get values from URL parameters
Route::get('users/{id}/{uname}', function ($id, $uname) {
    return 'This is the user ' . $uname . ' (ID = ' . $id . ').';
});

Route::get('/', function() {
    return view('welcome');
});
*/

Route::get('/', 'PagesController@index');
Route::get('/welcome', 'WelcomeController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/login', 'PagesController@login');
Route::get('/register', 'PagesController@register');
Route::get('/password/reset', 'PagesController@passReset');

//Generate all the routes for methods in PostsController
//PARAM1: URI name, PARAM2: Class name
Route::resource('posts', 'PostsController');


Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

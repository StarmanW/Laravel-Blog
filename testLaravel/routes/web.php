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

//Get values from URL parameters
Route::get('users/{id}/{uname}', function ($id, $uname) {
    return 'This is the user ' . $uname . ' (ID = ' . $id . ').';
});

Route::get('/user',function($name = 'Virat Gandhi'){
    echo htmlspecialchars($_GET['name']);
});

Route::get('/user', 'PagesController@getParam');
*/

/*
 * Routes
 * 4 basic routes - get, post, put, delete
 */
Auth::routes();     //Generate authentication routes

Route::get('/', 'PagesController@index');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/login', 'PagesController@login');
Route::get('/register', 'PagesController@register');
Route::get('/password/reset', 'PagesController@passReset');

//Generate all the routes for methods in PostsController
//PARAM1: URI name, PARAM2: Class name
Route::resource('posts', 'PostsController');

/*
 * HTTP Exception page
 *
 * Uncomment this section to test out the web pages
 * By default, Laravel will recognize the 500 and 404 or other
 * HTTP Exception custom page created in resources > views > errors > <err_code>.blade.php
 *
 *

Route::get('/500', function() {
    abort(500);     //Generate 500 response
});
Route::get('/404', function() {
    abort(404);     //Generate 404 response
});
*/


/* SANDBOX AREA */
Route::get('test', 'PagesController@sandbox');
Auth::routes();
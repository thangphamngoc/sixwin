<?php
// use Illuminate\Routing\Route;
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



Route::get('/{any}', 'AdminController@index')->where('any', '.*');



Route::group(['prefix' => 'auth'], function () {
    Route::get('init', 'AppController@init');
    Route::post('register', 'AppController@register');
    Route::post('login', 'AppController@login');
    Route::post('logout', 'AppController@logout');
});







// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('layouts.master');
// });

// Route::get('/admin-add', function () {
//     return view('layouts.app');
// });


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

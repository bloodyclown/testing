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

Route::get('/', function () {
    return view('login');
})->name('start-page')->middleware('guest');

Route::get('/login', 'Auth\LoginController@showViewLogin');
Route::post('/login', 'Auth\LoginController@login');

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/transaction', 'Api\v1\TransactionController@index');
    Route::get('/logout', 'HomeController@logout');
});

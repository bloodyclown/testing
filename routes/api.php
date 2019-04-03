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


Route::post('login', 'Api\v1\CustomerController@login');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('customer', 'Api\v1\CustomerController@store');
    /**
     * Transactions query
     */    
    Route::post('transaction', 'Api\v1\TransactionController@store');
    Route::put('transaction/{transactionId}', 'Api\v1\TransactionController@update');
    Route::delete('transaction/{transactionId}', 'Api\v1\TransactionController@destroy');
    Route::get('transaction/search', 'Api\v1\TransactionController@search');
    Route::get('transaction/{customerId}/{transactionId}', 'Api\v1\TransactionController@view');
});
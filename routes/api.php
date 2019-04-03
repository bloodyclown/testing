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
    Route::post('customer', 'Api\v1\CustomerController@insert');
    /**
     * Transactions query
     */
    Route::get('transaction', 'Api\v1\TransactionController@index');
    Route::post('transaction', 'Api\v1\TransactionController@insert');
    Route::get('transaction/search', 'Api\v1\TransactionController@search');
    Route::put('transaction/{transactionId}', 'Api\v1\TransactionController@update');
    Route::delete('transaction/{transactionId}', 'Api\v1\TransactionController@delete');
    Route::get('transaction/{customerId}/{transactionId}', 'Api\v1\TransactionController@view');
});
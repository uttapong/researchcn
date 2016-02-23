<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', 'HomeController@test');
Route::get('list_fund', 'FundController@listFund');
Route::get('fund_ago', 'FundController@fundAgo');
Route::get('fund_request', 'FundController@fundRequest');

Route::get('fund_form', 'FundController@fundForm');
Route::get('fund_manage', 'FundController@fundManage');
Route::post('fund_insert_update', 'FundController@fundInsertUpdate');
Route::get('fund_delete/{id}', 'FundController@fundDelete');

Route::get('register_fund/{fundId}', 'ApplicationController@registerFund');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Route::group(['middleware' => ['web']], function () {
//     //
// });

// Route::group(['middleware' => 'web'], function () {
//     Route::auth();

//     Route::get('/home', 'HomeController@index');
// });

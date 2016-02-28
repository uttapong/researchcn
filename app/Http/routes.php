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
Route::get('test', 'HomeController@testfund');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::any('logout', function () {
    Auth:logout();
});

Route::group(['middleware' => 'web','prefix' => 'rscn'], function () {
    Route::auth();

    Route::get('home', 'ResearchCenterController@index');

    Route::post('new_research', [ 'as' => 'new_research', 'uses' => 'ResearchCenterController@add']);
});
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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::post('new_research', [ 'as' => 'new_research'],'ResearchCenterController@add');

    Route::get('list_fund', 'FundController@listFund');
    Route::get('fund_ago', 'FundController@fundAgo');
	Route::get('fund_request', 'ApplicationController@fundStatus');

	Route::get('fund_form', 'FundController@fundForm');
	Route::get('fund_manage', 'FundController@fundManage');
	Route::post('fund_insert_update', 'FundController@fundInsertUpdate');
	Route::get('fund_delete/{id}', 'FundController@fundDelete');

	Route::get('register_fund/{fundId}', 'ApplicationController@registerFund');

	// funds form request by user
	Route::get('form_signed_agreement', 'FundController@formSignedAgreement');
	Route::post('signed_agreement_insert_update', 'FundController@signedAgreementfundInsertUpdate');
});

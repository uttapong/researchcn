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

Route::any('home', [ 'as' => 'home', function () {
    return view('welcome');
}]);

Route::get('test', 'HomeController@testfund');

Route::get('rswk_home', [ 'as' => 'rswk_home', 'uses' => 'FundController@listFund']);

Route::any('logout', ['as' => 'logout', function () {
    //
}]);
Route::any('login', ['as' => 'login', function () {
    //Route::auth();
}]);

Route::group(['middleware' => 'web','prefix' => 'rscn'], function () {
    // Route::auth();
    Route::get('', 'ResearchCenterController@index');
    Route::get('home', [ 'as' => 'rscn_home', 'uses' => 'ResearchCenterController@index']);
    Route::post('simple_search', [ 'as' => 'simple_search', 'uses' => 'ResearchCenterController@simplesearch']);
    Route::post('advance_search', [ 'as' => 'advance_search', 'uses' => 'ResearchCenterController@advancesearch']);

    Route::get('new_research', 'ResearchCenterController@new_research');
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
	Route::get('fund_user_request', 'ApplicationController@applicationUserRequest');
	Route::post('fund_insert_update', 'FundController@fundInsertUpdate');
	Route::get('fund_delete/{id}', 'FundController@fundDelete');

	Route::get('register_fund/{fundId}', 'ApplicationController@registerFund');

	Route::get('application_update/{appId}/{status}', 'ApplicationController@applicationUpdate');
	Route::get('file_upload_update/{uploadId}/{status}', 'ApplicationController@fileUploadUpdate');

	// funds form request by user
	Route::get('form_signed_agreement', 'FundController@formSignedAgreement');
	Route::get('form_first_payment', 'FundController@formFirstPayment');
	Route::get('form_second_payment', 'FundController@formSecondPayment');
	Route::get('form_second_progress_report', 'FundController@formSecondProgressReport');
	Route::get('form_finalized', 'FundController@formFinalized');
	Route::get('form_project_finished', 'FundController@formProjectFinished');

	Route::post('signed_agreement_insert_update', 'FundController@signedAgreementInsertUpdate');
	Route::post('first_payment_insert_update', 'FundController@firstPaymentInsertUpdate');
	Route::post('second_payment_insert_update', 'FundController@secondPaymentInsertUpdate');
	Route::post('second_progress_report_insert_update', 'FundController@secondProgressReportInsertUpdate');
	Route::post('finalized_insert_update', 'FundController@finalizedInsertUpdate');
	Route::post('project_finished_insert_update', 'FundController@projectFinishedInsertUpdate');
});

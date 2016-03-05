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
Route::get('/', ['as'=>'base',function () {
	return view('welcome');
}]);
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

Route::any('uploads', [ 'as' => 'uploads', 'middleware' => 'auth']);
Route::group(['middleware' => 'web','prefix' => 'rscn'], function () {
    // Route::auth();
	Route::get('', [ 'as' => 'base_rscn', 'uses' => 'ResearchCenterController@index']);
	Route::get('getfile/{researchid}', [ 'as' => 'get_research', 'uses' => 'ResearchCenterController@getfile']);
	Route::get('home', [ 'as' => 'rscn_home', 'uses' => 'ResearchCenterController@index']);
	Route::get('dashboard', [ 'as' => 'dashboard_rscn', 'uses' => 'ResearchCenterController@dashboard']);
	Route::post('simple_search', [ 'as' => 'simple_search', 'uses' => 'ResearchCenterController@simplesearch']);
	Route::post('advance_search', [ 'as' => 'advance_search', 'uses' => 'ResearchCenterController@advancesearch']);
	Route::get('new_research', 'ResearchCenterController@new_research');
	Route::post('new_research', [ 'as' => 'new_research', 'uses' => 'ResearchCenterController@add']);

	Route::get('preview/{researchid}', [ 'as' => 'preview_research', 'uses' => 'ResearchCenterController@preview']);
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
Route::group(['middleware' => ['web']], function () {
	Route::auth();
});


Route::group(['middleware' => 'web','prefix' => 'rswk'], function () {

	Route::auth();
	Route::get('', [ 'as' => 'base_rswk', 'uses' => 'FundController@listFund']);

	Route::get('list_fund',[ 'as' => 'list_fund',  'uses' =>'FundController@listFund']);
	Route::get('fund_ago', [ 'as' => 'fund_ago', 'uses' =>'FundController@fundAgo']);
	Route::get('fund_request',[ 'as' => 'fund_request', 'uses' => 'ApplicationController@fundStatus']);

	Route::get('rscn_home', [ 'as' => 'rscn_home', 'uses' => 'ResearchCenterController@index']);
  	Route::get('fund_form', [ 'as' => 'fund_form','middleware' => 'auth', 'uses' => 'FundController@fundForm']);

	Route::get('fund_manage', [ 'as' => 'fund_manage','middleware' => 'auth', 'uses' =>'FundController@fundManage']);
	Route::get('fund_user_request_choose', [ 'as' => 'fund_user_request_choose','middleware' => 'auth', 'uses' =>'ApplicationController@applicationUserRequestChoose']);
	Route::get('fund_user_request', [ 'as' => 'fund_user_request','middleware' => 'auth', 'uses' =>'ApplicationController@applicationUserRequest']);
	Route::post('fund_insert_update',[ 'as' => 'fund_insert_update','middleware' => 'auth', 'uses' => 'FundController@fundInsertUpdate']);
	Route::get('fund_delete/{id}',[ 'as' => 'fund_delete','middleware' => 'auth', 'uses' => 'FundController@fundDelete']);

	Route::get('register_fund/{fundId}',[ 'as' => 'register_fund','middleware' => 'auth', 'uses' => 'ApplicationController@registerFund']);

	Route::get('application_update/{appId}/{status}',[ 'as' => 'application_update','middleware' => 'auth', 'uses' => 'ApplicationController@applicationUpdate']);
	Route::get('file_upload_update/{uploadId}/{status}',[ 'as' => 'file_upload_update','middleware' => 'auth', 'uses' => 'ApplicationController@fileUploadUpdate']);

	// funds form request by user
	Route::get('form_signed_agreement',[ 'as' => 'form_signed_agreement','middleware' => 'auth', 'uses' => 'FundController@formSignedAgreement']);
	Route::get('form_first_payment',[ 'as' => 'form_first_payment','middleware' => 'auth', 'uses' => 'FundController@formFirstPayment']);
	Route::get('form_second_payment',[ 'as' => 'form_second_payment','middleware' => 'auth', 'uses' => 'FundController@formSecondPayment']);
	Route::get('form_second_progress_report',[ 'as' => 'form_second_progress_report','middleware' => 'auth', 'uses' => 'FundController@formSecondProgressReport']);
	Route::get('form_finalized', [ 'as' => 'form_finalized','middleware' => 'auth', 'uses' =>'FundController@formFinalized']);
	Route::get('form_project_finished',[ 'as' => 'form_project_finished','middleware' => 'auth', 'uses' => 'FundController@formProjectFinished']);

	Route::post('signed_agreement_insert_update',[ 'as' => 'signed_agreement_insert_update','middleware' => 'auth', 'uses' => 'FundController@signedAgreementInsertUpdate']);
	Route::post('first_payment_insert_update',[ 'as' => 'first_payment_insert_update','middleware' => 'auth', 'uses' => 'FundController@firstPaymentInsertUpdate']);
	Route::post('second_payment_insert_update',[ 'as' => 'second_payment_insert_update','middleware' => 'auth', 'uses' => 'FundController@secondPaymentInsertUpdate']);
	Route::post('second_progress_report_insert_update',[ 'as' => 'second_progress_report_insert_update','middleware' => 'auth', 'uses' => 'FundController@secondProgressReportInsertUpdate']);
	Route::post('finalized_insert_update',[ 'as' => 'finalized_insert_update','middleware' => 'auth', 'uses' => 'FundController@finalizedInsertUpdate']);
	Route::post('project_finished_insert_update', [ 'as' => 'project_finished_insert_update','middleware' => 'auth', 'uses' =>'FundController@projectFinishedInsertUpdate']);
});

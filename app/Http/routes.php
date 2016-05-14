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


Route::any('uploads', [ 'as' => 'uploads', 'middleware' => 'auth']);

// Route::get('lang/{locale}',[ 'as' => 'lang', function ($locale) {
//     App::setLocale($locale);
//     return Redirect::back();
// }]);


Route::group(['middleware' => 'web','prefix' => 'rscn'], function () {

	Route::get('', [ 'as' => 'base_rscn', 'uses' => 'ResearchCenterController@index']);
	Route::get('getfile/{researchid}', [ 'as' => 'get_research', 'uses' => 'ResearchCenterController@getfile']);
	Route::get('home', [ 'as' => 'rscn_home', 'uses' => 'ResearchCenterController@index']);
	Route::get('dashboard_rscn', [ 'as' => 'dashboard_rscn', 'uses' => 'ResearchCenterController@dashboard']);
	Route::post('simple_search', [ 'as' => 'simple_search', 'uses' => 'ResearchCenterController@simplesearch']);
	Route::post('advance_search', [ 'as' => 'advance_search', 'uses' => 'ResearchCenterController@advancesearch']);

    Route::get('new_research/{researchid?}', [ 'as' => 'research', 'uses' => 'ResearchCenterController@new_research']);
	Route::post('new_research', [ 'as' => 'new_research', 'uses' => 'ResearchCenterController@add']);
	Route::any('del_research/{researchid}', [ 'as' => 'del_research', 'uses' => 'ResearchCenterController@remove']);
  Route::get('research_detail/{researchid}', [ 'as' => 'research_detail', 'uses' => 'ResearchCenterController@detail']);

	Route::get('preview/{researchid}', [ 'as' => 'preview_research', 'uses' => 'ResearchCenterController@preview']);

	Route::get('new_translate', [ 'as' => 'new_translate', 'uses' => 'TranslateController@addTranslate']);
	Route::post('new_translate', [ 'as' => 'add_translate', 'uses' => 'TranslateController@newTranslate']);
	Route::get('upload_translate/{type}/{translate_id}', [ 'as' => 'upload_translate', 'uses' => 'TranslateController@addTranslateFile']);
	Route::post('upload_translate/{type}/{translate_id}', [ 'as' => 'upload_translatefiles','middleware' => 'auth', 'uses' => 'TranslateController@fileUpload']);
	Route::any('translate_file_delete/{doc_id}',[ 'as' => 'translate_file_delete','middleware' => 'auth', 'uses' => 'TranslateController@fileDelete']);
	Route::any('translate_file_list/{translate_id}',[ 'as' => 'translate_file_list','middleware' => 'auth', 'uses' => 'TranslateController@listDoc']);
	Route::any('translate_save_status/{translate_id}',[ 'as' => 'translate_save_status','middleware' => 'auth', 'uses' => 'TranslateController@saveStatus']);

	Route::any('translate_list',[ 'as' => 'translate_list','middleware' => 'auth', 'uses' => 'TranslateController@listTranslate']);
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
  Route::Auth();
  Route::get('login',[ 'as' => 'login',  'uses' =>'Auth\AuthController@showLoginForm']);
  // Route::post('login',[ 'as' => 'login',  'uses' =>'Auth\AuthController@login']);
  Route::get('logout',[ 'as' => 'logout',  'uses' =>'Auth\AuthController@logout']);
  Route::get('register', [ 'as' => 'register',  'uses' =>'Auth\AuthController@showRegistrationForm']);
  Route::post('register', 'Auth\AuthController@register');


  Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'HomeController@switchLang']);
  Route::any('/', [ 'as' => 'base', 'uses'=>'HomeController@dashboard']);
});
// Route::get('login', 'Auth\AuthController@showLoginForm');


// Route::get('login', 'Auth\AuthController@showLoginForm');
// Route::post('login', 'Auth\AuthController@login');
// Route::get('logout', 'Auth\AuthController@logout');



Route::group(['middleware' => ['web','auth']], function () {

Route::any('home', [ 'as' => 'home', 'uses'=>'HomeController@dashboard']);




  Route::get('user_update/{userid}',[ 'as' => 'user_detail',  'uses' =>'UserController@detail']);
  Route::post('user_update/{userid}',[ 'as' => 'user_update',  'uses' =>'UserController@update']);
  Route::get('user_manage',[ 'as' => 'user_manage',  'uses' =>'UserController@manage']);
  Route::get('user_approve/{userid}/{status}',[ 'as' => 'user_approve',  'uses' =>'UserController@approve']);

  Route::get('dashboard', [ 'as' => 'dashboard', 'uses' => 'HomeController@dashboard']);
});


Route::group(['middleware' => 'web','prefix' => 'rswk'], function () {

	Route::get('', [ 'as' => 'base_rswk', 'uses' => 'FundController@listFund']);

	Route::get('list_fund',[ 'as' => 'list_fund',  'uses' =>'FundController@listFund']);
	Route::get('fund_report', [ 'as' => 'fund_report', 'uses' =>'FundController@fundReport']);
	Route::get('fund_ago', [ 'as' => 'fund_ago', 'uses' =>'FundController@fundAgo']);
	Route::get('fund_request',[ 'as' => 'fund_request', 'uses' => 'ApplicationController@fundStatus']);

	Route::get('rscn_home', [ 'as' => 'rscn_home', 'uses' => 'ResearchCenterController@index']);
  	Route::get('fund_form', [ 'as' => 'fund_form','middleware' => 'auth', 'uses' => 'FundController@fundForm']);
  	Route::get('fund_form_file_upload', [ 'as' => 'fund_form_file_upload','middleware' => 'auth', 'uses' => 'FundController@fundFormFileUpload']);

	Route::get('fund_manage', [ 'as' => 'fund_manage','middleware' => 'auth', 'uses' =>'FundController@fundManage']);
	Route::get('fund_user_request_choose', [ 'as' => 'fund_user_request_choose','middleware' => 'auth', 'uses' =>'ApplicationController@applicationUserRequestChoose']);
	Route::get('fund_user_request', [ 'as' => 'fund_user_request','middleware' => 'auth', 'uses' =>'ApplicationController@applicationUserRequest']);
	Route::get('fund_search_user_request', [ 'as' => 'fund_search_user_request','middleware' => 'auth', 'uses' =>'ApplicationController@applicationSearchUserRequest']);
	Route::post('fund_insert_update',[ 'as' => 'fund_insert_update','middleware' => 'auth', 'uses' => 'FundController@fundInsertUpdate']);
	Route::any('fund_file_upload_insert',[ 'as' => 'fund_file_upload_insert','middleware' => 'auth', 'uses' => 'FundController@fundFileUploadInsert']);
  	Route::any('fund_file_delete/{download_id}',[ 'as' => 'fund_file_delete','middleware' => 'auth', 'uses' => 'FundController@fundFileDelete']);
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
	Route::get('form_request_extend', [ 'as' => 'form_request_extend','middleware' => 'auth', 'uses' =>'FundController@formRequestExtend']);
	Route::get('form_project_finished',[ 'as' => 'form_project_finished','middleware' => 'auth', 'uses' => 'FundController@formProjectFinished']);

	Route::post('signed_agreement_insert_update',[ 'as' => 'signed_agreement_insert_update','middleware' => 'auth', 'uses' => 'FundController@signedAgreementInsertUpdate']);
	Route::post('first_payment_insert_update',[ 'as' => 'first_payment_insert_update','middleware' => 'auth', 'uses' => 'FundController@firstPaymentInsertUpdate']);
	Route::post('second_payment_insert_update',[ 'as' => 'second_payment_insert_update','middleware' => 'auth', 'uses' => 'FundController@secondPaymentInsertUpdate']);
	Route::post('second_progress_report_insert_update',[ 'as' => 'second_progress_report_insert_update','middleware' => 'auth', 'uses' => 'FundController@secondProgressReportInsertUpdate']);
	Route::post('finalized_insert_update',[ 'as' => 'finalized_insert_update','middleware' => 'auth', 'uses' => 'FundController@finalizedInsertUpdate']);
	Route::post('request_extend_insert_update',[ 'as' => 'request_extend_insert_update','middleware' => 'auth', 'uses' => 'FundController@requestExtendInsertUpdate']);
	Route::post('project_finished_insert_update', [ 'as' => 'project_finished_insert_update','middleware' => 'auth', 'uses' =>'FundController@projectFinishedInsertUpdate']);

	Route::get('emailnotify', [ 'as' => 'emailnotify', 'uses' =>'HomeController@emailnotify']);
	Route::get('manualnotify', [ 'as' => 'manualnotify', 'uses' =>'HomeController@manualnotify']);
	Route::get('deleteapp/{appid}', [ 'as' => 'deleteapp', 'uses' =>'ApplicationController@applicationDelete']);

});

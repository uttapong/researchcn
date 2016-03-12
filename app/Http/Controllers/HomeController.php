<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Fund as Fund;
use Bouncer;
use Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function switchLang($lang)
        {
            if (array_key_exists($lang, Config::get('languages'))) {
                Session::set('applocale', $lang);
            }
            return Redirect::back();
        }

    public function dashboard()
  {
     return view('dashboard');
  }
    // public function test(){
    //   //$user = Fund::find(1)->user;
    //   $applications=Fund::find(1)->applications;
    //   $test_var='adfafdadfadf';
    //   return view('home',['test_var' => $applications]);
    //
    // }
    public function testfund(){
      //$user = Fund::find(1)->user;
      $apps=Fund::find(1)->applications;
      // $test_var='adfafdadfadf';
      return view('home',['apps' => $apps]);

    }
}

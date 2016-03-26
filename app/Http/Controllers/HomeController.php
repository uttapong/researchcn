<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Fund as Fund;
use App\Research as Research;
use App\Translation as Translation;
use App\User as User;
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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return redirect()->action('HomeController@dashboard');
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
        // $this->middleware('auth');
      $researchs = Research::count();
      $funds = Fund::count();
      $translations = Translation::count();
      $users=User::count();
     return view('dashboard',['researchs'=>$researchs,'funds'=>$funds,'translations'=>$translations,'users'=>$users]);
  }

}

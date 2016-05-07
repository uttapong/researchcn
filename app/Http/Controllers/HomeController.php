<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Fund as Fund;
use App\Application as Application;
use App\Research as Research;
use App\Translation as Translation;
use App\User as User;
use Bouncer;
use DB;
use Mail;
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

  public function emailnotify(){
    $now = new \DateTime('now');
    $now_str=$now->format('Y-m-d H:i:s');
    $next7=$now->add(new \DateInterval('P10D'));

    $funds = Fund::where(DB::raw('DATE_SUB(upload_end,INTERVAL 7 DAY)'), '<', $now_str)->where('upload_end','>',$now_str)->get();

    foreach ($funds as $fund) {
      
      $applications=$fund->applications;
      // print_r($applications);
      foreach($applications as $application){
        
        if(!in_array($application->status,["approved_project_finished","rejected"])){
          $data=array();
          $data['application']=$application;
          $data['user']=$application->user;
          $data['fund']=$fund;

          Mail::queue('emails.autonotify', $data, function($message) use ($data)
          {
              $message->to($data['user']->email, $data['user']->name)->subject('You have uncompleted applications at nurse.tu.ac.th');
          });
          echo "<p>Notification message sent to {$application->user->email}</p>\n";
        }
      }
    }
  }

  public function manualnotify(Request $request){
    $app_id= $request->get('appid');

     $application=Application::find($app_id); 
     // die($application);
     $fund=Fund::find($application->fund);
      // print_r($applications);

        
    $data=array();
    $data['application']=$application;
    $data['user']=$application->user;
    $data['fund']=$fund;

    Mail::queue('emails.autonotify', $data, function($message) use ($data)
    {
        $message->to($data['user']->email, $data['user']->name)->subject('You have uncompleted applications at nurse.tu.ac.th');
    });
    echo "success";
        
      
    
  }

}

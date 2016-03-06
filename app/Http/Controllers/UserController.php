<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Bouncer;
use Auth;
use DB;
use App\Research as Research;
use App\User;
use Validator;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }



    public function detail($userid){
      $user=User::find($userid);
      return view('auth.detail',['user'=>$user]);
    }

    public function manage(){
      $users=User::paginate(10);
      return view('auth.manage',['users'=>$users]);
    }

    public function approve(Request $request,$userid,$status){
      $user=User::find($userid);
      $users=User::paginate(10);
      if(!$user)return view('auth.manage',['users'=>$users,'alert_type'=>'danger','msg'=>'User not found!']);


      $user->status =$status;
      if($user->save()){
        $users=User::paginate(10);
        return view('auth.manage',['users'=>$users,'alert_type'=>'success','msg'=>"User's status has been successfully updated."]);
      }
      return view('auth.manage',['users'=>$users,'alert_type'=>'danger','msg'=>"User's updated failed."]);

    }
    public function update(Request $request,$userid){
      $user=User::find($userid);
      if(!$user)return view('auth.detail',['alert_type'=>'danger','msg'=>'User not found!']);

      $v = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'password'=>'confirmed',
             'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'idcard' => 'required|max:13|unique:users,idcard,'.$user->id,
          ]);

     if ($v->fails())
     {
         return view('auth.detail',['errors'=>$v->errors(),'user'=>$user]);
     }

      $user->name =$request->input('name');
      $user->idcard =$request->input('idcard');
      $user->email =$request->input('email');
      $user->status=$request->input('status');
      if($request->input('password'))$user->password =bcrypt($request->input('keyword'));
      if($user->save())return view('auth.detail',['user'=>$user,'alert_type'=>'success','msg'=>"User's information has been successfully updated."]);
      return view('auth.detail',['user'=>$user,'alert_type'=>'danger','msg'=>"User's updated failed."]);
    }
  }

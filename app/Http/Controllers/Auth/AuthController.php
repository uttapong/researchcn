<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $username = 'idcard';
    protected $loginPath = '/login';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function detail($userid){
      $user=User::find($userid);
      return view('auth.detail',['user'=>$user]);
    }

    public function manage($userid){
      $users=User::all()->paginate(10);
      return view('auth.manage',['users'=>$users]);
    }
    public function update(Request $request,$userid){
      $user=User::find($userid);
      if(!$user)return view('auth.detail',['alert_type'=>'danger','msg'=>'User not found!']);

      //  print_r($request->all());
      // $this->validate($request, [
      //     'name' => 'required|max:255',
      //     'email' => 'required|email|max:255|unique:users',
      //     'idcard' => 'required|max:13|unique:users'
      // ]);
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
      if($request->input('password'))$user->password =bcrypt($request->input('keyword'));
      if($user->save())return view('auth.detail',['user'=>$user,'alert_type'=>'success','msg'=>"User's information has been successfully updated."]);
      return view('auth.detail',['user'=>$user,'alert_type'=>'danger','msg'=>"User's update failed."]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
            'idcard' => 'required|max:13|unique:users'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'idcard' => $data['idcard'],
            'password' => bcrypt($data['password']),
        ]);
        $user->assign('reader');
        return $user;
    }

}

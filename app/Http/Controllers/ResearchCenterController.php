<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Bouncer;

class ResearchCenterController extends Controller
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
        return view('researchcenter.new_research');
    }


    public function add(Request $request){
      $this->validate($request, [
          'title' => 'required|unique:researchs|max:100',
          'authors' => 'required|max:200',
          'keywords' => 'required|max:200',
          'abstract' => 'required',
          'file_path' => 'required|max:200',
          'type' => 'required',
          'publication_name' => 'required|max:200',
          'published_year' => 'required|max:200'
      ]);
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

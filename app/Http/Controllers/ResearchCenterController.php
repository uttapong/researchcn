<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Bouncer;
use Auth;
use DB;
use App\Research as Research;
class ResearchCenterController extends Controller
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
      $researchs = Research::paginate(4);

      return view('researchcenter.home', ['researchs' => $researchs]);
    }

    public function simplesearch(Request $request)
    {
      $kw=$request->input('keyword');
      $researchs = Research::where('title', 'like', "%{$kw}%")->orWhere('abstract', 'like', "%{$kw}%")->orWhere('keywords', 'like', "%{$kw}%")->orWhere('authors', 'like', "%{$kw}%")->orWhere('publication_name', 'like', "%{$kw}%")->paginate(4);

      return view('researchcenter.home', ['researchs' => $researchs]);
    }

    public function advancesearch(Request $request)
    {
      $title=$request->input('title');
      $text=$request->input('fulltext');
      $kw=$request->input('keyword');
      $pub=$request->input('publication');
      $year=$request->input('year');
      $authors=$request->input('authors');
      $researchs = Research::where('title', 'like', "%{$title}%")->orWhere('abstract', 'like', "%{$text}%")->orWhere('keywords', 'like', "%{$kw}%")->orWhere('authors', 'like', "%{$authors}%")->orWhere('publication_name', 'like', "%{$pub}%")->orWhere('published_year', 'like', "%{$year}%")->paginate(4);

      return view('researchcenter.home', ['researchs' => $researchs]);
    }

    public function replace(array $input)
 {
     $this->getInputSource()->replace($input);
  }
  public function dashboard()
{
   return view('researchcenter.dashboard');
}
  public function getfile($research_id){
    $this->middleware('auth');
    $research=Research::find($research_id);
    if(Auth::user())
    return redirect("/uploads/{$research->id}/{$research->file_path}");

    return redirect()->route('login');
  }
  public function merge(array $input)
  {
      $this->getInputSource()->add($input);
   }
   public function preview($id){
     $research=Research::find($id);
     return response()->json($research);
   }
   public function new_research(){
     $this->middleware('auth');
     return view('researchcenter.new_research');
   }
    public function add(Request $request){
      $this->middleware('auth');

      $this->validate($request, [
          'title' => 'required|unique:researchs|max:100',
          'authors' => 'required|max:200',
          'keywords' => 'required|max:200',
          'abstract' => 'required',
          'fulltext_file' => 'required|mimes:pdf,doc,docx',
          'type' => 'required',
          'publication_name' => 'required|max:200',
          'published_year' => 'required|max:200'
      ]);
      $upload_file=$request->file('fulltext_file');
      $fileName=md5(microtime()).".".$upload_file->getClientOriginalExtension();
      // $merge=array('file_path' =>$fileName,'creator'=>Auth::user()->id);
      // print_r(array_merge($request->all(),$merge));
      $request->merge(array('file_path' =>$fileName));
      $request->merge(array('creator'=>Auth::user()->id));
      // $request->input('file_path')=$fileName;
      // $request->input('creator')=Auth::user()->id;
      $research=Research::create(array_merge($request->all()));
      if ($request->hasFile('fulltext_file')) {
    //$request->file('photo')->move($destinationPath);
       $research_id = $research->id;

       $destinationPath='uploads/'.$research_id.'/';

        $upload_file->move($destinationPath, $fileName);
      }
      if($research)return view('researchcenter.new_research',['alert_type'=>'success','msg'=>'Successfully insert new research.']);
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

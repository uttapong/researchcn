<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Bouncer;
use Auth;
use DB;
use App\Research as Research;
use App\Researchfield;
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
      $researchs = Research::orderBy('created_at', 'desc')->paginate(4);

      return view('researchcenter.home', ['researchs' => $researchs]);
    }

    public function simplesearch(Request $request)
    {
      $kw=$request->input('keyword');
      $researchs = Research::where('title', 'like', "%{$kw}%")->orWhere('abstract', 'like', "%{$kw}%")->orWhere('keywords', 'like', "%{$kw}%")->orWhere('authors', 'like', "%{$kw}%")->orWhere('publication_name', 'like', "%{$kw}%")->orderBy('created_at', 'desc')->paginate(4);

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
      $researchs = Research::where('title', 'like', "%{$title}%")->orWhere('abstract', 'like', "%{$text}%")->orWhere('keywords', 'like', "%{$kw}%")->orWhere('authors', 'like', "%{$authors}%")->orWhere('publication_name', 'like', "%{$pub}%")->orWhere('published_year', 'like', "%{$year}%")->orderBy('created_at', 'desc')->paginate(4);

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
    return redirect("/uploads/{$research->id}/{$research->full_text_file}");

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
     $fields=Researchfield::all();
     return view('researchcenter.new_research',['fields'=>$fields]);
   }
   public function detail($id){
     $research=Research::find($id);
     return view('researchcenter.detail',['research'=>$research]);
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
          'published_year' => 'required|max:200',
          'cited_count'=>'integer'
      ]);

      $fulltext_file=$request->file('fulltext_file');
      $fulltext_filename=md5(microtime()).".".$fulltext_file->getClientOriginalExtension();

      if($request->hasFile('article_file'))
      {
        $article_file=$request->file('article_file');
        $article_filename=md5(microtime()).".".$article_file->getClientOriginalExtension();
        // $request->merge(array('article_file' =>$article_filename));
      }

      if($request->hasFile('cover_file'))
      {
        $cover_file=$request->file('cover_file');
        $cover_filename=md5(microtime()).".".$cover_file->getClientOriginalExtension();
        // $request->merge(array('cover_file' =>$cover_filename));
      }

      $request->merge(array('full_text_file' =>$fulltext_filename));
      $request->merge(array('creator'=>Auth::user()->id));

      $research=Research::create(array_merge($request->all()));
      $research_id = $research->id;
      $destinationPath='uploads/'.$research_id.'/';

      if ($request->hasFile('fulltext_file'))$fulltext_file->move($destinationPath, $fulltext_filename);
      if ($request->hasFile('article_file')) {
        $article_file->move($destinationPath, $article_filename);
        $research->article_file=$article_filename;
        $research->save();
      }
      if ($request->hasFile('cover_file')){
        $cover_file->move($destinationPath, $cover_filename);
        $research->cover_file=$cover_filename;
        $research->save();
      }
      if($research){

        $fields=Researchfield::all();
        return view('researchcenter.new_research',['fields'=>$fields,'alert_type'=>'success','msg'=>'Successfully insert new research.']);
      }
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

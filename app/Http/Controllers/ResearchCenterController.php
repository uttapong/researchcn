<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Bouncer;
use Auth;
use DB;
use App\Fund as Fund;
use App\Research as Research;
use App\Translation as Translation;
use App\User as User;
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
      $researchs = Research::orderBy('created_at', 'desc')->paginate(12);

      return view('researchcenter.home', ['researchs' => $researchs]);
    }

    public function simplesearch(Request $request)
    {
      $kw=$request->input('keyword');
      $researchs = Research::where('title', 'like', "%{$kw}%")->orWhere('abstract', 'like', "%{$kw}%")->orWhere('keywords', 'like', "%{$kw}%")->orWhere('authors', 'like', "%{$kw}%")->orWhere('publication_name', 'like', "%{$kw}%")->orderBy('created_at', 'desc')->paginate(12);

      $str_url=route('simpleexport', $request->all());
      return view('researchcenter.home', ['researchs' => $researchs,'exporturl'=>$str_url ]);
    }

    public function simpleexport(Request $request)
    {
      // nuse League\Csv\Reader;
      $kw=$request->input('keyword');
      $researchs = Research::where('title', 'like', "%{$kw}%")->orWhere('abstract', 'like', "%{$kw}%")->orWhere('keywords', 'like', "%{$kw}%")->orWhere('authors', 'like', "%{$kw}%")->orWhere('publication_name', 'like', "%{$kw}%")->orderBy('created_at', 'desc')->paginate(9999);

      $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

      $csv->insertOne(\Schema::getColumnListing('researchs'));

        foreach ($researchs as $research) {
            $csv->insertOne($research->toArray());
        }

      $csv->output('publication_search_export.csv');

    }

    public function advancesearch(Request $request)
    {
      $title=$request->input('title');
      $text=$request->input('fulltext');
      $kw=$request->input('keyword');
      $pub=$request->input('publication');
      $start_year=$request->input('start_year');
      $end_year=$request->input('end_year');
      $authors=$request->input('authors');
      $type=$request->input('type');

      $researchs = new Research;
      if($title)$researchs=$researchs->where('title', 'like', "%{$title}%");
      if($text)$researchs=$researchs->where('abstract', 'like', "%{$text}%");
      if($kw)$researchs=$researchs->where('keywords', 'like', "%{$kw}%");
      if($pub)$researchs=$researchs->where('publication_name', 'like', "%{$pub}%");
      if($start_year&&$end_year)$researchs=$researchs->where('published_year', '>=', "{$start_year}")->where('published_year', '<=', "{$end_year}");
      if($authors)$researchs=$researchs->where('authors', 'like', "%{$authors}%");
      if($authors)$researchs=$researchs->where('authors', 'like', "%{$authors}%");
      if($type!="none")$researchs=$researchs->where('type', 'like', "%{$type}%");

      $researchs = $researchs->paginate(12);
      $str_url=route('simpleexport', $request->all());
      return view('researchcenter.home', ['researchs' => $researchs,'exporturl'=>$str_url]);
    }

    public function advanceexport(Request $request)
    {
      
      $title=$request->input('title');
      $text=$request->input('fulltext');
      $kw=$request->input('keyword');
      $pub=$request->input('publication');
      $start_year=$request->input('start_year');
      $end_year=$request->input('end_year');
      $authors=$request->input('authors');
      $type=$request->input('type');

      $researchs = new Research;
      if($title)$researchs=$researchs->where('title', 'like', "%{$title}%");
      if($text)$researchs=$researchs->where('abstract', 'like', "%{$text}%");
      if($kw)$researchs=$researchs->where('keywords', 'like', "%{$kw}%");
      if($pub)$researchs=$researchs->where('publication_name', 'like', "%{$pub}%");
      if($start_year&&$end_year)$researchs=$researchs->where('published_year', '>=', "{$start_year}")->where('published_year', '<=', "{$end_year}");
      if($authors)$researchs=$researchs->where('authors', 'like', "%{$authors}%");
      if($authors)$researchs=$researchs->where('authors', 'like', "%{$authors}%");
      if($type!="none")$researchs=$researchs->where('type', 'like', "%{$type}%");

      $researchs = $researchs->paginate(9999);

      $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

      $csv->insertOne(\Schema::getColumnListing('researchs'));

        foreach ($researchs as $research) {
            $csv->insertOne($research->toArray());
        }

      $csv->output('publication_search_export.csv');

    }

    public function replace(array $input)
 {
     $this->getInputSource()->replace($input);
  }
  public function dashboard()
{
  $researchs = Research::count();
  $funds = Fund::count();
  $translations = Translation::count();
  $users=User::count();
 return view('researchcenter.dashboard',['researchs'=>$researchs,'funds'=>$funds,'translations'=>$translations,'users'=>$users]);

}
  public function getfile($research_id){
    $this->middleware('auth');
    $research=Research::find($research_id);
    if(Auth::user()&&Auth::user()->status =='approved')
    return redirect("/uploads/{$research->id}/{$research->full_text_file}");
    else{
      session(['message' => 'Your account has not been approved. Please contact administrator or call (02)986-9213']);
      Auth::logout();
    }
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
   public function new_research($researchid=null){
     $this->middleware('auth');
       $fields=Researchfield::all();
    if($researchid){
        $research=Research::find($researchid);
        return view('researchcenter.new_research',['research'=>$research,'fields'=>$fields,'authors_firstname'=>explode(',',$research->authors_firstname),'authors_lastname'=>explode(',',$research->authors_lastname)]);
    }

     return view('researchcenter.new_research',['fields'=>$fields,'authors_firstname'=>array(),'authors_lastname'=>array()]);
   }

   public function detail($id){
     $research=Research::find($id);
     return view('researchcenter.detail',['research'=>$research]);
   }
   public function remove($id){
     $research=Research::find($id);
     $research->delete();
     return redirect()->route('base_rscn');
   }
    public function add(Request $request){
      //$this->middleware('auth');

      $this->validate($request, [
          'title' => 'required|max:200',
          // 'authors' => 'required|max:200',
          'keywords' => 'max:200'
      ]);

      // die(print_r($request->input('authors_firstname'),true));
      $authors_name="";
      $i=0;
      foreach($request->input('authors_firstname') as $firstname){
        $authors_name=$authors_name.$firstname." ".$request->input('authors_lastname')[$i].",";
        $i++;
      }
      $request->merge(array('authors'=>$authors_name));
      $request->merge(array('authors_firstname'=>implode(',', $request->input('authors_firstname'))));
      $request->merge(array('authors_lastname'=>implode(',', $request->input('authors_lastname'))));

      if($request->hasFile('fulltext_file'))
      {
        $fulltext_file=$request->file('fulltext_file');
        $fulltext_filename=md5(microtime()).".".$fulltext_file->getClientOriginalExtension();

        // $request->merge(array('full_text_file' =>$fulltext_filename));

      }
      if($request->hasFile('abstract_file'))
      {
        $abstract_file=$request->file('abstract_file');
        $abstract_filename=md5(microtime()).".".$abstract_file->getClientOriginalExtension();

        // $request->merge(array('full_text_file' =>$fulltext_filename));

      }
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

      $request->merge(array('creator'=>Auth::user()->id));

      if(count($request->input('article_level'))>0){
        $request->merge(array('article_level' => implode(',', $request->input('article_level'))));
      }

      if($request->input('research_id',null)){
        $research=Research::find($request->input('research_id',null));
        $research->update(array_merge($request->all()));
      }
      else{
        $research=Research::create(array_merge($request->all()));

      }
      $research_id = $research->id;
      $destinationPath='uploads/'.$research_id.'/';

      if ($request->hasFile('fulltext_file')){
        $fulltext_file->move($destinationPath, $fulltext_filename);
        $research->full_text_file=$fulltext_filename;
        $research->save();
      }
      if ($request->hasFile('abstract_file')){
        $abstract_file->move($destinationPath, $abstract_filename);
        $research->abstract_file=$abstract_filename;
        $research->save();
      }
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
        if($request->input('research_id'))
          return view('researchcenter.new_research',['fields'=>$fields,'alert_type'=>'success','msg'=>'Successfully update research data.']);
        else
          return view('researchcenter.new_research',['fields'=>$fields,'alert_type'=>'success','msg'=>'Successfully insert new research.']);
      }
    }
}

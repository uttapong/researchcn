<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Fund as Fund;
use App\Upload as Upload;
use App\Download as Download;
use App\Application as Application;
use App\Translation as Translation;
use App\Translationdoc as Translationdoc;
use Illuminate\Http\Request;

class TranslateController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }


	public function fundAgo() {
		return view('funds.fund_ago', [
			'funds' => Fund::where('apply_end', '<', new \DateTime('today'))->get()
		]);
	}

	public function fundManage() {
		return view('admin.fund_manage', [
			'funds' => Fund::get()
		]);
	}

	public function fundForm(Request $request) {
		$id = $request->get('id', 0);
		$fund = null;

		if ($id != 0) {
			$fund = Fund::find($id);
			if ($fund) {
				$fund->apply_start = date_format(date_create($fund->apply_start), "d-m-Y");
				$fund->apply_end = date_format(date_create($fund->apply_end), "d-m-Y");
				$fund->upload_start = date_format(date_create($fund->upload_start), "d-m-Y");
				$fund->upload_end = date_format(date_create($fund->upload_end), "d-m-Y");
				$fund->contract_end = date_format(date_create($fund->contract_end), "d-m-Y");
				$fund->created_date = date_format($fund->created_at, "d-m-Y");
			}
		}

		return view('admin.fund_form', [
			'fund' => $fund
		]);
	}

	public function fundInsertUpdate(Request $request) {
		$id = $request->input('id', 0);
		$name = $request->input('name');
		$type = $request->input('type');
		$description = $request->input('description');
		$contract_file = $request->file('contract_file', null);
		$apply_start = $request->input('apply_start');
		$apply_end = $request->input('apply_end');
		$upload_start = $request->input('upload_start');
		$upload_end = $request->input('upload_end');
		$contract_end = $request->input('contract_end');

		if ($id == 0) {
			// Insert new record
			$fund = new Fund;

			$userId = Auth::user()->id;
			$fund->creator = $userId;
		}
		else {
			// Update old record
			$fund = Fund::find($id);
		}

		$fund->name = $name;
		$fund->type = $type;
		$fund->description = $description;
		$fund->apply_start = date_format(date_create($apply_start), "Y-m-d");
		$fund->apply_end = date_format(date_create($apply_end), "Y-m-d");
		$fund->upload_start = date_format(date_create($upload_start), "Y-m-d");
		$fund->upload_end = date_format(date_create($upload_end), "Y-m-d");
		$fund->contract_end = date_format(date_create($contract_end), "Y-m-d");

		if ($request->hasFile('contract_file')) {
			if ($fund->contract_file) {
				// Remove old file from directory
				if (file_exists($fund->contract_file)) {
					unlink($fund->contract_file);
				}
			}

			// Copy new file to directory
			$hash = md5(microtime());
			$fileName = $hash . '.' . $contract_file->getClientOriginalExtension();
			$contract_file->move('file/', $fileName);
			$fund->contract_file = 'file/' . $fileName;
		}

		$fund->save();

		return redirect()->route('fund_manage');
	}

  public function listTranslate(){
    if(Auth::user()->is('admin')){
		$type='admin';
    $translate=Translation::paginate(20);
  }  else
		{$type='user';
    $translate=Translation::where('owner', Auth::user()->id)->paginate(20);}
    return view('translate.list',['type'=>$type,'translates'=>$translate]);
  }

	public function listDoc($translate_id){

    $docs_user=Translationdoc::where('translate_id',$translate_id)->where('type','user')->get();
		$docs_admin=Translationdoc::where('translate_id',$translate_id)->where('type','admin')->get();
    return view('translate.filelist',['docs_user'=>$docs_user,'docs_admin'=>$docs_admin]);
  }

	public function fundDelete($id) {
		$fund = Fund::find($id);
		$fund->delete();

		return redirect()->route('fund_manage');
	}

	public function newTranslate(Request $request) {

    	$translation = new Translation;
      $translation->note=$request->input('note');
      $translation->name=$request->input('name');
      $translation->owner=Auth::user()->id;
			$translation->status='รับงานแปล';
      if($translation->save()){
          return redirect()->route('upload_translate',['type'=>'user','translate_id'=>$translation->id]);
      }
      else
        return view('researchcenter.translate.new',['fields'=>$fields,'alert_type'=>'danger','msg'=>'Translation Service Application Error.']);

	}


  public function addTranslate(Request $request) {


		return view('translate.new');
	}

  public function addTranslateFile($type,$id){

		$type=Auth::user()->is('admin')?'admin':'user';
		$translation = Translation::find($id);
		if (!$translation) {
			return view('translate.new',['fields'=>$fields,'alert_type'=>'danger','msg'=>'Service Request Error, Please try again.']);
		}

		return view('translate.upload', [
			'translation_id' => $translation->id,
			'type'=>$type,
			'translation_name'=>$translation->name
		]);
  }

  public function saveStatus(Request $request,$translate_id){
    $translation = Translation::find($translate_id);
    $translation->status=$request->input('status');

    $translation->save();
    return redirect()->route('translate_list');

  }
	public function fileUpload(Request $request) {
		$id = $request->input('id', 0);
    $type = $request->input('type', 'user');

		$completed=[];

		if ($request->hasFile('files')) {
			$files = $request->file('files', null);
			foreach ($files as $key => $file) {
				$fileSize=$file->getSize();
				$fileName = $file->getClientOriginalName();
				// $filePath=
				$filePath='translation/'.$fileName;
				$file->move('translation/',$fileName);
				$translate_file = Translationdoc::create(['file_path'=>$filePath,'translate_id'=>$id,'type'=>$type,'status'=>'รับงานแปล']);
				if ($translate_file) {
					array_push(
						$completed,(object) array(
							'name' => $fileName,'deleteType'=>'DELETE','size' => $fileSize, 'url' => url('/').'/'.$filePath,
							'deleteUrl' => route('translate_file_delete', array('doc_id' => $translate_file->id))
						)
					);
				}
			}
		}

		return response()->json(['files'=>$completed]);
	}

	public function fileDelete(Request $request, $doc_id) {
		$id = $request->input('id', 0);
		$result=null;
		$translation=Translationdoc::find($doc_id);
		if ($translation) {
			// Remove old file from directory
			if (file_exists($translation->file_path)) {
				$result=unlink($translation->file_path);
				$translation->delete();
			}
		}
		if($result)
		return response()->json(['id'=>$doc_id]);

		return response()->json(['error'=>'Error, can not remove file.']);

	}

	private function uploadFile($request, $name_input) {
		$application_id = $request->input('request_id', 0);
		$file = $request->file($name_input, null);
		$filetype = intval(str_replace('file_', '', $name_input));

		print($filetype);
		$upload = Upload::where('application_id', $application_id)
		->where('filetype', $filetype)
		->first();

		if (!$upload) {
			$upload = new Upload;
		}

		if ($request->hasFile($name_input)) {
			if ($upload->file_path) {
				// Remove old file from directory
				if (file_exists($upload->file_path)) {
					unlink($upload->file_path);
				}
			}

			// Copy new file to directory
			$hash = md5(microtime());
			$fileName = $hash . '.' . $file->getClientOriginalExtension();
			$file->move('file/', $fileName);
			$upload->file_path = 'file/' . $fileName;

			$upload->status = 'uploaded';
			$upload->filetype = $filetype;
			$upload->application_id = $application_id;

			$upload->save();
		}
	}

	private function getFileUpload($filetypes, $application_id) {
		$upload = [];
		for ($j=0; $j < count($filetypes); $j++) {
			$file = Upload::where('application_id', $application_id)
			->where('filetype', $filetypes[$j])
			->first();

			if ($file) {
				if ($file->status != 'Reject') {
					if ($file->status == 'Approve') { $file->html = '<label class="control-label icon-check"> <b>Approved</b></label>'; }
					else { $file->html = '<label class="control-label icon-hourglass"> <b>Pending</b></label>'; }
				}
				array_push($upload, $file);
			}
		}

		return $upload;
	}

	private function updateAppStatus($request, $status) {
		$application_id = $request->input('request_id', 0);
		$application = Application::find($application_id);
		$application->status = $status;
		$application->save();
	}
}

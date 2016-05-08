<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Fund as Fund;
use App\Upload as Upload;
use App\Download as Download;
use App\Application as Application;
use Illuminate\Http\Request;

class FundController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function listFund() {
		$userId = Auth::user()->id;
		$applications = Application::where('owner', $userId)->get();

		$checkRegistered = [];
		for ($i=0; $i < count($applications); $i++) {
			array_push($checkRegistered, $applications[$i]->fund);
		}

		$funds = Fund::where('apply_start', '<=', new \DateTime('today'))->where('apply_end', '>=', new \DateTime('today'))->get();
		for ($i=0; $i < count($funds); $i++) {
			if (in_array($funds[$i]->id, $checkRegistered)) {
				$funds[$i]->registered = true;
			}
		}

		return view('funds.list_fund', [
			'funds' => $funds
		]);
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

		$notice_1 = $request->input('notice_1');
		$notice_2 = $request->input('notice_2');
		$notice_3 = $request->input('notice_3');
		$notice_4 = $request->input('notice_4');

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

		$fund->notice_1 = date_format(date_create($notice_1), "Y-m-d");
		$fund->notice_2 = date_format(date_create($notice_2), "Y-m-d");
		$fund->notice_3 = date_format(date_create($notice_3), "Y-m-d");
		$fund->notice_4 = date_format(date_create($notice_4), "Y-m-d");

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

	public function fundDelete($id) {
		$fund = Fund::find($id);
		$fund->delete();

		return redirect()->route('fund_manage');
	}

	public function fundFormFileUpload(Request $request) {
		$fundId = $request->get('id', 0);

		$fund = Fund::find($fundId);
		if (!$fund) {
			return redirect()->route('fund_manage');
		}

		return view('admin.fund_form_file_upload', [
			'fundId' => $fundId
		]);
	}

	public function fundFileUploadInsert(Request $request) {
		$id = $request->input('id', 0);
		$completed=[];

		if ($request->hasFile('files')) {
			$files = $request->file('files', null);
			foreach ($files as $key => $file) {
				$fileSize=$file->getSize();
				$fileName = $file->getClientOriginalName();
				// $filePath=
				$filePath='file/'.$fileName;
				$file->move('file/',$fileName);
				$download = Download::create(['file_path'=>$filePath,'fund_id'=>$id]);
				if ($download) {
					array_push(
						$completed,(object) array(
							'name' => $fileName,'deleteType'=>'DELETE','size' => $fileSize, 'url' => url('/').'/'.$filePath,
							'deleteUrl' => route('fund_file_delete', array('download_id' => $download))
						)
					);
				}
			}
		}

		return response()->json(['files'=>$completed]);
	}

	public function fundFileDelete(Request $request, $downloadid) {
		$id = $request->input('id', 0);
		$result=null;
		$download=Download::find($downloadid);
		if ($download) {
			// Remove old file from directory
			if (file_exists($download->file_path)) {
				$result=unlink($download->file_path);
				$download->delete();
			}
		}
		if($result)
		return response()->json(['id'=>$downloadid]);

		return response()->json(['error'=>'Error, can not remove file.']);

	}


	public function formSignedAgreement(Request $request) {
		$request_id = $request->get('request_id', null);
		$application = Application::find($request_id);

		if (!$application) {
			return redirect()->route('fund_request');
		}

		$upload = $this->getFileUpload(array(1, 2), $application->id);

		return view('funds.form_signed_agreement', [
			'request_id' => $request_id,
			'upload' => $upload
		]);
	}

	public function signedAgreementInsertUpdate(Request $request) {
		$this->uploadFile($request, 'file_1');
		$this->uploadFile($request, 'file_2');
		$this->uploadFile($request, 'file_22');

		$this->updateAppStatus($request, 'signed_agreement');

		return redirect()->route('fund_request');
	}

	public function formFirstPayment(Request $request) {
		$request_id = $request->get('request_id', null);
		$application = Application::find($request_id);

		if (!$application) {
			return redirect()->route('fund_request');
		}

		$upload = $this->getFileUpload(array(3, 4, 5, 6), $application->id);

		return view('funds.form_first_payment', [
			'request_id' => $request_id,
			'upload' => $upload
		]);
	}

	public function firstPaymentInsertUpdate(Request $request) {
		$this->uploadFile($request, 'file_3');
		$this->uploadFile($request, 'file_4');
		$this->uploadFile($request, 'file_5');
		$this->uploadFile($request, 'file_6');

		$this->updateAppStatus($request, 'first_payment');

		return redirect()->route('fund_request');
	}

	public function formSecondPayment(Request $request) {
		$request_id = $request->get('request_id', null);
		$application = Application::find($request_id);

		if (!$application) { return redirect()->route('fund_request'); }

		$upload = $this->getFileUpload(array(7, 8, 9), $application->id);

		return view('funds.form_second_payment', [
			'request_id' => $request_id,
			'upload' => $upload
		]);
	}

	public function secondPaymentInsertUpdate(Request $request) {
		$this->uploadFile($request, 'file_7');
		$this->uploadFile($request, 'file_8');
		$this->uploadFile($request, 'file_9');

		$this->updateAppStatus($request, 'second_payment');

		return redirect()->route('fund_request');
	}

	public function formSecondProgressReport(Request $request) {
		$request_id = $request->get('request_id', null);
		$application = Application::find($request_id);

		if (!$application) {
			return redirect()->route('fund_request');
		}

		$upload = $this->getFileUpload(array(10, 11), $application->id);

		return view('funds.form_second_progress_report', [
			'request_id' => $request_id,
			'upload' => $upload
		]);
	}

	public function secondProgressReportInsertUpdate(Request $request) {
		$this->uploadFile($request, 'file_10');
		$this->uploadFile($request, 'file_11');

		$this->updateAppStatus($request, 'second_progress_report');

		return redirect()->route('fund_request');
	}

	public function formFinalized(Request $request) {
		$request_id = $request->get('request_id', null);
		$application = Application::find($request_id);

		if (!$application) {
			return redirect()->route('fund_request');
		}

		$upload = $this->getFileUpload(array(12, 13, 17, 18,19,20,21,23,24), $application->id);

		return view('funds.form_finalized', [
			'request_id' => $request_id,
			'upload' => $upload
		]);
	}

	public function finalizedInsertUpdate(Request $request) {
		// $this->uploadFile($request, 'file_12');
		// $this->uploadFile($request, 'file_13');

		$this->uploadFile($request, 'file_17');
		$this->uploadFile($request, 'file_18');
		$this->uploadFile($request, 'file_19');
		$this->uploadFile($request, 'file_20');
		$this->uploadFile($request, 'file_21');

		$this->uploadFile($request, 'file_23');
		$this->uploadFile($request, 'file_24');

		$this->updateAppStatus($request, 'project_finished');

		return redirect()->route('fund_request');
	}

	public function formRequestExtend(Request $request) {
		$request_id = $request->get('request_id', null);
		$application = Application::find($request_id);

		if (!$application) {
			return redirect()->route('fund_request');
		}

		$upload = $this->getFileUpload(array(14, 15, 16), $application->id);

		return view('funds.form_request_extend', [
			'request_id' => $request_id,
			'upload' => $upload
		]);
	}

	public function requestExtendInsertUpdate(Request $request) {
		$this->uploadFile($request, 'file_14');
		$this->uploadFile($request, 'file_15');
		$this->uploadFile($request, 'file_16');

		$this->updateAppStatus($request, 'request_extend');

		return redirect()->route('fund_request');
	}

	public function formProjectFinished(Request $request) {
		$request_id = $request->get('request_id', null);
		$application = Application::find($request_id);

		if (!$application) {
			return redirect()->route('fund_request');
		}

		$upload = $this->getFileUpload(array(17, 18, 19, 20, 21), $application->id);

		return view('funds.form_project_finished', [
			'request_id' => $request_id,
			'upload' => $upload
		]);
	}

	public function projectFinishedInsertUpdate(Request $request) {
		$this->uploadFile($request, 'file_17');
		$this->uploadFile($request, 'file_18');
		$this->uploadFile($request, 'file_19');
		$this->uploadFile($request, 'file_20');
		$this->uploadFile($request, 'file_21');

		$this->updateAppStatus($request, 'project_finished');

		return redirect()->route('fund_request');
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

<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Fund as Fund;
use App\Upload as Upload;
use App\Filetype as Filetype;
use App\Application as Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function registerFund($fundId) {
		$application = new Application;
		$application->fund = $fundId;
		$application->status = 'applied';

		$userId = Auth::user()->id;
		$application->owner = $userId;

		$application->save();

		return redirect()->route('list_fund');
	}

	public function fundStatus() {
		$fundObject = array(
			"applied" => array(
				"currentStep" => "สมัครขอทุน", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected" => array(
				"currentStep" => "สมัครขอทุน", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved" => array(
				"currentStep" => "สมัครขอทุน", "nextStep" => "ทำสัญญารับทุน", "linkNextStep" => "form_signed_agreement",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"signed_agreement" => array(
				"currentStep" => "ทำสัญญารับทุน", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_agreement" => array(
				"currentStep" => "ทำสัญญารับทุน", "nextStep" => "แก้ไขไฟล์ที่ไม่ผ่านการอนุมติ", "linkNextStep" => "form_signed_agreement",
				"statusTitle" => "Reject", "statusClass" => "danger"),
			"approved_agreement" => array(
				"currentStep" => "ทำสัญญารับทุน", "nextStep" => "เบิกเงินงวดที่ 1", "linkNextStep" => "form_first_payment",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"first_payment" => array(
				"currentStep" => "เบิกเงินงวดที่ 1", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_first_payment" => array(
				"currentStep" => "เบิกเงินงวดที่ 1", "nextStep" => "แก้ไขไฟล์ที่ไม่ผ่านการอนุมติ", "linkNextStep" => "form_first_payment",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_first_payment" => array(
				"currentStep" => "เบิกเงินงวดที่ 1", "nextStep" => "รายงานความก้าวหน้าครั้งที่ 1", "linkNextStep" => "form_second_payment",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"second_payment" => array(
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 1", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_second_payment" => array(
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 1", "nextStep" => "แก้ไขไฟล์ที่ไม่ผ่านการอนุมติ", "linkNextStep" => "form_second_payment",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_second_payment" => array(
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 1", "nextStep" => "รายงานความก้าวหน้าครั้งที่ 2", "linkNextStep" => "form_second_progress_report",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"second_progress_report" => array(
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 2", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_second_progress_report" => array(
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 2", "nextStep" => "แก้ไขไฟล์ที่ไม่ผ่านการอนุมติ", "linkNextStep" => "form_second_payment",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_second_progress_report" => array(
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 2", "nextStep" => "ส่งผลงานเพื่อปิดโครงการ", "linkNextStep" => "form_finalized",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"finalized" => array(
				"currentStep" => "ส่งผลงานเพื่อปิดโครงการ", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_finalized" => array(
				"currentStep" => "ส่งผลงานเพื่อปิดโครงการ", "nextStep" => "แก้ไขไฟล์ที่ไม่ผ่านการอนุมติ", "linkNextStep" => "form_finalized",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_finalized" => array(
				"currentStep" => "ส่งผลงานเพื่อปิดโครงการ", "nextStep" => "ปิดโครงการ", "linkNextStep" => "form_project_finished",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"request_extend" => array(
				"currentStep" => "ขอขยายเวลา", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_extend" => array(
				"currentStep" => "ขอขยายเวลา", "nextStep" => "แก้ไขไฟล์ที่ไม่ผ่านการอนุมติ", "linkNextStep" => "form_request_extend",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_extend" => array(
				"currentStep" => "ขอขยายเวลา", "nextStep" => "ส่งผลงานเพื่อปิดโครงการ", "linkNextStep" => "form_finalized",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"project_finished" => array(
				"currentStep" => "ปิดโครงการ", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_project_finished" => array(
				"currentStep" => "ปิดโครงการ", "nextStep" => "แก้ไขไฟล์ที่ไม่ผ่านการอนุมติ", "linkNextStep" => "form_project_finished",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_project_finished" => array(
				"currentStep" => "ปิดโครงการ", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "เสร็จสิ้น", "statusClass" => "success"
			)
		);

		$userId = Auth::user()->id;
		$funds = DB::table('applications')
		->join('funds', 'applications.fund', '=', 'funds.id')
		->select('applications.id', 'funds.name', 'applications.status','applications.created_at')
		->where('applications.owner', $userId)
		->get();

		for ($i=0; $i < count($funds); $i++) {
			$funds[$i]->currentStep = $fundObject[$funds[$i]->status]['currentStep'];
			$funds[$i]->nextStep = $fundObject[$funds[$i]->status]['nextStep'];
			$funds[$i]->linkNextStep = $fundObject[$funds[$i]->status]['linkNextStep'];
			$funds[$i]->statusTitle = $fundObject[$funds[$i]->status]['statusTitle'];
			$funds[$i]->statusClass = $fundObject[$funds[$i]->status]['statusClass'];
		}

		return view('funds.fund_request', [
			'funds' => $funds,
			'requestExtend' => array("step" => "ขอขยายเวลา", "link" => "form_request_extend")
		]);
	}

	public function applicationUserRequestChoose() {
		return view('admin.fund_user_request_choose', [
			'funds' => Fund::get()
		]);
	}

	public function applicationUserRequest(Request $request) {
		$statusObject = array(
			"applied" => array(
				"step" => "สมัครขอทุน", "appStatus" => "Pending", "approve" => "approved", "reject" => "rejected"
			),
			"rejected" => array(
				"step" => "สมัครขอทุน", "appStatus" => "Reject"
			),
			"approved" => array(
				"step" => "สมัครขอทุน", "appStatus" => "Approve"
			),

			"signed_agreement" => array(
				"step" => "ทำสัญญารับทุน", "appStatus" => "Pending", "approve" => "approved_agreement", "reject" => "rejected_agreement",
				"files" => array(1, 2,22)
			),
			"rejected_agreement" => array(
				"step" => "ทำสัญญารับทุน", "appStatus" => "Reject", "files" => array(1, 2,22)
			),
			"approved_agreement" => array(
				"step" => "ทำสัญญารับทุน", "appStatus" => "Approve"
			),

			"first_payment" => array(
				"step" => "เบิกเงินงวดที่ 1", "appStatus" => "Pending", "approve" => "approved_first_payment", "reject" => "rejected_first_payment",
				"files" => array(3, 4, 5, 6)
			),
			"rejected_first_payment" => array(
				"step" => "เบิกเงินงวดที่ 1", "appStatus" => "Reject", "files" => array(3, 4, 5, 6)
			),
			"approved_first_payment" => array(
				"step" => "เบิกเงินงวดที่ 1", "appStatus" => "Approve"
			),

			"second_payment" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 1", "appStatus" => "Pending", "approve" => "approved_second_payment", "reject" => "rejected_second_payment", "files" => array(7, 8, 9)
			),
			"rejected_second_payment" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 1", "appStatus" => "Reject", "files" => array(7, 8, 9)
			),
			"approved_second_payment" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 1", "appStatus" => "Approve"
			),

			"second_progress_report" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 2", "appStatus" => "Pending", "approve" => "approved_second_progress_report", "reject" => "rejected_second_progress_report", "files" => array(10, 11)
			),
			"rejected_second_progress_report" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 2", "appStatus" => "Reject", "files" => array(10, 11)
			),
			"approved_second_progress_report" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 2", "appStatus" => "Approve"
			),

			"finalized" => array(
				"step" => "ส่งผลงานเพื่อปิดโครงการ", "appStatus" => "Pending", "approve" => "approved_finalized", "reject" => "rejected_finalized",
				"files" => array(17, 18, 19, 20, 21,23,24)
			),
			"rejected_finalized" => array(
				"step" => "ส่งผลงานเพื่อปิดโครงการ", "appStatus" => "Reject", "files" => array(17, 18, 19, 20, 21,23,24)
			),
			"approved_finalized" => array(
				"step" => "ส่งผลงานเพื่อปิดโครงการ", "appStatus" => "Approve"
			),

			"request_extend" => array(
				"step" => "ขอขยายเวลา", "appStatus" => "Pending", "approve" => "approved_extend", "reject" => "rejected_extend",
				"files" => array(14, 15, 16)
			),
			"rejected_extend" => array(
				"step" => "ขอขยายเวลา", "appStatus" => "Reject", "files" => array(14, 15, 16)
			),
			"approved_extend" => array(
				"step" => "ขอขยายเวลา", "appStatus" => "Approve"
			),

			

			"project_finished" => array(
				"step" => "ปิดโครงการ", "appStatus" => "Pending", "approve" => "approved_project_finished", "reject" => "rejected_project_finished",
				"files" => array(17, 18, 19, 20, 21,23,24)
			),
			"rejected_project_finished" => array(
				"step" => "ปิดโครงการ", "appStatus" => "Reject", "files" => array(17, 18, 19, 20, 21,23,24)
			),
			"approved_project_finished" => array(
				"step" => "ปิดโครงการ", "appStatus" => "Approve"
			)
		);

		$id = $request->get('id', null);

		$applications = DB::table('applications')
		->join('funds', 'applications.fund', '=', 'funds.id')
		->join('users', 'applications.owner', '=', 'users.id')
		->where('fund', $id)
		->select('applications.id', 'applications.status', 'funds.name as fundName', 'users.name as userName')
		->get();
		
		$fund = Fund::find($id);
		if (!$fund) {
			return redirect()->route('fund_user_request_choose');
		}

		for ($i=0; $i < count($applications); $i++) {
			$applications[$i]->step = $statusObject[$applications[$i]->status]['step'];
			$applications[$i]->appStatus = $statusObject[$applications[$i]->status]['appStatus'];
			$applications[$i]->documents = null;

			if ($applications[$i]->appStatus != 'Approve' ) {
				if ($applications[$i]->appStatus == 'Pending') {
					$applications[$i]->approve = $statusObject[$applications[$i]->status]['approve'];
					$applications[$i]->reject = $statusObject[$applications[$i]->status]['reject'];
				}

				if ($applications[$i]->status != 'applied' && $applications[$i]->status != 'rejected') {
					$documents = [];
					$files = $statusObject[$applications[$i]->status]['files'];
					for ($j=0; $j < count($files); $j++) {
						$upload = Upload::where('filetype', $files[$j])
						->where('application_id', $applications[$i]->id)
						->first();

						$filetype = Filetype::find($upload->filetype);
						array_push(
							$documents, array(
								"file_name" => $filetype->name,
								"file_path" => $upload->file_path,
								"file_status" => $upload->status,
								"upload_id" => $upload->id
							)
						);
					}
					$applications[$i]->documents = $documents;
				}
			}
		}

		return view('admin.fund_user_request', [
			'applications' => $applications,
			'fundName' => $fund->name
		]);
	}

	public function applicationSearchUserRequest(Request $request) {
		$statusObject = array(
			"applied" => array(
				"step" => "สมัครขอทุน", "appStatus" => "Pending", "approve" => "approved", "reject" => "rejected"
			),
			"rejected" => array(
				"step" => "สมัครขอทุน", "appStatus" => "Reject"
			),
			"approved" => array(
				"step" => "สมัครขอทุน", "appStatus" => "Approve"
			),

			"signed_agreement" => array(
				"step" => "ทำสัญญารับทุน", "appStatus" => "Pending", "approve" => "approved_agreement", "reject" => "rejected_agreement",
				"files" => array(1, 2)
			),
			"rejected_agreement" => array(
				"step" => "ทำสัญญารับทุน", "appStatus" => "Reject", "files" => array(1, 2)
			),
			"approved_agreement" => array(
				"step" => "ทำสัญญารับทุน", "appStatus" => "Approve"
			),

			"first_payment" => array(
				"step" => "เบิกเงินงวดที่ 1", "appStatus" => "Pending", "approve" => "approved_first_payment", "reject" => "rejected_first_payment",
				"files" => array(3, 4, 5, 6)
			),
			"rejected_first_payment" => array(
				"step" => "เบิกเงินงวดที่ 1", "appStatus" => "Reject", "files" => array(3, 4, 5, 6)
			),
			"approved_first_payment" => array(
				"step" => "เบิกเงินงวดที่ 1", "appStatus" => "Approve"
			),

			"second_payment" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 1", "appStatus" => "Pending", "approve" => "approved_second_payment", "reject" => "rejected_second_payment", "files" => array(7, 8, 9)
			),
			"rejected_second_payment" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 1", "appStatus" => "Reject", "files" => array(7, 8, 9)
			),
			"approved_second_payment" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 1", "appStatus" => "Approve"
			),

			"second_progress_report" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 2", "appStatus" => "Pending", "approve" => "approved_second_progress_report", "reject" => "rejected_second_progress_report", "files" => array(10, 11)
			),
			"rejected_second_progress_report" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 2", "appStatus" => "Reject", "files" => array(10, 11)
			),
			"approved_second_progress_report" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 2", "appStatus" => "Approve"
			),

			"finalized" => array(
				"step" => "ส่งผลงานครั้งสุดท้าย", "appStatus" => "Pending", "approve" => "approved_finalized", "reject" => "rejected_finalized",
				"files" => array(12, 13)
			),
			"rejected_finalized" => array(
				"step" => "ส่งผลงานครั้งสุดท้าย", "appStatus" => "Reject", "files" => array(12, 13)
			),
			"approved_finalized" => array(
				"step" => "ส่งผลงานครั้งสุดท้าย", "appStatus" => "Approve"
			),

			"request_extend" => array(
				"step" => "ขอขยายเวลา", "appStatus" => "Pending", "approve" => "approved_extend", "reject" => "rejected_extend",
				"files" => array(14, 15, 16)
			),
			"rejected_extend" => array(
				"step" => "ขอขยายเวลา", "appStatus" => "Reject", "files" => array(14, 15, 16)
			),
			"approved_extend" => array(
				"step" => "ขอขยายเวลา", "appStatus" => "Approve"
			),

			"project_finished" => array(
				"step" => "ปิดโครงการ", "appStatus" => "Pending", "approve" => "approved_project_finished", "reject" => "rejected_project_finished",
				"files" => array(17, 18, 19, 20, 21)
			),
			"rejected_project_finished" => array(
				"step" => "ปิดโครงการ", "appStatus" => "Reject", "files" => array(17, 18, 19, 20, 21)
			),
			"approved_project_finished" => array(
				"step" => "ปิดโครงการ", "appStatus" => "Approve"
			)
		);

		$searchObject = array(
			"สมัครขอทุน" => array("applied", "rejected", "approved"),
			"ทำสัญญารับทุน" => array("signed_agreement", "rejected_agreement", "approved_agreement"),
			"เบิกเงินงวดที่ 1" => array("first_payment", "rejected_first_payment", "approved_first_payment"),
			"รายงานความก้าวหน้าครั้งที่ 1" => array("second_payment", "rejected_second_payment", "approved_second_payment"),
			"รายงานความก้าวหน้าครั้งที่ 2" => array("second_progress_report", "rejected_second_progress_report", "approved_second_progress_report"),
			"ส่งผลงานครั้งสุดท้าย" => array("finalized", "rejected_finalized", "approved_finalized"),
			"ขอขยายเวลา" => array("request_extend", "rejected_extend", "approved_extend"),
			"ปิดโครงการ" => array("project_finished", "rejected_project_finished", "approved_project_finished")
		);

		$query = trim($request->get('query', null));

		$result = null;
		foreach ($searchObject as $k => $v) {
		    if ($k == $query) {
		    	$result = $v;
		    	break;
		    }
		}
		$per_page=20;
		if ($result) {
			$applications = DB::table('applications')
			->join('funds', 'applications.fund', '=', 'funds.id')
			->join('users', 'applications.owner', '=', 'users.id')
			->where('funds.name', 'like', '%' . $query . '%')
			->orWhere('users.name', 'like', '%' . $query . '%')
			->orWhere('applications.status', $result[0])
			->orWhere('applications.status', $result[1])
			->orWhere('applications.status', $result[2])
			->select('applications.id', 'applications.status', 'funds.name as fundName', 'users.name as userName','applications.created_at')
			->orderBy('applications.id', 'desc')
			->paginate($per_page);
		}
		else {
			$applications = DB::table('applications')
			->join('funds', 'applications.fund', '=', 'funds.id')
			->join('users', 'applications.owner', '=', 'users.id')
			->where('funds.name', 'like', '%' . $query . '%')
			->orWhere('users.name', 'like', '%' . $query . '%')
			->select('applications.id', 'applications.status', 'funds.name as fundName', 'users.name as userName','applications.created_at')
			->orderBy('applications.id', 'desc')
			->paginate($per_page);
		}

		

		for ($i=0; $i < count($applications); $i++) {
			$applications[$i]->step = $statusObject[$applications[$i]->status]['step'];
			$applications[$i]->appStatus = $statusObject[$applications[$i]->status]['appStatus'];
			$applications[$i]->documents = null;

			if ($applications[$i]->appStatus != 'Approve' ) {
				if ($applications[$i]->appStatus == 'Pending') {
					$applications[$i]->approve = $statusObject[$applications[$i]->status]['approve'];
					$applications[$i]->reject = $statusObject[$applications[$i]->status]['reject'];
				}

				if ($applications[$i]->status != 'applied' && $applications[$i]->status != 'rejected') {
					$documents = [];
					$files = $statusObject[$applications[$i]->status]['files'];
					for ($j=0; $j < count($files); $j++) {
						$upload = Upload::where('filetype', $files[$j])
						->where('application_id', $applications[$i]->id)
						->first();

						$filetype = Filetype::find($upload->filetype);
						array_push(
							$documents, array(
								"file_name" => $filetype->name,
								"file_path" => $upload->file_path,
								"file_status" => $upload->status,
								"upload_id" => $upload->id
							)
						);
					}
					$applications[$i]->documents = $documents;
				}
			}
		}

		return view('admin.fund_search_user_request', [
			'applications' => $applications,
			'query' => $query
		]);
	}

	public function applicationUpdate($appId, $status) {
		$application = Application::find($appId);
		$application->status = $status;
		$application->save();

		return redirect()->route('fund_user_request', array('id' => $application->fund));
	}

	public function applicationDelete($id) {
		$fund = Application::find($id);
		echo $fund->delete();

	}

	public function allUploads($id){
		$allUploadFile = Upload::where('application_id', $id)->get();
		return view('admin.fund_application_upload', [
			'uploads' => $allUploadFile
		]);
	}

	public function fileUploadUpdate($uploadId, $status) {
		$statusObject = array(
			"applied" => array(
				"approve" => "approved", "reject" => "rejected"
			),
			"signed_agreement" => array(
				"approve" => "approved_agreement", "reject" => "rejected_agreement"
			),
			"first_payment" => array(
				"approve" => "approved_first_payment", "reject" => "rejected_first_payment"
			),
			"second_payment" => array(
				"approve" => "approved_second_payment", "reject" => "rejected_second_payment"
			),
			"second_progress_report" => array(
				"approve" => "approved_second_progress_report", "reject" => "rejected_second_progress_report"
			),
			"request_extend" => array(
				"approve" => "approved_extend", "reject" => "rejected_extend"
			),
			"finalized" => array(
				"approve" => "approved_finalized", "reject" => "rejected_finalized"
			),
			"project_finished" => array(
				"approve" => "approved_project_finished", "reject" => "rejected_project_finished"
			)
		);

		$upload = Upload::find($uploadId);
		$upload->status = $status;
		$upload->save();

		$application = Application::find($upload->application_id);
		$appStatus = $application->status;

		$rejectList = ["rejected", "rejected_agreement", "rejected_first_payment", "rejected_second_payment", "rejected_second_progress_report", "rejected_extend", "rejected_finalized", "rejected_project_finished"];

		if (in_array($appStatus, $rejectList)) {
			// Application status = reject force return
			return redirect()->route('fund_user_request', array('id' => $application->fund));
		}

		$checkReject = Upload::where('application_id', $upload->application_id)
		->where('status', 'Reject')
		->count();

		if ($checkReject != 0) {
			$this->applicationUpdate($upload->application_id, $statusObject[$appStatus]['reject']);
		}
		else {
			$allUploadFile = Upload::where('application_id', $upload->application_id)->count();

			$allUploadApprove = Upload::where('application_id', $upload->application_id)
			->where('status', 'Approve')
			->count();

			if ($allUploadFile == $allUploadApprove) {
				$this->applicationUpdate($upload->application_id, $statusObject[$appStatus]['approve']);
			}
		}

		return redirect()->route('fund_user_request', array('id' => $application->fund));
	}
}

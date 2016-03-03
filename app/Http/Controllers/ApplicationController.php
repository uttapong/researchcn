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
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 2", "nextStep" => "ส่งผลงานครั้งสุดท้าย", "linkNextStep" => "form_finalized",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"request_extend" => array(
				"currentStep" => "ขอขยายเวลาส่งงาน", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_extend" => array(
				"currentStep" => "ขอขยายเวลาส่งงาน", "nextStep" => "แก้ไขไฟล์ที่ไม่ผ่านการอนุมติ", "linkNextStep" => "form_finalized",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_extend" => array(
				"currentStep" => "ขอขยายเวลาส่งงาน", "nextStep" => "ส่งผลงานครั้งสุดท้าย", "linkNextStep" => "form_project_finished",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"finalized" => array(
				"currentStep" => "ส่งผลงานครั้งสุดท้าย", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_finalized" => array(
				"currentStep" => "ส่งผลงานครั้งสุดท้าย", "nextStep" => "แก้ไขไฟล์ที่ไม่ผ่านการอนุมติ", "linkNextStep" => "form_finalized",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_finalized" => array(
				"currentStep" => "ส่งผลงานครั้งสุดท้าย", "nextStep" => "ปิดโครงการ", "linkNextStep" => "form_project_finished",
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
		->select('applications.id', 'funds.name', 'applications.status')
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
			'funds' => $funds
		]);
	}

	public function applicationUserRequest() {
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
				"step" => "ทำสัญญารับทุน", "appStatus" => "Reject"
			),
			"approved_agreement" => array(
				"step" => "ทำสัญญารับทุน", "appStatus" => "Approve"
			),

			"first_payment" => array(
				"step" => "เบิกเงินงวดที่ 1", "appStatus" => "Pending", "approve" => "approved_first_payment", "reject" => "rejected_first_payment",
				"files" => array(3, 4, 5, 6)
			),
			"rejected_first_payment" => array(
				"step" => "เบิกเงินงวดที่ 1", "appStatus" => "Reject"
			),
			"approved_first_payment" => array(
				"step" => "เบิกเงินงวดที่ 1", "appStatus" => "Approve"
			),

			"second_payment" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 1", "appStatus" => "Pending", "approve" => "approved_second_payment", "reject" => "rejected_second_payment", "files" => array(7, 8, 9)
			),
			"rejected_second_payment" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 1", "appStatus" => "Reject"
			),
			"approved_second_payment" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 1", "appStatus" => "Approve"
			),

			"second_progress_report" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 2", "appStatus" => "Pending", "approve" => "approved_second_progress_report", "reject" => "rejected_second_progress_report", "files" => array(10, 11)
			),
			"rejected_second_progress_report" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 2", "appStatus" => "Reject"
			),
			"approved_second_progress_report" => array(
				"step" => "รายงานความก้าวหน้าครั้งที่ 2", "appStatus" => "Approve"
			),

			"request_extend" => array(
				"step" => "ขอขยายเวลาส่งงาน", "appStatus" => "Pending", "approve" => "approved_extend", "reject" => "rejected_extend"
			),
			"rejected_extend" => array(
				"step" => "ขอขยายเวลาส่งงาน", "appStatus" => "Reject"
			),
			"approved_extend" => array(
				"step" => "ขอขยายเวลาส่งงาน", "appStatus" => "Approve"
			),

			"finalized" => array(
				"step" => "ส่งผลงานครั้งสุดท้าย", "appStatus" => "Pending", "approve" => "approved_finalized", "reject" => "rejected_finalized", "files" => array(12, 13)
			),
			"rejected_finalized" => array(
				"step" => "ส่งผลงานครั้งสุดท้าย", "appStatus" => "Reject"
			),
			"approved_finalized" => array(
				"step" => "ส่งผลงานครั้งสุดท้าย", "appStatus" => "Approve"
			),

			"project_finished" => array(
				"step" => "ปิดโครงการ", "appStatus" => "Pending", "approve" => "approved_project_finished", "reject" => "rejected_project_finished",
				"files" => array(17, 18, 19, 20, 21)
			),
			"rejected_project_finished" => array(
				"step" => "ปิดโครงการ", "appStatus" => "Reject"
			),
			"approved_project_finished" => array(
				"step" => "ปิดโครงการ", "appStatus" => "Approve"
			)
		);

		$applications = DB::table('applications')
		->join('funds', 'applications.fund', '=', 'funds.id')
		->join('users', 'applications.owner', '=', 'users.id')
		->select('applications.id', 'applications.status', 'funds.name as fundName', 'users.name as userName')
		->get();

		for ($i=0; $i < count($applications); $i++) {
			$applications[$i]->step = $statusObject[$applications[$i]->status]['step'];
			$applications[$i]->appStatus = $statusObject[$applications[$i]->status]['appStatus'];
			$applications[$i]->documents = null;

			if ($applications[$i]->appStatus == 'Pending') {
				$applications[$i]->approve = $statusObject[$applications[$i]->status]['approve'];
				$applications[$i]->reject = $statusObject[$applications[$i]->status]['reject'];

				if ($applications[$i]->status != 'applied') {
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
			'applications' => $applications
		]);
	}

	public function applicationUpdate($appId, $status) {
		$application = Application::find($appId);
		$application->status = $status;
		$application->save();

		return redirect()->route('fund_user_request');
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

		$app_status = Application::find($upload->application_id)->status;
		print($app_status);

		$checkReject = Upload::where('application_id', $upload->application_id)
		->where('status', 'Reject')
		->count();

		if ($checkReject != 0) {
			$this->applicationUpdate($upload->application_id, $statusObject[$app_status]['reject']);
		}
		else {
			$allUploadFile = Upload::where('application_id', $upload->application_id)->count();

			$allUploadApprove = Upload::where('application_id', $upload->application_id)
			->where('status', 'Approve')
			->count();

			if ($allUploadFile == $allUploadApprove) {
				$this->applicationUpdate($upload->application_id, $statusObject[$app_status]['approve']);
			}
		}

		return redirect()->route('fund_user_request');
	}
}

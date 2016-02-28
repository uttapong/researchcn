<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Fund as Fund;
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

		return redirect('list_fund');
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
				"currentStep" => "ทำสัญญารับทุน", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Reject", "statusClass" => "danger"),
			"approved_agreement" => array(
				"currentStep" => "ทำสัญญารับทุน", "nextStep" => "เบิกเงินงวดที่ 1", "linkNextStep" => "",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"first_payment" => array(
				"currentStep" => "เบิกเงินงวดที่ 1", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_first_payment" => array(
				"currentStep" => "เบิกเงินงวดที่ 1", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_first_payment" => array(
				"currentStep" => "เบิกเงินงวดที่ 1", "nextStep" => "รายงานความก้าวหน้าครั้งที่ 1", "linkNextStep" => "",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"second_payment" => array(
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 1", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_second_payment" => array(
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 1", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_second_payment" => array(
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 1", "nextStep" => "รายงานความก้าวหน้าครั้งที่ 2", "linkNextStep" => "",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"2ndprogressreport" => array(
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 2", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_2ndprogressreport" => array(
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 2", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_2ndprogressreport" => array(
				"currentStep" => "รายงานความก้าวหน้าครั้งที่ 2", "nextStep" => "ขอขยายเวลาส่งงาน", "linkNextStep" => "",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"request_extend" => array(
				"currentStep" => "ขอขยายเวลาส่งงาน", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_extend" => array(
				"currentStep" => "ขอขยายเวลาส่งงาน", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_extend" => array(
				"currentStep" => "ขอขยายเวลาส่งงาน", "nextStep" => "ส่งผลงานครั้งสุดท้าบ", "linkNextStep" => "",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"finalized" => array(
				"currentStep" => "ส่งผลงานครั้งสุดท้าบ", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Pending", "statusClass" => "info"
			),
			"rejected_finalized" => array(
				"currentStep" => "ส่งผลงานครั้งสุดท้าบ", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Reject", "statusClass" => "danger"
			),
			"approved_finalized" => array(
				"currentStep" => "ส่งผลงานครั้งสุดท้าบ", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "Approve", "statusClass" => "success"
			),

			"project_finished" => array(
				"currentStep" => "ปิดโครงการ", "nextStep" => "", "linkNextStep" => "",
				"statusTitle" => "เสร็จสิ้น", "statusClass" => "success"
			)
		);

		$userId = Auth::user()->id;
		$funds = DB::table('applications')
		->join('funds', 'applications.fund', '=', 'funds.id')
		->select('funds.id', 'funds.name', 'applications.status')
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
}
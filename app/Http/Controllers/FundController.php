<?php

namespace App\Http\Controllers;

use App\Fund as Fund;
use App\Application as Application;
use Illuminate\Http\Request;

class FundController extends Controller {
	public function listFund() {
		// $userId = Auth::user();
		$userId = 1;
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

		return view('list_fund', [
			'funds' => $funds
		]);
	}

	public function fundAgo() {
		return view('fund_ago', [
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
			$fund->apply_start = date_format(date_create($fund->apply_start), "d-m-Y");
			$fund->apply_end = date_format(date_create($fund->apply_end), "d-m-Y");
			$fund->upload_start = date_format(date_create($fund->upload_start), "d-m-Y");
			$fund->upload_end = date_format(date_create($fund->upload_end), "d-m-Y");
			$fund->contract_end = date_format(date_create($fund->contract_end), "d-m-Y");
		}

		return view('admin.fund_form', [
			'fund' => $fund
		]);
	}

	public function fundInsertUpdate(Request $request) {
		$id = $request->input('id', 0);
		$name = $request->input('name');
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
		}
		else {
			// Update old record
			$fund = Fund::find($id);
		}

		$fund->name = $name;
		$fund->description = $description;
		$fund->apply_start = date_format(date_create($apply_start), "Y-m-d");
		$fund->apply_end = date_format(date_create($apply_end), "Y-m-d");
		$fund->upload_start = date_format(date_create($upload_start), "Y-m-d");
		$fund->upload_end = date_format(date_create($upload_end), "Y-m-d");
		$fund->contract_end = date_format(date_create($contract_end), "Y-m-d");

		if ($request->hasFile('contract_file')) {
			if ($fund->contract_file) {
				// Remove old file from directory
				unlink($fund->contract_file);
			}

			// Copy new file to directory
			$hash = md5(microtime());
			$fileName = $hash . '.' . $contract_file->getClientOriginalExtension();
			$contract_file->move('file/', $fileName);
			$fund->contract_file = 'file/' . $fileName;
		}

		// $userId = Auth::user();
		$fund->creator = 1;

		$fund->save();

		return redirect('fund_manage');
	}

	public function fundDelete($id) {
		$fund = Fund::find($id);
		$fund->delete();

		return redirect('fund_manage');
	}
}
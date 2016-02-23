<?php

namespace App\Http\Controllers;

use App\Application as Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller {
	public function registerFund($fundId) {
		$application = new Application;
		$application->fund = $fundId;
		$application->status = 'applied';
		// $userId = Auth::user();
		$application->owner = 1;

		$application->save();

		return redirect('list_fund');
	}
}
<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceFeeCategory;
use App\Models\ServiceFeeAmount;

class ServiceFeeAmountController extends Controller
{
    //
    public function ServiceFeeAmountView() {
        $data['allData'] = ServiceFeeAmount::all();
        return view('backend.setup.view_servicefeeamount', $data);
    }
}

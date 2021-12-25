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

    public function ServiceFeeAmountAdd() {
        $data['service_category'] = ServiceFeeCategory::all();
        $data['service'] = Service::all();
        return view('backend.setup.add_servicefeeamount', $data);
    }

    public function ServiceFeeAmountStore(Request $request) {
        $validatedData = $request->validate([
            'service_category_id' => 'required',
            'service_id' => 'required',
            'service_amount' => 'required',
            'quantity' => 'required'
        ]);

        $data = new ServiceFeeAmount();
        $data->service_category_id = $request->service_category_id;
        $data->service_id = $request->service_id;
        $data->service_amount = $request->service_amount;
        $data->quantity = $request->quantity;
        $data->save();

        $notification = array(
            'message' => 'Service Fee Amount Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('servicesfeeamount.view')->with($notification);

        
    }
}

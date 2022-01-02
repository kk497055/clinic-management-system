<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceFeeCategory;
use App\Models\ServiceFeeAmount;
use Auth;

class ServiceFeeAmountController extends Controller
{
    //
    public function ServiceFeeAmountView() {
        //$data['allData'] = ServiceFeeAmount::all();
        $data['allData'] = ServiceFeeAmount::select('service_category_id')->groupBy('service_category_id')->get();
        return view('backend.setup.view_servicefeeamount', $data);
    }

    public function ServiceFeeAmountAdd() {
        $data['service_category'] = ServiceFeeCategory::all();
        $data['service'] = Service::all();
        return view('backend.setup.add_servicefeeamount', $data);
    }

    public function ServiceFeeAmountStore(Request $request) {

        $countrecords = count($request->service_amount);

        if ($countrecords != NULL) {
            for($i=0;$i<$countrecords;$i++){
                $data = new ServiceFeeAmount();
                $data->service_category_id = $request->service_category_id;
                $data->service_id = $request->service_id[$i];
                $data->service_amount = $request->service_amount[$i];
                $data->quantity = $request->quantity[$i];
                $data->save();
            }
        }

        $notification = array(
            'message' => 'Service Fee Amount Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('servicesfeeamount.view')->with($notification);

        
    }

    public function ServiceFeeAmountEdit($service_category_id) {
        $data['editData'] = ServiceFeeAmount::where('service_category_id', $service_category_id)->orderBy('service_category_id', 'asc')->get();
        $data['service_category'] = ServiceFeeCategory::all();
        $data['service'] = Service::all();
        return view('backend.setup.edit_servicefeeamount', $data);

    }

    public function ServiceFeeAmountUpdate(Request $request, $service_category_id) {
        if ($request->service_id == NULL) {
            $notification = array(
                'message' => 'No Services to Update',
                'alert-type' => 'error'
            );

            return redirect()->route('servicesfeeamount.view', $service_category_id)->with($notification);
        } else {

            $countrecords = count($request->service_amount);
            ServiceFeeAmount::where('service_category_id', $service_category_id)->delete();
        
            for($i=0;$i<$countrecords;$i++){
                $data = new ServiceFeeAmount();
                $data->service_category_id = $request->service_category_id;
                $data->service_id = $request->service_id[$i];
                $data->service_amount = $request->service_amount[$i];
                $data->quantity = $request->quantity[$i];
                $data->save();
        
        }

        $notification = array(
            'message' => 'Service Fee Amount(s) Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('servicesfeeamount.view')->with($notification);

        }
    }

    public function ServiceFeeAmountDetail($service_category_id) {
        $data['detailData'] = ServiceFeeAmount::where('service_category_id', $service_category_id)->orderBy('service_category_id', 'asc')->get();
        return view('backend.setup.detail_servicefeeamount', $data);
    }
}

<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceFeeCategory;
use App\Models\Service;
use App\Models\ServiceFeeAmount;

class ServiceFeeCategoryController extends Controller
{
    //
    public function ServiceFeeCategoryView() {
        $data['allData'] = ServiceFeeCategory::all();
        return view('backend.setup.view_servicefeecategory', $data);
    }

    public function ServiceFeeCategoryAdd() {
        return view('backend.setup.add_servicefeecategory');
    }

    public function ServiceFeeCategoryStore(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:services,name',

        ]);

        $Data = new ServiceFeeCategory();
        $Data->name = $request->name;

        $Data->save();
        $notification = array(
            'message' => 'Service Fee Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('servicesfeecategory.view')->with($notification);
    }

    public function ServiceFeeCategoryEdit($id) {
        $editData = ServiceFeeCategory::find($id);
        return view('backend.setup.edit_servicefeecategory', compact('editData'));
    }

    public function ServiceFeeCategoryDelete($id) {
        $data = ServiceFeeCategory::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Service Category Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('servicesfeecategory.view')->with($notification); 
    }

    public function ServiceFeeCategoryUpdate(Request $request, $id) {
        $editData = ServiceFeeCategory::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:service_fee_categories,name,'.$editData->id

        ]);

        $editData->name = $request->name;
        $editData->save();

        $notification = array(
            'message' => 'Service Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('servicesfeecategory.view')->with($notification);
    }
}

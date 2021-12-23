<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    //
    public function ServiceView() {
        $data['allData'] = Service::all();
        return view('backend.setup.view_service', $data);
    }

    public function ServiceAdd() {
        return view('backend.setup.add_service');
    }

    public function ServiceStore(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:services,name',

        ]);

        $data = new Service();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Service Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('services.view')->with($notification);

    }

    Public function ServiceEdit($id) {
        $editData = Service::find($id);
        return view('backend.setup.edit_service', compact('editData'));
    }

    public function ServiceUpdate(Request $request, $id) {
        $data = Service::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:services,name,'.$data->id

        ]);

        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Service Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('services.view')->with($notification);
    }

    public function ServiceDelete($id) {
        $data = Service::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Service Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('services.view')->with($notification);
    }
}

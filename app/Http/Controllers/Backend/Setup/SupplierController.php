<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\city;
use Auth;

class SupplierController extends Controller
{
    //
    public function SupplierView() {
        $data['allData'] = Supplier::join('Cities', 'cities.city_id', '=', 'city')->get();
        //$data['city_info'] = City::all();
        return view('backend.setup.view_supplier', $data);
    }

    public function SupplierAdd() {
        $data['city_details'] = city::all();
        return view('backend.setup.add_supplier', $data);
    }

    public function SupplierStore(Request $request) {
        $validatedData = ([
            'name' => 'required|unique,suppliers,name',
            'city' => 'required',
            'address' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);

        $data = New Supplier();
        $data->name = $request->name;
        $data->city = $request->city;
        $data->address = $request->address;
        $data->contact_name = $request->contact_person;
        $data->mobile = $request->mobile;
        $data->email = $request->email; 
        $data->tax_number = $request->tax_number;
        $data->save();

        $notification = array(
            'message' => 'Supplier successfully added to the system',
            'alert-type' => 'success'
        );

        return redirect()->route('suppliers.view')->with($notification);
    }
}

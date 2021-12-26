<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    //

    public function InventoryView() {
        $data['allData'] = Inventory::all();
        return view('backend.setup.view_inventory', $data);
    }

    public function InventoryAdd() {
        $data = Inventory::all();
        return view('backend.setup.add_inventory', compact($data));
    }

    public function InventoryEdit($id) {
        $editData = Inventory::find($id);
        return view('backend.setup.edit_inventory', compact('editData'));
    }

    public function InventoryUpdate(Request $request, $id) {
        $data = Inventory::find($id);
        $validatedData = ([
            'item' => 'required|unique,inventories,item',
            'description' => 'required',
            'packing' => 'required',
            'unit_price' => 'required'
        ]);

        $data->item = $request->name;
        $data->description = $request->description;
        $data->packing = $request->packing;
        $data->opening_balance = $request->opening_balance;
        $data->unit_price = $request->unit_price;
        $data->save();

        $notification = array(
            'message' => 'Inventory Item updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('inventory.view')->with($notification); 
    }

    public function InventoryStore(Request $request) {
        $validatedData = ([
            'item_name' => 'required',
            'description' => 'required',
            'packing' => 'required',
            'unit_price' => 'required',
        ]);

        $data = New Inventory();
        $data->item = $request->name;
        $data->description = $request->description;
        $data->packing = $request->packing;
        $data->opening_balance = $request->opening_balance;
        $data->unit_price = $request->unit_price;
        $data->save();

        $notification = array(
            'message' => 'Inventory Item added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('inventory.view')->with($notification);
    }
}

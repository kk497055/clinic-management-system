<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Inventory;
use App\Models\Supplier;
use App\Models\User;
use App\Models\InventoryPurchase;
use App\Models\InventoryPurchaseDetail;


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

    public function InventoryPurchase() {
        $data['suppliers'] = Supplier::all();
        $data['inventories'] = Inventory::all();
        return view('backend.setup.purchase_inventory', $data);
    }

    public function InventoryPurchaseStore(Request $request) {
        $data = New InventoryPurchase();
        $data->supplier_id = $request->supplier_id;
        $data->created_by = Auth::user()->id;
        $data->save();


        $count_items = count($request->quantity);

        if ($count_items != NULL) {
            for($i=0;$i<$count_items;$i++) {
                $inv = New InventoryPurchaseDetail();
                    $inv->purchase_id = $data->id ;
                    $inv->inventory_id = $request->inventory_id[$i];
                    $inv->quantity = $request->quantity[$i];
                    //$inv->gross_line_total = $request->gross_line_total[$i];
                    $inv->save();

            }
        }

        $notification = array(
            'message' => 'Purchase Order Successfully Created',
            'alert-type' => 'success'
        );

        return redirect()->route('inventory.view')->with($notification);


    }
}

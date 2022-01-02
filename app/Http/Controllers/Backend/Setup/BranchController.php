<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\City;
use Auth;

class BranchController extends Controller
{
    //
    public function BranchView() {

        $data['allData'] = Branch::join('cities', 'cities.city_id', '=', 'branches.city_id')->get();
        return view('backend.setup.view_branch', $data);

    }

    public function BranchAdd() {
        $data['cities'] = City::all();
        return view('backend.setup.add_branch', $data);
    }

    public function BranchStore(Request $request) {
        $validatedData = ([
            'branch_name' => 'required|unique, branch_name, branches',
            'address' => 'required'
        ]);

        $branch = New Branch();
        $branch->branch_name = $request->branch_name;
        $branch->address = $request->branch_address;
        $branch->city_id = $request->city_id;
        $branch->created_by = Auth::user()->id;
        
        $branch->save();
        $notification = array(
            'message' => 'Branch Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('branch.view')->with($notification);
    }

    public function BranchUpdate(Request $request, $id) {
        $branch = Branch::find($id);

        $branch->branch_name = $request->branch_name;
        $branch->address = $request->branch_address;
        $branch->city_id = $request->city_id;
        $branch->created_by = Auth::user()->id;
        
        $branch->save();
        $notification = array(
            'message' => 'Branch Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('branch.view')->with($notification);

    }

    public function BranchEdit($branch_id) {
        $data['editData'] = Branch::find($branch_id);
        $data['cities'] = City::all();
        return view('backend.setup.edit_branch', $data);
    }
}

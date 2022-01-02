<?php

namespace App\Http\Controllers\Backend\Operations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\User;
use App\Models\EmployeeTransfer;
Use Auth;

class EmployeeTransferController extends Controller
{
    //


    public function EmployeeTransferStart() {
        $data['branches'] = Branch::all();
        $data['employees'] = User::where('role', '=', 'Employee')->get();
        
        return view('backend.setup.transfer_employees', $data);
    }

    public function EmployeeTransferStore(Request $request) {
            
            $createdby = Auth::user()->id;
            $transfer = New EmployeeTransfer();
            $transfer->branch_id = $request->branch_id;
            $transfer->employee_id = $request->employee_id;
            $transfer->transfer_date = date('Y-m-d', strtotime($request->transfer_date));
            $transfer->created_by = $createdby;
    
            $transfer->save();
    
            $notification = array(
                'message' => 'Employee Transferred to New Branch Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->route('employees.transfer')->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
Use App\Models\EmployeeSalaryLog;
Use DB;
Use PDF;
Use Auth;

class EmployeeController extends Controller
{
    //
    public function EmployeeView() {
        $data['allData'] = User::where('role', 'Employee')->get();
        return view('backend.setup.view_employees', $data);
    }

    public function EmployeeAdd(){
        return view('backend.setup.add_employees');
    }

    public function EmployeeEdit($id){
        $data['editData'] = User::find($id);
        return view('backend.setup.edit_employees', $data);
    }

    public function EmployeeUpdate(Request $request, $id) {
        $data = User::find($id);
        
        $validatedData =([
            'name' => 'required',
            'email' => 'required',
            'join_date' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required'

        ]);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->mother_name = $request->mother_name;
        $data->email = $request->email;
        $data->role = $request->userrole;
        $data->id_no = $data->id_no;
        $data->usertype = $request->usertype;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->dob = $request->dob;
        $data->code = $data->code;
        $data->password = bcrypt($data->code);
        $data->join_date = date('Y-m-d', strtotime($request->join_date));
        $data->dob = date('Y-m-d', strtotime($request->dob));
        $data->gender = $request->gender;

        $data->save();

        $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employees.view')->with($notification);

    }

    public function EmployeeStore(Request $request){
        $validatedData = ([
            'name' => 'required',
            'id_no' => 'required',
            'email' => 'email',
            'code' => 'required',
            'join_date' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ]);

        $data = New User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mother_name = $request->mother_name;
        $data->email = $request->email;
        $data->role = $request->userrole;


        $employee = User::where('usertype', 'Employee')->orderBy('id', 'desc')->first();

        if ($employee == NULL) {
            
            $first_id = 0;
            $emp_id_no = $first_id+1;
            if ($emp_id_no < 10) {
                $id_no = '000'.$emp_id_no;
            }elseif ($emp_id_no < 100) {
                $id_no='00'.$emp_id_no;
            }elseif ($emp_id_no < 1000) {
                $id_no='0'.$emp_id_no;
            }

        } else {
            $employee = User::where('usertype', 'Employee')->orderBy('id', 'desc')->first()->id;
            $emp_id_no = $employee;
            if ($emp_id_no < 10) {
                $id_no = '000'.$emp_id_no;
            }elseif ($emp_id_no < 100) {
                $id_no='00'.$emp_id_no;
            }elseif ($emp_id_no < 1000) {
                $id_no='0'.$emp_id_no;
            }
        }

        $data->id_no = $id_no;
        $data->usertype = $request->usertype;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->dob = $request->dob;
        $code = rand(0000, 9999);
        $data->code = $code;
        $password = bcrypt($code);
        $data->join_date = date('Y-m-d', strtotime($request->join_date));
        $data->dob = date('Y-m-d', strtotime($request->dob));
        $data->gender = $request->gender;

        $data->save();

        $notification = array(
            'message' => 'Employee Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('employees.view')->with($notification);

        
    }
}

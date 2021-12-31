<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
Use DB;
Use PDF;
Use Auth;

class EmployeeSalaryController extends Controller
{
    //

    public function EmployeeSalaryView() {
        $data['employees'] = EmployeeSalaryLog::join('Users', 'users.id', '=', 'employee_id')->orderBy('employee_salary_logs.id', 'desc')->take(1)->get();
        return view('backend.setup.view_salary', $data);
    }

    public function EmployeeSalaryincrementDetail($id) {
        $data['employees'] = EmployeeSalaryLog::join('Users', 'users.id', '=', 'employee_id')->where('users.id', $id)->orderBy('employee_salary_logs.id', 'desc')->get();
        return view('backend.setup.detail_salary', $data);
    }

    public function EmployeeSalaryAdd() {
        $data['employees'] = User::where('role', 'Employee')->get();
        return view('backend.setup.add_salary', $data);
    }

    public function EmployeeSalaryStore(Request $request) {
        $data = User::find($request->employee);

        if($data->salary > 0) {
            $notification = array(
                'message' => 'Employee is already on the Payroll. Please increment existing Salary',
                'alert-type' => 'error'
            );
            return redirect()->route('salary.view')->with($notification);
        }


        $data->salary = $request->salary;
        $data->save();

        $salarylog = New EmployeeSalaryLog();
        $salarylog->employee_id = $data->id;
        $salarylog->previous_salary = $request->salary;
        $salarylog->increment_salary = 0;
        $salarylog->effective_date = date('Y-m-d', strtotime($request->effective_date));
        $salarylog->save();

        $notification = array(
            'message' => 'Salary is added for the Employee',
            'alert-type' => 'success'
        );
        return redirect()->route('salary.view')->with($notification);
        
    }

    public function EmployeeSalaryIncrement($id) {
        $data['allData'] = User::find($id);
        return view('backend.setup.increment_salary', $data);
    }

    public function EmployeeSalaryIncrementStore(Request $request, $id){
        
        $user = User::find($id);
               
        $data = New EmployeeSalaryLog();
        $data->employee_id = $user->id;
        $data->increment_salary = $request->increment_salary;
        $data->previous_salary = $user->salary;
        $data->effective_date = date('Y-m-d', strtotime($request->effective_date));
        $data->save();

        $user->salary = $user->salary+$request->increment_salary;
        
        $user->save();

        $notification = array(
            'message' => 'Increment has been added successfully',
            'alert-type' => 'success' 
        );

        return redirect()->route('salary.view')->with($notification);

        

    }
}

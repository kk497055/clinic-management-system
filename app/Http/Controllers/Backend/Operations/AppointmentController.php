<?php

namespace App\Http\Controllers\Backend\Operations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\ServiceFeeCategory;
use App\Models\User;
use App\Models\Appointment;
use Auth;
use DB;
use PDF;

class AppointmentController extends Controller
{
    //
    public function AppointmentAdd() {
        $data['branches'] = Branch::all();
        $data['doctors'] = User::where('role', 'Doctor')->get();
        $data['service_categories'] = ServiceFeeCategory::all();

        return view('backend.operations.add_appointment', $data);

    }

    public function AppointmentView() {
        $data['allData'] = Appointment::with(['branch_info'])->with(['priority_info'])->get();
        return view('backend.operations.view_appointment', $data);
    }

    public function AppointmentStore(Request $request) {
        $validatedData = ([
            'patient_name' => 'required',
            'mobile' => 'required',
            'branch_id' => 'required',
            'service_category' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required'
        ]);

        $appointment = New Appointment();

    }
}

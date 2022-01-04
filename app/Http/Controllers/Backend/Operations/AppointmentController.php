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

    public function AppointmentEdit($id) {
        $data['branches'] = Branch::all();
        $data['doctors'] = User::where('role', 'Doctor')->get();
        $data['service_categories'] = ServiceFeeCategory::all();
        $data['editData'] = Appointment::find($id);
        return view('backend.operations.edit_appointment', $data);

    }

    public function AppointmentUpdate(Request $request, $id) {
        $validatedData = ([
            'patient_name' => 'required',
            'mobile' => 'required',
            'branch_id' => 'required',
            'service_category' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required'
        ]);

        $appointment = Appointment::find($id);
        $appointment->patient_name = $request->name;
        $appointment->mobile = $request->mobile;
        $appointment->branch_id = $request->branch_id;
        $appointment->service_category = $request->service_category;
        $appointment->appointment_start = date('Y-m-d H:i:s', strtotime($request->appointment_date));
        $appointment->appointment_duration = 30;
        $appointment->created_by = Auth::user()->id;
        $appointment->status ="Pending";
        $appointment->notes = $request->notes;

        if($appointment->save()) {

        $notification = array(
            "message" => "Appointment Updated successfully",
            'alert-type' => "success",
        );
    } else {
        $notification = array(
            "message" => "Appointment Update Cancelled",
            'alert-type' => "warning",
        );

    }

        return redirect()->route('appointments.view')->with($notification);
    }

    public function AppointmentCalendar() {
        
        return view('backend.operations.calendar_appointment');
    }

    public function AppointmentCalendarDisplay() {
        $data = Appointment::with(['branch_info'])->with(['priority_info'])->orderBy('start', 'asc')->get(['title','start', 'end', 'notes']);
        return response()->json($data, status:200);
    }

    public function AppointmentView() {
        $data['allData'] = Appointment::with(['branch_info'])->with(['priority_info'])->orderBy('start', 'asc')->get();
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
        $appointment->title = $request->name;
        $appointment->mobile = $request->mobile;
        $appointment->branch_id = $request->branch_id;
        $appointment->service_category = $request->service_category;
        $appointment->start = date('Y-m-d H:i:s', strtotime($request->appointment_date));
        $appointment->appointment_duration = 30;
        $appointment->end = date('Y-m-d H:i',strtotime('+30 minutes',strtotime($request->appointment_date)));
        $appointment->created_by = Auth::user()->id;
        $appointment->status ="Pending";
        $appointment->notes = $request->notes;

        $appointment->save();

        $notification = array(
            "message" => "Appointment created successfully",
            'alert-type' => "success",
        );

        return redirect()->route('appointments.view')->with($notification);
    }
}

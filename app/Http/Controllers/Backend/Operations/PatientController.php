<?php

namespace App\Http\Controllers\Backend\Operations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\PatientDetail;
use App\Models\User;
use App\Models\City;
use DB;
use PDF;

class PatientController extends Controller
{
    //
    public function PatientView() {
        $data['allData'] = User::join('patient_details', 'patient_details.user_id','=','id')->get();
        return view('backend.operations.view_patient', $data);
       
    }

    public function PatientEdit($id) {
        
        $data['editData'] = PatientDetail::with(['patient'])->where('user_id', $id)->first();
        $data['cities'] = City::all();
        return view('backend.operations.edit_patient', $data);
       //dd($data['editData']->ToArray());
       
    }

    public function PatientAdd() {
        $data['cities'] = City::all();
        return view('backend.operations.add_patient', $data);
    }

    public function PatientStore(Request $request) {
        $validatedData = ([
            'name' => 'required',
            'id_no' => 'required',
            'email' => 'email',
            'code' => 'required',
            'dob' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ]);

        $data = New User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mother_name = $request->mother_name;
        $data->father_name = $request->father_name;
        $data->email = $request->email;
        $data->role = $request->userrole;


        $employee = User::where('role', 'Patient')->orderBy('id', 'desc')->first();

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
            $employee = User::where('role', 'Patient')->orderBy('id', 'desc')->first()->id;
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
        $data->dob = date('Y-m-d', strtotime($request->dob));
        $data->gender = $request->gender;
        $data->city_id = $request->city_id;

        $data->save();

        $patient = New PatientDetail();
        $patient->user_id = $data->id;
        $patient->mr_no = "MR-".$data->id.$data->id_no; // to be changed
        $patient->major_complaint = $request->major_complaint;
        $patient->pain_discomfort = $request->pain;
        $patient->tooth_filling = $request->tooth_filling;
        $patient->bleeding_gums = $request->bleeding_gums;
        $patient->implant_replacement = $request->implant_replacement;
        $patient->aesthetic_concern = $request->aesthetic_concern;
        $patient->routine_checkup = $request->routine_checkup;
        $patient->previous_medication = $request->previous_medication;
        $patient->smoking = $request->smoking;
        $patient->blood_pressure = $request->blood_pressure;
        $patient->diabetes = $request->diabetes;
        $patient->asthma = $request->asthma;
        $patient->hepatitis = $request->hepatitis;
        $patient->hiv = $request->hiv;
        $patient->epilepsy = $request->epilepsy;
        $patient->heart_trouble = $request->heart_trouble;
        $patient->auto_immune_disease = $request->auto_immune_disease;
        $patient->pregnancy = $request->pregnancy;
        $patient->other = $request->other;
        $patient->medication_allergies = $request->medication_allergies;
        $patient->created_by = Auth::user()->id;

        $patient->save();

        $notification = array(
            'message' => 'Patient Record Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('patients.view')->with($notification);


    }

    public function PatientUpdate(Request $request, $user_id) {
        $validatedData = ([
            'name' => 'required',
            'id_no' => 'required',
            'email' => 'email',
            'code' => 'required',
            'dob' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ]);

        $data = User::where('id', $user_id)->first();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mother_name = $request->mother_name;
        $data->father_name = $request->father_name;
        $data->email = $request->email;
        $data->role = $request->userrole;

        
        $data->usertype = $request->usertype;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->dob = $request->dob;
        $data->dob = date('Y-m-d', strtotime($request->dob));
        $data->gender = $request->gender;
        $data->city_id = $request->city_id;

        $data->save();

        $patient = PatientDetail::where('user_id', $user_id)->first();

        $patient->user_id = $data->id;
        $patient->mr_no = "MR-".$data->id.$data->id_no; // to be changed after discussion - 1/2/22
        $patient->major_complaint = $request->major_complaint;
        $patient->pain_discomfort = $request->pain;
        $patient->tooth_filling = $request->tooth_filling;
        $patient->bleeding_gums = $request->bleeding_gums;
        $patient->implant_replacement = $request->implant_replacement;
        $patient->aesthetic_concern = $request->aesthetic_concern;
        $patient->routine_checkup = $request->routine_checkup;
        $patient->previous_medication = $request->previous_medication;
        $patient->smoking = $request->smoking;
        $patient->blood_pressure = $request->blood_pressure;
        $patient->diabetes = $request->diabetes;
        $patient->asthma = $request->asthma;
        $patient->hepatitis = $request->hepatitis;
        $patient->hiv = $request->hiv;
        $patient->epilepsy = $request->epilepsy;
        $patient->heart_trouble = $request->heart_trouble;
        $patient->auto_immune_disease = $request->auto_immune_disease;
        $patient->pregnancy = $request->pregnancy;
        $patient->other = $request->other;
        $patient->medication_allergies = $request->medication_allergies;
        $patient->created_by = Auth::user()->id;

        $patient->save();

        $notification = array(
            'message' => 'Patient Record Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('patients.view')->with($notification);


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

use App\Models\Doctor;

class AdminController extends Controller
{
    public function addView() {
        return view('admin.add_doctor');
    }

    public function upload(Request $request) {
        $doctor = new doctor;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        
        $request->image->move('doctorimage', $imagename);
        
        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->number = $request->number;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Added Sucessfully');
    }

    public function showappointment() {
        $data = Appointment::all();
        return view('admin.showappointment',compact('data'));
    }
    public function approved($id) {
        $data = Appointment::find($id);
        $data->status = 'approved';
        $data->save();
        return redirect()->back();
    }
    public function canceled($id) {
        $data = Appointment::find($id);
        $data->status = 'Canceled';
        $data->save();
        return redirect()->back();
    }
}

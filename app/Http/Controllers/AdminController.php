<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

use App\Models\Doctor;
use PhpParser\Comment\Doc;

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
        $doctor->phone = $request->number;
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
    
    public function showdoctor() {
        $data = Doctor::all();
        return view('admin.showdoctor', compact('data'));
    }

    public function deletedoctor($id) {
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatedoctor($id) {
        $data = Doctor::find($id);
        return view('admin.update_doctor', compact('data'));
    }

    public function editdoctor(Request $request,$id) {
        $doctor = Doctor::find($id);
        
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            
            $request->image->move('doctorimage', $imagename);
            
            $doctor->image = $imagename;
        }

        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Details Updated Sucessfully');
    }
}

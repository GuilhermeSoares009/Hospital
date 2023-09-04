<?php

namespace App\Http\Controllers;

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
        $doctor->name = $request->number;
        $doctor->name = $request->room;
        $doctor->name = $request->speciality;

        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Added Sucessfully');
    }
}

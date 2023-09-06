<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{

    public function index() {
        if(Auth::id()) {
            return redirect('home');
        }else{
            $doctor = Doctor::all();
            return view('user.home', compact('doctor'));
        }
    }

    public function redirect() {
        $doctor = Doctor::all();
        if(Auth::id()) {
            if(Auth::user()->usertype == '0'){
                return view('user.home', compact('doctor'));
            }else{
                return view('admin.home');
            }

        }else{
            return redirect()->back();
        }
    }

    public function appointment(Request $request) {
        $data = new Appointment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In progress';

        if(Auth::id())
        {
            $data->user_id = Auth::user()->id;
        }

        $data->save();
        return redirect()->back()->with('message', 'Appointment Request Sucessful. 
        We will contact with you soon.');
    }
}

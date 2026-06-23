<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();

        $hospitals = Hospital::all();

        $appointments = Appointment::where('user_id',auth()->id())
                        ->latest()
                        ->get();

        return view('appointments',compact(
            'doctors',
            'hospitals',
            'appointments'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([

            'doctor_id'=>'required',

            'hospital_id'=>'required',

            'appointment_date'=>'required',

            'appointment_time'=>'required',

            'reason'=>'required'

        ]);

        Appointment::create([

            'user_id'=>auth()->id(),

            'doctor_id'=>$request->doctor_id,

            'hospital_id'=>$request->hospital_id,

            'appointment_date'=>$request->appointment_date,

            'appointment_time'=>$request->appointment_time,

            'reason'=>$request->reason,

            'status'=>'Pending'

        ]);

        return redirect()->back()
                ->with('success','Appointment Booked Successfully');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return back()
            ->with('success','Appointment Cancelled');
    }

public function getDoctors($hospitalId)
{
    $doctors = Doctor::where('hospital_id', $hospitalId)
                ->select('id', 'name')
                ->get();

    return response()->json($doctors);
}
}
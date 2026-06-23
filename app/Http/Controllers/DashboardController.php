<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Alert;
use App\Models\Hospital;
use App\Models\HealthLog;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $appointmentsCount = Appointment::where('user_id',$user->id)->count();

        $alertsCount = Alert::count();

        $hospitalCount = Hospital::count();

        $recentActivities = HealthLog::latest()
            ->where('user_id',$user->id)
            ->take(5)
            ->get();

        $upcomingAppointments = Appointment::where('user_id',$user->id)
            ->whereDate('appointment_date','>=',today())
            ->orderBy('appointment_date')
            ->take(5)
            ->get();

        $healthScore = 90;

        return view('dashboard',compact(
            'appointmentsCount',
            'alertsCount',
            'hospitalCount',
            'recentActivities',
            'upcomingAppointments',
            'healthScore'
        ));
    }
}
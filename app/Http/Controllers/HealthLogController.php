<?php

namespace App\Http\Controllers;

use App\Models\HealthLog;

class HealthLogController extends Controller
{
    public function index()
    {
        $logs = HealthLog::where('user_id',auth()->id())
                ->latest()
                ->paginate(10);

        return view('health_logs',compact('logs'));
    }
}
<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::where('user_id', auth()->id())
                                 ->latest('date')
                                 ->get();

        return Inertia::render('Employee/Attendance/Index', compact('attendances'));
    }

    public function create()
    {
        return Inertia::render('Employee/Attendance/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'clock_in' => 'nullable|date_format:H:i',
            'clock_out' => 'nullable|date_format:H:i',
            'notes' => 'nullable|string',
            'status' => 'required|in:present,late,absent,half_day,holiday',
        ]);

        $data['user_id'] = auth()->id();

        // Calculate hours_worked if both times are provided
        if ($data['clock_in'] && $data['clock_out']) {
            $start = strtotime($data['clock_in']);
            $end = strtotime($data['clock_out']);
            $data['hours_worked'] = round(($end - $start) / 3600, 2);
        }

        Attendance::create($data);

        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully.');
    }
}
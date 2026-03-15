<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::where('user_id', auth()->id())->latest()->get();
        return Inertia::render('Employee/Leaves/Index', compact('leaves'));
    }

    public function create()
    {
        return Inertia::render('Employee/Leaves/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:annual,sick,maternity,paternity,unpaid',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'nullable|string',
        ]);

        $data['user_id'] = auth()->id();
        $data['days'] = (strtotime($data['end_date']) - strtotime($data['start_date'])) / 86400 + 1;
        $data['status'] = 'pending';

        Leave::create($data);

        return redirect()->route('leaves.index')->with('success', 'Leave request submitted successfully.');
    }
}
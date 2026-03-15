<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('assignee_id', auth()->id())
                     ->orderBy('due_date', 'asc')
                     ->get();

        return Inertia::render('Employee/Tasks/Index', compact('tasks'));
    }

    public function show(Task $task)
    {
        if ($task->assignee_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        return Inertia::render('Employee/Tasks/Show', compact('task'));
    }
}
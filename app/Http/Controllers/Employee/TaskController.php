<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $employeeId = auth()->id();

        // Only tasks assigned to this employee
        $tasks = Task::where('assignee_id', $employeeId)
                     ->orderBy('due_date', 'asc')
                     ->get();

        return Inertia::render('Employee/Tasks/Index', [
            'tasks' => $tasks
        ]);
    }

    public function show(Task $task)
    {
        if ($task->assignee_id !== auth()->id()) {
            abort(403);
        }

        return Inertia::render('Employee/Tasks/Show', [
            'task' => $task
        ]);
    }
}
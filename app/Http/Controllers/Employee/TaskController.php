<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // Only tasks assigned to the logged-in employee
        $tasks = Task::with('project')
                     ->where('assigned_to', auth()->id())
                     ->get();

        return Inertia::render('Employee/Tasks/Index', [
            'tasks' => $tasks
        ]);
    }

    public function show(Task $task)
    {
        $this->authorizeTask($task);

        return Inertia::render('Employee/Tasks/Show', [
            'task' => $task->load('project', 'assignedTo')
        ]);
    }

    public function create()
    {
        // Optional: Employees may not create tasks
        abort(403);
    }

    public function edit(Task $task)
    {
        $this->authorizeTask($task);

        return Inertia::render('Employee/Tasks/Edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $this->authorizeTask($task);

        $request->validate([
            'status' => 'required|in:pending,in_progress,completed',
            'description' => 'nullable|string',
        ]);

        $task->update($request->only(['status', 'description']));

        return redirect()->route('employee.tasks.index');
    }

    protected function authorizeTask(Task $task)
    {
        if ($task->assigned_to !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
    }
}
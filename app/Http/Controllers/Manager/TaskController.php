<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['project','employee'])->latest()->get();

        return Inertia::render('Manager/Tasks/Index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        $projects = Project::select('id','name')->get();

        $employees = User::role('Employee')
                        ->select('id','name')
                        ->get();

        return Inertia::render('Manager/Tasks/Create', [
            'projects' => $projects,
            'employees' => $employees
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'employee_id' => 'required|exists:users,id',
            'name' => 'required|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date',
            'status' => 'required|in:todo,in_progress,done',
            'priority' => 'required|in:low,medium,high',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        $task->load(['project','employee']);

        return Inertia::render('Manager/Tasks/Show', [
            'task' => $task
        ]);
    }

    public function edit(Task $task)
    {
        $projects = Project::select('id','name')->get();

        $employees = User::role('Employee')
                        ->select('id','name')
                        ->get();

        return Inertia::render('Manager/Tasks/Edit', [
            'task' => $task,
            'projects' => $projects,
            'employees' => $employees
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'employee_id' => 'required|exists:users,id',
            'name' => 'required|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date',
            'status' => 'required|in:todo,in_progress,done',
            'priority' => 'required|in:low,medium,high',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
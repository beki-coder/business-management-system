<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of tasks
     */
    public function index()
    {
        $tasks = Task::with('project')->latest()->get();

        return Inertia::render('Manager/Tasks/Index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new task
     */
    public function create()
    {
        $projects = Project::all();

        return Inertia::render('Manager/Tasks/Create', [
            'projects' => $projects
        ]);
    }

    /**
     * Store a newly created task
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,completed'
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified task
     */
    public function show(Task $task)
    {
        $task->load('project');

        return Inertia::render('Manager/Tasks/Show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified task
     */
    public function edit(Task $task)
    {
        $projects = Project::all();

        return Inertia::render('Manager/Tasks/Edit', [
            'task' => $task,
            'projects' => $projects
        ]);
    }

    /**
     * Update the specified task
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,completed'
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified task
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
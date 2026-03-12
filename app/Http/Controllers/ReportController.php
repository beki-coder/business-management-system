<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Show the reports for Admin and Manager.
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        // Admin sees all projects, tasks, users
        if ($user->hasRole('Admin')) {
            $projects = Project::with('tasks', 'company')->get();
            $tasks = Task::with('project', 'assignedTo')->get();
            $users = User::with('roles', 'company')->get();
        }
        // Manager sees only their company data
        elseif ($user->hasRole('Manager')) {
            $projects = Project::with('tasks')
                ->where('company_id', $user->company_id)
                ->get();
            $tasks = Task::with('project', 'assignedTo')
                ->whereHas('project', function ($q) use ($user) {
                    $q->where('company_id', $user->company_id);
                })->get();
            $users = User::where('company_id', $user->company_id)->get();
        } else {
            abort(403);
        }

        return Inertia::render('Reports/Index', [
            'projects' => $projects,
            'tasks' => $tasks,
            'users' => $users,
        ]);
    }
}
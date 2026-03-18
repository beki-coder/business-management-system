<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        // ADMIN REPORT
        if ($user->hasRole('Admin')) {

            $projects = Project::with(['tasks', 'company'])->get();

            $tasks = Task::with(['project', 'employee'])->get();

            $users = User::with(['roles', 'company'])->get();

        }

        // MANAGER REPORT
        elseif ($user->hasRole('Manager')) {

            $projects = Project::with(['tasks'])
                ->where('company_id', $user->company_id)
                ->get();

            $tasks = Task::with(['project', 'employee'])
                ->whereHas('project', function ($q) use ($user) {
                    $q->where('company_id', $user->company_id);
                })
                ->get();

            $users = User::with(['roles','company'])
                ->where('company_id', $user->company_id)
                ->get();
        }

        else {
            abort(403);
        }

        return Inertia::render('Reports/Index', [
            'projects' => $projects,
            'tasks' => $tasks,
            'users' => $users,
        ]);
    }
}
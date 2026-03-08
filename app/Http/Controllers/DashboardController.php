<?php
namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Task;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller {
    public function __construct(protected ProjectService $projectService) {}

    public function index(Request $request) {
        $user = $request->user();
        
        $stats = [
            'total_projects' => Project::when(!$user->isAdmin(), fn($q) => 
                $q->where('company_id', $user->company_id))->count(),
            'overdue_tasks' => Task::where('due_date', '<', now())
                ->where('status', '!=', 'done')->count(),
            'recent_projects' => $this->projectService->listForUser($user, [], 5),
        ];

        return Inertia::render('Dashboard/Index', compact('stats'));
    }
}

<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Company;
use App\Models\User;
use App\Services\ProjectService;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller {
    public function __construct(protected ProjectService $service) {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $projects = $this->service->listForUser($request->user(), $request->only(['status']));
        return Inertia::render('Projects/Index', ['projects' => $projects]);
    }

    public function create() {
        return Inertia::render('Projects/Create', [
            'companies' => Company::select('id', 'name')->get(),
            'managers' => User::whereIn('role', ['admin', 'manager'])->select('id', 'name')->get(),
        ]);
    }

    public function store(StoreProjectRequest $request) {
        $project = $this->service->create($request->validated());
        return redirect()->route('projects.show', $project)->with('success', 'Project created.');
    }

    public function show(Project $project) {
        $project->load(['company', 'manager', 'tasks.assignee']);
        return Inertia::render('Projects/Show', compact('project'));
    }

    public function edit(Project $project) {
        return Inertia::render('Projects/Edit', [
            'project' => $project->load(['company', 'manager']),
            'companies' => Company::select('id', 'name')->get(),
            'managers' => User::whereIn('role', ['admin', 'manager'])->select('id', 'name')->get(),
        ]);
    }

    public function update(UpdateProjectRequest $request, Project $project) {
        $this->service->update($project, $request->validated());
        return redirect()->route('projects.show', $project)->with('success', 'Project updated.');
    }

    public function destroy(Project $project) {
        $this->service->delete($project);
        return redirect()->route('projects.index')->with('success', 'Project deleted.');
    }
}

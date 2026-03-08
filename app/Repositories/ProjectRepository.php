<?php
namespace App\Repositories;
use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class ProjectRepository {
    public function paginateForUser($user, array $filters = [], int $perPage = 15): LengthAwarePaginator {
        $query = Project::with(['company', 'manager']);

        if (!$user->isAdmin()) {
            $query->where('company_id', $user->company_id);
        }

        if ($filters['status'] ?? false) {
            $query->where('status', $filters['status']);
        }

        return $query->latest()->paginate($perPage);
    }

    public function find($id) {
        return Project::with(['company', 'manager', 'tasks.assignee'])->findOrFail($id);
    }

    public function create(array $data): Project {
        return Project::create($data);
    }

    public function update(Project $project, array $data): Project {
        $project->update($data);
        return $project->fresh();
    }

    public function delete(Project $project): bool {
        return $project->delete();
    }
}

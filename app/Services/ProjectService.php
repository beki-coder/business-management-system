<?php
namespace App\Services;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\DB;

class ProjectService {
    public function __construct(protected ProjectRepository $repository) {}

    public function listForUser($user, array $filters = []): mixed {
        return $this->repository->paginateForUser($user, $filters);
    }

    public function create(array $data): Project {
        return DB::transaction(function () use ($data) {
            return $this->repository->create($data);
        });
    }

    public function update(Project $project, array $data): Project {
        return DB::transaction(function () use ($project, $data) {
            return $this->repository->update($project, $data);
        });
    }

    public function delete(Project $project): bool {
        return DB::transaction(function () use ($project) {
            return $this->repository->delete($project);
        });
    }
}

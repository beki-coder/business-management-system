<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;

class ProjectPolicy
{
    public function view(User $user, Project $project)
    {
        return $user->hasRole('Manager') || $user->hasRole('Admin');
    }

    public function create(User $user)
    {
        return $user->hasRole('Manager');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'project_id',
        'start_date',
        'due_date',
        'assignee_id',  // <- updated
        'status',
        'priority'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assignee_id'); // <- updated
    }
}
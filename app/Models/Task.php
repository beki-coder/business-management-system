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
        'employee_id',
        'status',
        'priority'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class,'employee_id');
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'project_id',
        'start_date',
        'due_date',
        'employee_id',
        'status'
    ];
    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Project::class);
    }
    public function assignedTo(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
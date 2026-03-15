<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'employee_id',
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'company_id',
        'department_id',
        'position_id',
        'salary',
        'hire_date',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'password' => 'hashed',
        'email_verified_at' => 'datetime',
        'hire_date' => 'date',
    ];

    // ------------------------
    // Relationships
    // ------------------------

    /**
     * Company of the user
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Department of the user
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Position of the user
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * Tasks assigned to the user
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'assignee_id');
    }

    /**
     * Attendance records of the user
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Leaves requested by the user
     */
    public function leaves()
    {
        return $this->hasMany(Leave::class, 'employee_id');
    }

    // ------------------------
    // Role-based scopes
    // ------------------------

    /**
     * Scope for Employees
     */
    public function scopeEmployees($query)
    {
        return $query->role('Employee');
    }

    /**
     * Scope for Managers
     */
    public function scopeManagers($query)
    {
        return $query->role('Manager');
    }

    /**
     * Scope for Admins
     */
    public function scopeAdmins($query)
    {
        return $query->role('Admin');
    }

    // ------------------------
    // Helper methods
    // ------------------------

    public function isEmployee(): bool
    {
        return $this->hasRole('Employee');
    }

    public function isManager(): bool
    {
        return $this->hasRole('Manager');
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('Admin');
    }
}
<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    protected $fillable = [
        'name', 'email', 'password', 'company_id'
    ];
     public function company()
    {        return $this->belongsTo(Company::class);
    }
    // Optional: helper for role-based filtering
    public function scopeManagers($query) {
        return $query->role('Manager');
    }

    public function scopeEmployees($query) {
        return $query->role('Employee');
    }
}
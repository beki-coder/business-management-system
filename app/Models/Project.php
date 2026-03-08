<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model {
    protected $fillable = [
        'company_id', 'manager_id', 'name', 'description', 'status',
        'start_date', 'end_date', 'budget'
    ];
    
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'budget' => 'decimal:2'
    ];

    public function company(): BelongsTo { return $this->belongsTo(Company::class); }
    public function manager(): BelongsTo { return $this->belongsTo(User::class, 'manager_id'); }
    public function tasks(): HasMany { return $this->hasMany(Task::class); }
}

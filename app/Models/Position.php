<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;  // ✅ ADD THIS LINE
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model {
    protected $fillable = ['title', 'min_salary', 'max_salary', 'description', 'level'];
    
    public function users() {  // ✅ Changed from employees()
        return $this->hasMany(User::class);
    }
}

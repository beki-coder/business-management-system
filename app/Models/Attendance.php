<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model {
    protected $fillable = ['user_id', 'date', 'clock_in', 'clock_out', 'hours_worked', 'status', 'notes'];
    
    protected $casts = [
        'date' => 'date',
        'clock_in' => 'datetime:H:i',
        'clock_out' => 'datetime:H:i',
        'hours_worked' => 'decimal:2'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}

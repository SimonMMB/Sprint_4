<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon; 

class UserSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'user_id',
        'estimated_date',
        'status',
        'status_exercise_1', 
        'status_exercise_2', 
        'status_exercise_3',
        'status_exercise_4', 
        'status_exercise_5', 
        'status_exercise_6',
        'comments'
    ];
    protected $dates = ['estimated_date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function trainingSessions(): HasMany
    {
        return $this->hasMany(TrainingSession::class);
    }
}

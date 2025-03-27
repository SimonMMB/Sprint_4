<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SessionExercise extends Model
{
    use HasFactory;

    protected $table = 'session_exercises';

    protected $fillable = [
        'user_session_id',
        'exercise_id',
        'lifted_weight',
        'status'
    ];

    public function userSession(): BelongsTo
    {
        return $this->belongsTo(UserSession::class);
    }

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }
}
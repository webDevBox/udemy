<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QestionAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_attempt_id', 'question_id', 'question_option_id'
    ];
}

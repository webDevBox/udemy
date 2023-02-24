<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $with = ['questionOptions'];

    protected $fillable = [
        'quiz_id', 'title', 'type'
    ];

    public function questionOptions()
    {
        return $this->hasMany(QuestionOptions::class, 'question_id', 'id');
    }

}

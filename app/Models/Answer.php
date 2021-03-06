<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable=['rating','question_id','user_id'];

    public function question()
    {
        return $this->belongsTo(Question::class,'question_id');
    }
}

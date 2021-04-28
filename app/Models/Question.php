<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'average'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function average()
    {
       $this->average = Answer::where('question_id','=', $this->id)->avg('rating');
       return $this->average;
    }
}

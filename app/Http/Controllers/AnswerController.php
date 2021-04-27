<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $current_user = auth()->user()->id;

        foreach($request->all() as $answer)
        {
            //Check if an Answer already exists. Update if yes, create new if not.
            if(Answer::where('user_id','=',$current_user)->where('question_id','=',$answer['question_id'])->exists())
            {
                $newAnswer = Answer::where('user_id','=',$current_user)
                    ->where('question_id','=',$answer['question_id'])
                    ->update(['rating'=>$answer['rating']]);
            }
            else {
                Answer::create([
                        'question_id' => $answer['question_id'],
                        'rating' => $answer['rating'],
                        'user_id' => $current_user,
                    ]
                );
            }
        }
    }

}

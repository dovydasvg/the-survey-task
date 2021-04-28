<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $current_user = auth()->user()->id;
        $redirect_url = '';

        foreach($request->all() as $answer)
        {
            //Each element has a next_page value
            $redirect_url = $answer['next_page'];
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

        return Inertia::location($redirect_url);


    }

    public function results()
    {
        $results = [];
        foreach(Answer::where('user_id','=', auth()->user()->id)->get() as $answer)
        {
            array_push($results,
            [
                'question' => $answer->question()->get()->first()->content,
                'user_rating' => $answer->rating,
                'average_rating' => $answer->question()->get()->first()->average()
            ]);
        }

        return Inertia::render('Results',
            [
                'results' => $results
            ]);
    }

}

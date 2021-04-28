<?php

namespace App\Http\Controllers;

use App\Models\Question;
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
            if(!$this->validateAnswer($answer)){
                return response('The answers were not valid, try again',422);
            }
            //Each element has a next_page value
            $redirect_url = $answer['next_page'];
            //Check if an Answer already exists. Update if yes, create new if not.
            if(Answer::where('user_id','=',$current_user)->where('question_id','=',$answer['question_id'])->exists())
            {
                Answer::where('user_id','=',$current_user)
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
                'average_rating' => $answer->question()->get()->first()->average(),
                'total_answers' => Answer::where('question_id','=', $answer->question()->first()->id)->get()->count()
            ]);
        }

        $this->answered_all_questions();

        return Inertia::render('Results',
            [
                'results' => $results
            ]);
    }

    //Check if user answered all the questions. Update finished_survey property, if yes.
    public function answered_all_questions(): void
    {
        if(Answer::where('user_id','=', auth()->user()->id)->get()->count() >= Question::all()->count())
        {
            $user = auth()->user();
            $user->finished_survey = true;
            $user->save();
        }
    }

    public function validateAnswer($answer)
    {
        if(is_int($answer['rating']))
        {
            if ($answer['rating'] > 0 && $answer['rating'] < 6){
                return true;
            }
        }
        return false;
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users',[
            'users' => User::where('finished_survey',false)->get(['email']),
        ]);
    }
}

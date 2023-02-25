<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\ApiResponse;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuizAttempt;
use App\Models\QestionAttempt;
use App\Models\QuestionOptions;

class AttemptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required|exists:users,id',
            'quiz_id' => 'required|exists:quizzes,id',
            'questions.*' => 'required|Array',
            'questions.*.question_id'  => 'required|exists:questions,id',
            'questions.*.option_id'  => 'required|exists:question_options,id'
        ]);

        $message = $validator->errors()->first();
        if ($validator->fails()) {
            return response()->json(ApiResponse::validation($message));
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

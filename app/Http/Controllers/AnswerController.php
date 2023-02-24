<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\ApiResponse;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuestionOptions;

class AnswerController extends Controller
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
        //
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
        try {
            $answer = QuestionOptions::find($id);
            $question = Question::find($answer->question_id);
            $answer->whereId($id)->delete();
            $data = Quiz::find($question->quiz_id);
            return response()->json(ApiResponse::success($data));
        } catch (\Throwable $th) {
            return response()->json(ApiResponse::error($key='NOT_FOUND'));
        }
    }
}

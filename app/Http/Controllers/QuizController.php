<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\ApiResponse;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuestionOptions;

class QuizController extends Controller
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
            'title' => 'required|string',
            'description' => 'required',
            'status' => 'required',
            'questions.*' => 'required|Array',
            'questions.*.title'  => 'required|string',
            'questions.*.type'  => 'required',
            'questions.*.options.*' => 'required|array',
            'questions.*.options.*.answer' => 'required|string',
            'questions.*.options.*.status' => 'required',
        ]);

        $message = $validator->errors()->first();
        if ($validator->fails()) {
            return response()->json(ApiResponse::validation($message));
        }

        try {
            $quiz = Quiz::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status
            ]);
    
            foreach($request->questions as $questions)
            {
                $question = Question::create([
                    'quiz_id' => $quiz->id,
                    'title' => $questions['title'],
                    'type' => $questions['type']
                ]);
    
                foreach($questions['options'] as $option)
                {
                    QuestionOptions::create([
                       'question_id' => $question->id,
                       'option' => $option['answer'], 'status' => $option['status']
                    ]);
                }
    
            }
    
            $data = Quiz::find($quiz->id);
            return response()->json(ApiResponse::success($data));
        } catch (\Throwable $th) {
            $exception = $th->getMessage();
            return response()->json(ApiResponse::error($key = 'INVALID_PARAMETERS_CODE'));
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

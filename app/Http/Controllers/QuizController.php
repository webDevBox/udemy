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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string',
            'description' => 'required',
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
                'description' => $request->description
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
            return response()->json(ApiResponse::error($data));
        }

        
    }
}

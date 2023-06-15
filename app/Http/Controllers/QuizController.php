<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index()
    {
        $questions = Question::all();
        return view('quiz', compact('questions'));
    }

    public function submit(Request $request)
    {
        $answers = $request->input('answers');
        $score = 0;

        foreach ($answers as $questionId => $answer) {
            $question = Question::findOrFail($questionId);

            if ($answer === $question->correct_answer) {
                $score+=10;
            }
        }

        return redirect()->route('quiz.index')->with('score', $score);
    }
}
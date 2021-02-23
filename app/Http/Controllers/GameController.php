<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Questions;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

class GameController extends Controller
{
    // home
    public function index()
    {
        $questions = Questions::orderBy('id', 'ASC')->get();
        return view('home', compact('questions'));
    }

    // storing answer from user input
    public function submitAnswer(Request $request)
    {
        DB::beginTransaction();
        try{
            $answer = new Answer();
            $answer->question_id = $request->question_id;
            $answer->username = $request->username;
            $answer->value = $request->value;
            $answer->save();
            DB::commit();
            return response()->json($answer);
        }
        catch(Exception $e) {
            DB::rollback();
            return $e;
        }
    }
}

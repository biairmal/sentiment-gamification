<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\User;
use App\Models\Questions;
use App\Models\Scores;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

class GameController extends Controller
{

    public $maxLevel = 3;

    // home
    public function index()
    {
        $questions = Questions::orderBy('id', 'ASC')->get();
        $leaderboard = User::where('total_points', '>', '0')->orderBy('total_points', 'DESC')->get();
        return view('home', compact('questions', 'leaderboard'));
    }

    public function userStats($user)
    {
        $recentMatches = Scores::where('email', $user)->orderBy('created_at','DESC')->get();
        // isi nama filenya dalem view
        return view('profile', compact('recentMatches'));
    }

    public function getUserData(Request $request)
    {
        $userData = User::where('email',$request->email)->get();
        return response()->json($userData);
    }

    // storing answer from user input
    public function submitAnswer(Request $request)
    {
        DB::beginTransaction();
        try {
            $answer = new Answer();
            $answer->question_id = $request->question_id;
            $answer->email = $request->email;
            $answer->value = $request->value;
            $answer->save();
            DB::commit();
            return response()->json($answer);
        } catch (Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function submitAnsweredQuestions(Request $request)
    {
        $user = $request->email;
        $answeredQuestion = $request->answered_questions;

        try{
            User::where('email', $user)->update(['answered_questions' => $answeredQuestion]);
        } catch (Exception $e){
            return $e;
        }
    }

    // update user level based on total points
    public function updateUserLevel(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        $i = 0;
        $level = 0;
        $foundLevel = false;

        for ($i; $foundLevel == false; $i++) {
            $minScore = ($i) * 300;
            $maxScore = ($i + 1) * 300;
            if ($user->total_points >= $minScore && $user->total_points < $maxScore) {
                $foundLevel = true;
                $level = $i + 1;
            }
        }
        if ($level > $this->maxLevel) {
            $level = $this->maxLevel;
        }

        if ($this->maxLevel != $user->level) {
            User::where('email', $request->email)->update(['level' => $level]);
        }
        return response()->json($level);
    }

    // storing user game history
    public function submitScore(Request $request)
    {
        DB::beginTransaction();
        try {
            $score = new Scores();
            $score->email = $request->email;
            $score->score = $request->score;
            $score->total_answers = $request->total_answers;
            $score->save();
            DB::commit();

            $user = User::where('email', $request->email);
            $user->increment('total_points', $request->score);

            if($request->email)
            return response()->json($score);
        } catch (Exception $e) {
            DB::rollback();
            return $e;
        }
    }
}

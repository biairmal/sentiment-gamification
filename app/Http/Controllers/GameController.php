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

    // storing answer from user input
    public function submitAnswer(Request $request)
    {
        DB::beginTransaction();
        try {
            $answer = new Answer();
            $answer->question_id = $request->question_id;
            $answer->username = $request->username;
            $answer->value = $request->value;
            $answer->save();
            DB::commit();
            return response()->json($answer);
        } catch (Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    // update user level based on total points
    public function updateUserLevel($person)
    {
        $user = User::where('email', $person)->first();

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

        if ($this->maxLevel != $user->level && $level <= $this->maxLevel) {
            User::where('email', $person)->update(['level' => $level]);
        }
    }

    // storing user game history
    public function submitScore(Request $request)
    {
        DB::beginTransaction();
        try {
            $score = new Scores();
            $score->username = $request->username;
            $score->score = $request->score;
            $score->save();
            DB::commit();

            $user = User::where('email', $request->username);
            $user->increment('total_points', $request->score);

            if($request->username)
            $this->updateUserLevel($request->username);
            return response()->json($score);
        } catch (Exception $e) {
            DB::rollback();
            return $e;
        }
    }
}

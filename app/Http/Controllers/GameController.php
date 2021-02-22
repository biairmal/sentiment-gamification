<?php

namespace App\Http\Controllers;

use App\Models\DatabaseModel;
use App\Models\Answer;
use App\Models\Questions;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

class GameController extends Controller
{

    public function index()
    {
        $questions = Questions::orderBy('id', 'ASC')->get();
        return view('home', compact('questions'));
    }

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

    // public function __construct()
    // {
    //     $this->DatabaseModel = new DatabaseModel();
    // }

    // public function index()
    // {
    //     $data = [
    //         'questions' => $this->DatabaseModel->getQuestions(),
    //     ];
    //     return view('home', ['data' => $data]);
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'question_id' => 'required',
    //         'value' => 'required',
    //         'username' => 'required',
    //     ]);

    //     DatabaseModel::create($request->all());
    //     return json_encode(array("statusCode" => 200));
    // }
}

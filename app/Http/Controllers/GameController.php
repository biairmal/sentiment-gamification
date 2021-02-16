<?php

namespace App\Http\Controllers;

use App\Models\DatabaseModel;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function __construct()
    {
        $this->DatabaseModel = new DatabaseModel();
    }
    public function index()
    {
        $data = [
            'questions' => $this->DatabaseModel->getQuestions(),
        ];
        return view('home', ['data'=>$data]);
    }
}

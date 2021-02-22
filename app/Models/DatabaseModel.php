<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseModel extends Model
{
    protected $tableQuestion = 'table_questions';
    protected $fillable = [
        'question_id', 'value', 'username'
    ];

    public function getQuestions()
    {
        return DB::table('table_questions')->get();
    }

    public function storeAnswers($data)
    {
        return DB::table('table_answers')->insertGetId($data);
    }

    
}

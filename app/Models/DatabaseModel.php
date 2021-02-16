<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseModel extends Model
{
    public function getQuestions()
    {
        return DB::table('table_questions')->get();
    }
}

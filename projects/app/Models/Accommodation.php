<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    public $table = "accommodations";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		"question",
        "answer",
        'type',
'page',
          "ordering",
        "question_ger",
        "answer_ger",

    ];

    public static $rules = [
       
    ];

}

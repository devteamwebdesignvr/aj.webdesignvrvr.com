<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyStayWithUs extends Model
{
    public $table = "why_stay_with_us";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'title',
		'image',
      'property_id',
        'description','page'
       

    ];

    public static $rules = [
        // create rules
        'title'=>"required",
        'image'=>"required"

    ];
    public static $updaterules = [
        // create rules
        'title'=>"required",
        'image'=>"required"

    ];

    // OurClient 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionGallery extends Model
{
    public $table = "production_gallery";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'title',
		'image',
        'type',
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

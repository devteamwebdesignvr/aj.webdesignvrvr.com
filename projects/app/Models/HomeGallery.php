<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeGallery extends Model
{
    public $table = "home_galleries";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [	
    	"image",
    	'type',
    	'thumbnail',
    	'status',
        'ordering',
    ];
}

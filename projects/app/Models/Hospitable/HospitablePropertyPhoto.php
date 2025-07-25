<?php

namespace App\Models\Hospitable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitablePropertyPhoto extends Model
{
    use HasFactory;

    public $fillable=[
        "url" ,
      "thumbnail_url" ,
      "caption" ,
      "order" ,
      "last_updated_at" ,
        "property_id",
    ];
}

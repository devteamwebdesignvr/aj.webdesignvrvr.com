<?php

namespace App\Models\Hospitable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitablePropertyDate extends Model
{
    use HasFactory;

    public $fillable=[

        "date" ,
        "day" ,
        "min_stay" ,
        "closed_for_checkin" ,
        "closed_for_checkout" ,
        "status_object" ,
          "status_reason" ,
          "status_available" ,
        
        "price_object" ,
          "price_amount" ,
          "price_currency",
          "price_formatted",

          "property_id"
        
    ];
}

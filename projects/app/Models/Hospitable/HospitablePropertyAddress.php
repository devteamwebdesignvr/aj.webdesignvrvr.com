<?php

namespace App\Models\Hospitable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitablePropertyAddress extends Model
{
    use HasFactory;

    public $fillable=[
        "street",
        "city",
        "state",
        "postcode",
        "country",
        "country_name",
        "coordinates",
        "display",
        "property_id",
    ];
}

<?php

namespace App\Models\Hospitable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitablePropertyAmenity extends Model
{
    use HasFactory;
    public $fillable=[
        "name",
        "property_id",
    ];
}

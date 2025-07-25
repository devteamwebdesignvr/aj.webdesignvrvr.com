<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyManagementRequest extends Model
{
    public $table = "property_management_requests";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',

        "name",
        "email",
        "mobile",
        "property_address",
        "property_type",
        "number_of_bedrooms",
        "number_of_bathrooms",
        "what_is_your_rental_goal",
        "what_are_you_looking_to_rent_your_property",
        "is_the_property_currently_closed",		

    ];

    public static $rules = [
        // create rules
    ];

    // Cm 
}


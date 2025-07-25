<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyEnquiryRequest extends Model
{
    public $table = "property_enquiry_requests";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'first_name',
		'last_name',
		'email',
		'mobile',
		'message',
		'property_id'
      
		

    ];

    public static $rules = [
        // create rules
    ];

    // Cm 
}


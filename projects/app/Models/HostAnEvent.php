<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HostAnEvent extends Model
{
    public $table = "host_an_events_requests";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
	
'you_are_interested_in',
'something_else',
'first_name',
'last_name',
'mobile',
'email',
'date_of_request',
'select_your_budget',
'tell_us_more',

    ];

    public static $rules = [
        // create rules
    ];

    // Cm 
}


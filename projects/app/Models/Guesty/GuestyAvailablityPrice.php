<?php

namespace App\Models\Guesty;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestyAvailablityPrice extends Model
{
    use HasFactory;

    public $fillable=[

        "start_date",
        "listingId",
        "price",
        "minNights",
        "cta",
        "ctd",
        "status",
    ];
}

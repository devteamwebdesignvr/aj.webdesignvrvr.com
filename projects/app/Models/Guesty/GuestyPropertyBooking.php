<?php

namespace App\Models\Guesty;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestyPropertyBooking extends Model
{
    use HasFactory;

    public $fillable=[
"_id",
"integration",
"confirmationCode",
"checkIn",
"checkOut",
'start_date',
'end_date',
"listingId",
"guest",
"accountId",
"guestId",
"listing",
"all_data"
    ];
}

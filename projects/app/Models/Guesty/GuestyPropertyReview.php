<?php

namespace App\Models\Guesty;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestyPropertyReview extends Model
{
    use HasFactory;

    public $fillable=[

        "_id",
        "externalReviewId",
        "accountId",
        "channelId",
        "createdAt",
        "createdAtGuesty",
        "externalListingId",
        "externalReservationId",
        "guestId",
        "listingId",
        "rawReview",
        "reservationId",
        "updatedAt",
        "updatedAtGuesty",
        "reviewReplies",
        'full_name',
        'all_data',

        'guest_data',
        'full_name'
    ];
}

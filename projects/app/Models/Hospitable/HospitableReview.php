<?php

namespace App\Models\Hospitable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitableReview extends Model
{
    use HasFactory;

    public $fillable=[
        "property_id" ,
        "review_id" ,
        "platform" ,
        "public_object" ,
        "public_rating" ,
        "public_review" ,
        "private_object", 
        "reviewed_at" ,
        "responded_at" ,
        "can_respond" ,
        "guest_object" ,
        "guest_first_name",
        "guest_last_name",
        "guest_language" 
    ];
}
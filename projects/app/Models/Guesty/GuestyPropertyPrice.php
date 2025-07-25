<?php

namespace App\Models\Guesty;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestyPropertyPrice extends Model
{
    use HasFactory;

    public $fillable=[
"property_id",
"prices",
"monthlyPriceFactor",
"weeklyPriceFactor",
"currency",
"basePrice",
"weekendBasePrice",
"weekendDays",
"securityDepositFee",
"guestsIncludedInRegularFee",
"extraPersonFee",
"cleaningFee",
    ];
}

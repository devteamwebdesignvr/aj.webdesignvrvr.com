<?php

namespace App\Models\Guesty;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestyProperty extends Model
{
    use HasFactory;

    public $fillable=["_id","picture","terms","terms_min_night","terms_max_night","prices","publicDescription","summary","space","access","interactionWithGuests","neighborhood","transit","notes","houseRules","privateDescription","type","amenities","amenitiesNotIncluded","active","nickname","title","propertyType","roomType","bedrooms","bathrooms","beds","isListed","address","defaultCheckInTime","defaultCheckInEndTime","defaultCheckOutTime","accommodates","pictures","accountId","createdAt","lastUpdatedAt","all_data","guests",

        'seo_url',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'banner_image',
        'is_home',
        'status',
        'location_id',
        'map',
        'ordering',
        'booklet',
        'feature_image',
        "ogimage",
     
    ];
}

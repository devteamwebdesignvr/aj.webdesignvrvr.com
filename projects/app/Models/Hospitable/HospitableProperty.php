<?php

namespace App\Models\Hospitable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitableProperty extends Model
{
    use HasFactory;

    public $fillable=[

"hospitable_id" ,
"name" ,
"picture" ,
"address_object" ,
"timezone" ,
"listed" ,
"currency" ,
"summary" ,
"description" ,
"checkin" ,
"checkout" ,
"amenities_object" ,

"capacity_object" ,
"capacity_max" ,
"capacity_bedrooms" ,
"capacity_beds" ,
"capacity_bathrooms" ,


"room_details_object" ,
"property_type" ,
"room_type" ,
"tags_object" ,
"house_rules_object" ,
"house_rules_pets_allowed" ,
"house_rules_smoking_allowed",
"house_rules_events_allowed",


"calendar_restricted" ,
"parent_child" ,
      "why_stay_ids",
      "accommodation_ids",
      "youtube_iframe_link",



"title",
"status",
"is_home",
"meta_title",
"meta_keywords",
"meta_description",
"header_section",
"footer_section",
"seo_url",
"map",
"feature_image",
"banner_image",
'location_id',
'hospitable_booking_widget',
'hospitable_calendar_widget',
'hospitable_review_widget',
'ordering',
      'description_type','custom_description','public_name','faq_image','review_start','hot_tub','calendar_text','wedding_package_heading','wedding_package_desc','wedding_package_pdf','parent_child_object','is_featured'
    ];
}

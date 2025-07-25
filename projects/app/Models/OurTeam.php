<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Testimonial
 * @package App\Models
 */
class OurTeam extends Model
{
    public $table = "our_teams";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'first_name',
		'last_name',
		'image',
		'email',
		'mobile',
		'profile',
		'bannerImage',
		'contactImage',
		
		
		
		'seo_url',
		'longDescription',
		'header_section',
		'footer_section',

			'meta_title',
		'meta_keywords',
		'meta_description',

    ]; 
}

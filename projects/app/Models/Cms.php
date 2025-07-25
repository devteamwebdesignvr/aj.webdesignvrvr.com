<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    public $table = "cms";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'name',
		'seo_url',
		'shortDescription',
		'mediumDescription',
		'longDescription',
		'description',
		'image',
		'meta_title',
		'meta_keywords',
		'meta_description',
		'templete',
		'bannerImage',
		'publish',

		'header_section',
		'footer_section',
		'seo_section',
		'image_2',
		'image_3',
		
		"ogimage",
        "strip_title",
        "strip_desction",
        "strip_anchor",
        "strip_image",
        "section_image",
        "section_desc",
        'gallery_1_image',
        'gallery_2_image',
        'gallery_3_image',
        'gallery_4_image',
        'banner_video',
      'last_section_video',
      'joshua_tree_video',
      'gallery_banner_image',
      'why_choose_video',
      'main_heading',
      'secondary_heading',
      'book_compound_video',

    ];

    public static $rules = [
        // create rules
    ];

    // Cm 
}


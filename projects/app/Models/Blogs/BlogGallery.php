<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogGallery extends Model
{
    use HasFactory;

    public $fillable=[
        "blog_id",
        "status",
        "image",
        "sorting",
        "caption"
    ];
}

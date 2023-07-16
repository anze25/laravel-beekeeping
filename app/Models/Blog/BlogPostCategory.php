<?php

namespace App\Models\Blog;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posts()
    {
        return $this->belongsTo(BlogPost::class, 'id', 'category_id');
    }
}

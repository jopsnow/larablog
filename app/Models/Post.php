<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use  \TCG\Voyager\Traits\Translatable;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'content',
        'slug',
        'featured_image',
        'is_featured',
        'is_published'
    ];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the category that owns the post.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Post Tags
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}

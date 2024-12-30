<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $fillable = ['title', 'content', 'featured_image', 'categoryID', 'postType', 'views', 'shares', 'slug', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('postType', $type);
    }
}
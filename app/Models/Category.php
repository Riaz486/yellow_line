<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    protected $fillable = ['name', 'parentID', 'postType', 'slug', 'status'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parentID');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parentID');
    }
}

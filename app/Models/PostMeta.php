<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    use HasFactory;

    protected $fillable = ['postID', 'meta_key', 'meta_value'];

    // Define the relationship with Post
    public function post()
    {
        return $this->belongsTo(Post::class, 'postID');
    }

    // Optionally, explicitly define the primary key
    protected $primaryKey = 'ID';
}

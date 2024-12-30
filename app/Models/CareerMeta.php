<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerMeta extends Model
{
    use HasFactory;
    
    protected $table = 'career_meta';

    protected $fillable = ['jobID', 'meta_key', 'meta_title', 'meta_value'];

    public function career()
    {
        return $this->belongsTo(Career::class, 'jobID', 'id');
    }
}

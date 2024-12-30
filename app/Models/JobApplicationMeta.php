<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicationMeta extends Model
{
    use HasFactory;

    protected $fillable = ['applicationID', 'meta_key', 'meta_value', 'category'];

    public function jobApplication()
    {
        return $this->belongsTo(JobApplication::class, 'applicationID');
    }
}

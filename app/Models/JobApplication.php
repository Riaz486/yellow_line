<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = ['jobID', 'created_at', 'status'];

    public function career()
    {
        return $this->belongsTo(Career::class, 'jobID');
    }

    public function jobApplicationMeta()
    {
        return $this->hasMany(JobApplicationMeta::class, 'applicationID');
    }
}

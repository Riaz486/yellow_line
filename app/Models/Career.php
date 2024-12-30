<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'location', 'age_limit', 'qualification', 'job_description', 'last_date_apply', 'status', 'slug'
    ];

    public function careerMeta()
    {
        return $this->hasMany(CareerMeta::class, 'jobID');
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'jobID');
    }
}

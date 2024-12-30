<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFaq extends Model
{
    use HasFactory;

    protected $table = 'projects_faq';

    protected $fillable = [
        'projectID',
        'question',
        'answer',
        'status',
    ];

    // Relationship with Project
    public function project()
    {
        return $this->belongsTo(Project::class, 'projectID');
    }
}
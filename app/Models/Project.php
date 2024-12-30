<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'title',
        'content',
        'video_file',
        'thumbnail',
        'cta_heading',
        'cta_description',
        'cta_file',
        'banner_title',
        'banner_description',
        'map_iframe',
        'custom_css',
        'theme',
        'slug',
    ];

    // Relationship with ProjectMeta
    public function metas()
    {
        return $this->hasMany(ProjectMeta::class, 'projectID');
    }

    // Relationship with ProjectFaq
    public function faqs()
    {
        return $this->hasMany(ProjectFaq::class, 'projectID');
    }
}
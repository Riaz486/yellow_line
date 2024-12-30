<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMeta extends Model
{
    use HasFactory;

    protected $table = 'projects_meta';

    protected $fillable = [
        'projectID',
        'meta_key',
        'meta_value',
    ];

    // Create or update project meta
    public static function create_project_meta($projectID, $meta_key, $meta_value) {
        $projectMeta = self::where('projectID', $projectID)
                           ->where('meta_key', $meta_key)
                           ->first();

        if ($projectMeta) {
            $projectMeta->meta_value = $meta_value;
            $projectMeta->save();
        } else {
            self::create([
                'projectID'  => $projectID,
                'meta_key'   => $meta_key,
                'meta_value' => $meta_value,
            ]);
        }
    }

    public static function get_meta_value($projectID, $meta_key) {
        $projectMeta = self::where('projectID', $projectID)
                           ->where('meta_key', $meta_key)
                           ->first();

        return $projectMeta ? $projectMeta->meta_value : null; // Return value or null if not found
    }

    // Relationship with Project
    public function project()
    {
        return $this->belongsTo(Project::class, 'projectID');
    }
}
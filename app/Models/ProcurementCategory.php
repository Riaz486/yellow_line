<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementCategory extends Model
{
    use HasFactory;

    protected $table = 'procurement_categories';

    protected $fillable = [
        'name',
        'parentID',
        'slug',
        'status',
    ];

    /**
     * Relationship to fetch child categories.
     */
    public function children()
    {
        return $this->hasMany(ProcurementCategory::class, 'parentID');
    }

    /**
     * Relationship to fetch the parent category.
     */
    public function parent()
    {
        return $this->belongsTo(ProcurementCategory::class, 'parentID');
    }

    /**
     * Relationship to procurements in this category.
     */
    public function procurements()
    {
        return $this->hasMany(Procurement::class, 'categoryID');
    }
}

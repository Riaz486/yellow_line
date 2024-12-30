<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    use HasFactory;

    protected $table = 'procurement';

    protected $fillable = [
        'title',
        'categoryID',
        'proposalRequestID',
        'city',
        'department',
        'date_publication',
        'date_closing',
        'views',
        'shares',
        'slug',
    ];

    /**
     * Relationship to the category the procurement belongs to.
     */
    public function category()
    {
        return $this->belongsTo(ProcurementCategory::class, 'categoryID');
    }

    /**
     * Relationship to the files associated with this procurement.
     */
    public function files()
    {
        return $this->hasMany(ProcurementFile::class, 'procurementID');
    }
}

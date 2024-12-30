<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementFile extends Model
{
    use HasFactory;

    protected $table = 'procurement_files';

    protected $fillable = [
        'procurementID',
        'title',
        'filename',
        'views',
        'downloads',
    ];

    /**
     * Relationship to the procurement this file belongs to.
     */
    public function procurement()
    {
        return $this->belongsTo(Procurement::class, 'procurementID');
    }
}

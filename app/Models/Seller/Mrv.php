<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;

class Mrv extends Model
{
    protected $table = 'mrv_reports';
    public $timestamps = false;
    protected $primaryKey = 'mrv_id';
    protected $fillable = [
        'project_id',
        'mrv_name',
        'status',
        'size',
        'document_url',
        'submitted_at',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }
}

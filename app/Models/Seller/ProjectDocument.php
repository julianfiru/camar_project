<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;

class ProjectDocument extends Model
{
    protected $table = 'project_documentations';
    public $timestamps = false;
    protected $primaryKey = 'document_id';
    protected $fillable = [
        'project_id',
        'document_name',
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

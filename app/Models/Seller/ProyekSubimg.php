<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;

class ProyekSubimg extends Model
{
    protected $table = 'project_subimg';
    public $timestamps = false;
    protected $primaryKey = 'subimg_id';
    protected $fillable = [
        'project_id',
        'subimg_url',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }
}

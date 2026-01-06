<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;

class ProjectRealization extends Model
{
    protected $table = 'project_verifications';
    public $timestamps = false;
    protected $primaryKey = 'verification_id';
    protected $fillable = [
        'project_id',
        'auditor_id',
        'verified_emission_ton',
        'certification_report_url',
        'verified_at',
    ];
    public function project()
    {
        return $this->belongsTo(Seller::class, 'project_id', 'project_id');
    }
    public function auditor()
    {
        return $this->belongsTo(Seller::class, 'auditor_id', 'auditor_id');
    }
}

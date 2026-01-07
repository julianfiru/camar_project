<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    public $timestamps = false;
    protected $primaryKey = 'project_id';
    protected $fillable = [
        'seller_id',
        'project_name',
        'project_type',
        'location',
        'price',
        'total_capacity_ton',
        'available_capacity_ton',
        'duration_years',
        'status',
        'verified_at',
    ];
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id', 'seller_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'project_id', 'project_id');
    }
    public function mrv()
    {
        return $this->hasMany(Mrv::class, 'project_id', 'project_id');
    }
}

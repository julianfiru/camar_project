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
        'sku',
        'project_name',
        'category_id',
        'location',
        'price',
        'total_capacity_ton',
        'available_capacity_ton',
        'duration_years',
        'status',
        'photo_url',
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
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id', 'category_id');
    }
    public function mrv()
    {
        return $this->hasMany(Mrv::class, 'project_id', 'project_id');
    }
    public function projectviews()
    {
        return $this->hasMany(ProjectViews::class, 'project_id', 'project_id');
    }
}

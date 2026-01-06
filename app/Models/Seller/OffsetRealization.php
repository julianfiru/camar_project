<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffsetRealization extends Model
{
    protected $table = 'offset_realizations';
    public $timestamps = false;
    protected $primaryKey = 'realization_id';
    protected $fillable = [
        'verification_id',
        'order_id',
        'available_capacity_ton',
        'created_at',
    ];
}

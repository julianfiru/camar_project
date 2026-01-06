<?php

namespace App\Models\Buyer;

use Illuminate\Database\Eloquent\Model;

class Emission extends Model
{
    protected $table = 'emission_calculations';
    public $timestamps = false;
    protected $primaryKey = 'calculation_id';
    protected $fillable = [
        'buyer_id',
        'year',
        'total_emission_ton',
        'methodology',
        'created_at',
    ];
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }
}
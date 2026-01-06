<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    public $timestamps = false;
    protected $primaryKey = 'payment_id';
    protected $fillable = [
        'order_id',
        'amount',
        'payment_method',
        'payment_status',
        'paid_at',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
} 

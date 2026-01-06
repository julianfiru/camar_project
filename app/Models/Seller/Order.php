<?php

namespace App\Models\Seller;

use App\Models\Buyer\Buyer;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'offset_orders';
    public $timestamps = false;
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'buyer_id',
        'project_id',
        'offset_amount_ton',
        'order_status',
        'created_at',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }
    public function certificate()
    {
        return $this->belongsTo(Buyer::class, 'order_id', 'order_id');
    }
    public function payment()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
    public function getTotalPriceAttribute()
    {
        if ($this->project) {
            return $this->offset_amount_ton * $this->project->price;
        }
        return 0;
    }
}

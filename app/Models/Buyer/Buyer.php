<?php

namespace App\Models\Buyer;

use App\Models\Seller\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $table = 'buyers';
    public $timestamps = false;
    protected $primaryKey = 'buyer_id';
    protected $fillable = [
        'user_id',
        'company_name',
        'country',
        'nib',
        'npwp',
        'website',
        'phone_number',
        'bio',
        'desc',
        'address',
        'verified_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'buyer_id', 'buyer_id');
    }
    public function emission()
    {
        return $this->belongsTo(Emission::class, 'buyer_id', 'buyer_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'buyer_id', 'buyer_id');
    }
    public function offsetCertificate()
    {
        return $this->belongsTo(Order::class, 'buyer_id', 'buyer_id');
    }
    public function documentBuyer()
    {
        return $this->belongsTo(BuyerDocumentation::class, 'buyer_id', 'buyer_id');
    }
}

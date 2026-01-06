<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;

class SellerBanking extends Model
{
    protected $table = 'seller_bankings';
    protected $primaryKey = 'bank_id';
    public $timestamps = false;
    
    protected $fillable = [
        'seller_id', 
        'bank_name', 
        'account_number',
        'bank_branch', 
    ];
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id', 'seller_id');
    }
}

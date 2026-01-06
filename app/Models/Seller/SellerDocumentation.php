<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;

class SellerDocumentation extends Model
{
    protected $table = 'seller_documentations';
    protected $primaryKey = 'document_id';
    public $timestamps = false;
    
    protected $fillable = [
        'seller_id', 
        'document_name', 
        'document_type', 
        'size',
        'document_status', 
        'document_url', 
    ];
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id', 'seller_id');
    }
}

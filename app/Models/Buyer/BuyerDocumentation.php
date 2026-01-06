<?php

namespace App\Models\Buyer;

use Illuminate\Database\Eloquent\Model;

class BuyerDocumentation extends Model
{
    protected $table = 'buyer_documentations';
    protected $primaryKey = 'document_id';
    public $timestamps = false;
    protected $fillable = [
        'buyer_id', 
        'document_name', 
        'document_type', 
        'size',
        'document_status', 
        'document_url', 
    ];
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }
}

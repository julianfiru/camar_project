<?php

namespace App\Models\Seller;

use App\Models\Buyer\Buyer;
use Illuminate\Database\Eloquent\Model;

class OffsetCertificate extends Model
{
    protected $table = 'offset_certificates';
    public $timestamps = false;
    protected $primaryKey = 'certificate_id';
    protected $fillable = [
        'order_id',
        'project_id',
        'buyer_id',
        'offset_amount_ton',
        'certificate_number',
        'issued_at',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'project_id', 'project_id');
    }
}

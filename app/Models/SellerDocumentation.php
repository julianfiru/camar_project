<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerDocumentation extends Model
{
    use HasFactory;

    protected $table = 'seller_documentations';
    protected $primaryKey = 'document_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'seller_id',
        'document_name',
        'document_type',
        'size',
        'document_status',
        'document_url',
    ];

    /**
     * Get the seller that owns the documentation.
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id', 'seller_id');
    }
}

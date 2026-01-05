<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerDocumentation extends Model
{
    use HasFactory;

    protected $table = 'buyer_documentations';
    protected $primaryKey = 'document_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'buyer_id',
        'document_name',
        'document_type',
        'size',
        'document_status',
        'document_url',
    ];

    /**
     * Get the buyer that owns the documentation.
     */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }
}

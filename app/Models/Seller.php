<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $table = 'sellers';
    protected $primaryKey = 'seller_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'profile_photo',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'verified_at' => 'datetime',
    ];

    /**
     * Get the user that owns the seller.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * Get the badges for the seller.
     */
    public function badges()
    {
        return $this->hasMany(SellerBadge::class, 'seller_id', 'seller_id');
    }

    /**
     * Get the bankings for the seller.
     */
    public function bankings()
    {
        return $this->hasMany(SellerBanking::class, 'seller_id', 'seller_id');
    }

    /**
     * Get the documentations for the seller.
     */
    public function documentations()
    {
        return $this->hasMany(SellerDocumentation::class, 'seller_id', 'seller_id');
    }
}

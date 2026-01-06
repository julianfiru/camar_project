<?php

namespace App\Models\Seller;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = 'sellers';
    public $timestamps = false;
    protected $primaryKey = 'seller_id';
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
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function badge()
    {
        return $this->hasOne(SellerBadge::class, 'seller_id', 'seller_id');
    }
    public function getCurrentBadgeNameAttribute()
    {
        return $this->badge?->badge_name;
    }
    public function getCurrentBadgeStyleAttribute()
    {
        return $this->badge?->badge_style;
    }
    public function projects()
    {
        return $this->hasMany(Project::class, 'seller_id', 'seller_id');
    }
    public function bank()
    {
        return $this->hasOne(SellerBanking::class, 'seller_id', 'seller_id');
    }
    public function documentsSeller()
    {
        return $this->hasMany(SellerDocumentation::class, 'seller_id', 'seller_id');
    }
}

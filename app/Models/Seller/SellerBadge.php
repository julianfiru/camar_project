<?php
namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;

class SellerBadge extends Model
{
    protected $table = 'seller_badges';
    protected $primaryKey = 'badge_id';
    public $timestamps = false;
    
    protected $fillable = [
        'seller_id', 
        'total_relized_ton', 
        'assigned_at'
    ];

    // --- 1. Accessor Nama Badge ---
    public function getBadgeNameAttribute()
    {
        $ton = $this->total_relized_ton;

        if ($ton >= 2000000) return 'Amethyst';
        if ($ton >= 1000000) return 'Ruby';
        if ($ton >= 500000)  return 'Emerald';
        if ($ton >= 300000)  return 'Sapphire';
        if ($ton >= 100000)  return 'Diamond';
        if ($ton >= 50000)   return 'Platinum';
        if ($ton >= 20000)   return 'Gold';
        if ($ton >= 10000)   return 'Silver';
        if ($ton >= 5000)    return 'Bronze';
        if ($ton >= 1000)    return 'Iron';
        return 'Newcomer';
    }
    // --- 2. Accessor Style CSS (Warna & Shadow) ---
    public function getBadgeStyleAttribute()
    {
        $ton = $this->total_relized_ton;
        $bg     = '#DEDEDE';
        $shadow = '1px 1px 2px #4D4D4D'; 
        $color  = '#000000';
        if ($ton >= 2000000) {
            $bg     = '#CD30E3';
            $shadow = '0px 0px 7px #4A0054';
            $color  = '#FFFFFF';
        } 
        elseif ($ton >= 1000000) {
            $bg     = '#F71616';
            $shadow = '0px 0px 6px #6B0000';
            $color  = '#FFFFFF';
        }
        elseif ($ton >= 500000) {
            $bg     = '#48F235';
            $shadow = '1px 1px 5px #125C0B';
            $color  = '#000000';
        }
        elseif ($ton >= 300000) {
            $bg     = '#2683FF';
            $shadow = '1px 1px 5px #002D6B';
            $color  = '#FFFFFF';
        }
        elseif ($ton >= 100000) {
            $bg     = '#62F6FC';
            $shadow = '0px 0px 8px #00A6AD';
            $color  = '#000000';
        }
        elseif ($ton >= 50000) {
            $bg     = '#A1A177';
            $shadow = '1px 1px 3px #3D3D2F';
            $color  = '#FFFFFF';
        }
        elseif ($ton >= 20000) {
            $bg     = '#FFFF26';
            $shadow = '1px 1px 4px #8A8A00';
            $color  = '#000000';
        }
        elseif ($ton >= 10000) {
            $bg     = '#FFFFFF';
            $shadow = '0px 0px 5px #000000, 1px 1px 2px #787878';
            $color  = '#000000';
        }
        elseif ($ton >= 5000) {
            $bg     = '#EB872A';
            $shadow = '1px 1px 3px #5C2B00';
            $color  = '#FFFFFF';
        }
        elseif ($ton >= 1000) {
            $bg     = '#787878';
            $shadow = '1px 1px 2px #000000';
            $color  = '#FFFFFF';
        }
        return "background-color: $bg; box-shadow: $shadow; color: $color;";
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id', 'seller_id');
    }
}
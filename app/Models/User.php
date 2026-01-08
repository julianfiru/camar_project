<?php

namespace App\Models;

use App\Models\Admin\Admin;
use App\Models\Auditor\Auditor;
use App\Models\Buyer\Buyer;
use App\Models\Seller\ProjectViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Seller\Seller;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'email',
        'password_hash',
        'photo_url',
        'role',
        'status',
        'created_at',
        'last_login',
    ];

    public function seller()
    {
        return $this->hasOne(Seller::class, 'user_id', 'user_id');
    }
    public function buyer()
    {
        return $this->hasOne(Buyer::class, 'user_id', 'user_id');
    }
    public function auditor()
    {
        return $this->hasOne(Auditor::class, 'user_id', 'user_id');
    }
    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'user_id');
    }
    public function projectview()
    {
        return $this->hasOne(ProjectViews::class, 'user_id', 'user_id');
    }
}

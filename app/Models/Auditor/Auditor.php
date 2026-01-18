<?php

namespace App\Models\Auditor;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Auditor extends Model
{
    protected $table = 'auditors';
    public $timestamps = false;
    protected $primaryKey = 'auditor_id';
    protected $fillable = [
        'user_id',
        'name',
        'position',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}

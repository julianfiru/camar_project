<?php

namespace App\Models\Seller;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ProjectViews extends Model
{
    protected $table = 'project_view_logs';
    public $timestamps = false;
    protected $primaryKey = 'view_id';
    protected $fillable = [
        'project_id',
        'user_id',
        'created_at',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'user_id');
    }
}

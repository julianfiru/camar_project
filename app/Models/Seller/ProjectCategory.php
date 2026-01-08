<?php

namespace App\Models\Seller;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $table = 'project_categories';
    public $timestamps = false;
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'category_name',
    ];
}

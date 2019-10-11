<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql_website';
    protected $table = 'abouts';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'description', 'img', 'position_img', 'person_legal_id'
    ];

    protected $hidden = ['created_at','updated_at', 'deleted_at'];
}

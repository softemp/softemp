<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $connection = 'mysql_website';
    protected $table = 'abouts';

    protected $fillable = [
        'title','descriptions', 'img', 'position_img','status','person_legal_id'
    ];
}

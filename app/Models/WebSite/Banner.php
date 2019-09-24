<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'img_background', 'img_1', 'img_2', 'title_1', 'title_2', 'text_1', 'text_2', 'status'
    ];

}

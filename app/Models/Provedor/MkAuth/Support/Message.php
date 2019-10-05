<?php

namespace App\Models\Provedor\MkAuth\Support;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $connection = 'mysql_mkauth';

    protected $table = 'sis_msg';

    public $timestamps = false;

    protected $fillable = [
        'msg','login',
    ];
}

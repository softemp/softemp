<?php

namespace App\Models\MkAuth;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $connection = 'mysql_mkauth';

    protected $table = 'sis_cliente';
}

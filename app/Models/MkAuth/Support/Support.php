<?php

namespace App\Models\MkAuth\Support;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $connection = 'mysql_mkauth';

    protected $table = 'sis_suporte';

    public $timestamps = false;

    protected $fillable = [
        'login_atend','msg'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function msg(){
        return $this->hasOne(Message::class,'chamado','chamado');
    }
}

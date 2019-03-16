<?php

namespace App\Models\Base\User;

use App\Models\Base\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Physical extends Model
{
    /**
     * @var string
     */
    protected $table = 'physicals';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->hasOne(User::class,'physical_id','id');
    }
}

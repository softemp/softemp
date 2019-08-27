<?php

namespace App\Models\Core\People;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 *
 * @data 2018/01/06
 * @autor Paulo Roberto da Silva<paulo@softemp.com.br>
 *
 * @package App\Models\Users
 */
class Profile extends Model
{
    protected $table = 'profiles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'physical_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function physicals() {
        return $this->belongsTo(Physical::class,'physical_id','id');
    }
}

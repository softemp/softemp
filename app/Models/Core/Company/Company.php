<?php

namespace App\Models\Core\Company;

use App\Models\Core\People\People;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $table = 'companies';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fantasy_name', 'business_name', 'document'
    ];

    public function person(){
        return $this->belongsTo(People::class,'person_id','id');
    }
}

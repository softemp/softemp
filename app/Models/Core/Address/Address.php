<?php

namespace App\Models\Core\Address;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    /**
     * The attributes that are mass assignable.
     *
     * @number varchar(11)
     * @apartment varchar(10)
     * @building varchar(50)
     * @complement text
     *
     * @var array
     */
    protected $fillable = ['number', 'apartment', 'building', 'complement', 'principal','status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function addressType(){
        return $this->belongsTo(AddressType::class,'address_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function addressStreet()
    {
        return $this->belongsTo(Street::class,'street_id', 'id');
//        return $this->hasOne(Street::class,'id','street_id');
    }
}

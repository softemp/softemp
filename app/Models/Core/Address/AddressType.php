<?php

namespace App\Models\Core\Address;

use Illuminate\Database\Eloquent\Model;

class AddressType extends Model
{
    protected $table = 'address_types';
    /**
     * The attributes that are mass assignable.
     *
     * @name varchar(50)
     *
     * @var array
     */
    protected $fillable = ['name'];
}

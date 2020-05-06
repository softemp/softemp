<?php

namespace App\Models\Core\Address;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $table = 'continents';
    /**
     * The attributes that are mass assignable.
     *
     * @name varchar(100)
     * @initials varchar(2)
     *
     * @var array
     */
    protected $fillable = ['name', 'initials'];

    public function country(){
        return $this->belongsToMany(Country::class,'continent_country');
    }

    public function hasCountry($country) {
        if (is_string($country)) {
            return $this->country->contains('name', $country);
        }

        return $country->intersect($this->country)->count();
    }
}

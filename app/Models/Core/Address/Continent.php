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

    public function countries(){
        return $this->belongsToMany(Countrie::class,'continent_countrie');
    }

    public function hasCountrie($countrie) {
        if (is_string($countrie)) {
            return $this->countries->contains('name', $countrie);
        }

        return $countrie->intersect($this->countries)->count();
    }
}

<?php

namespace App\Models\Core\Address;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    /**
     * The attributes that are mass assignable.
     *
     * @name varchar(190)
     * @iso2 varchar(2)
     * @iso3 varchar(3)
     * @ddi varchar(15)
     *
     * @var array
     */
    protected $fillable = ['name', 'iso2', 'iso3', 'ddi'];

    /**
     * relacionamento entre paises e continentes
     *
     * @return type
     */
    public function continent() {
        return $this->belongsToMany(Continent::class,'continent_country','country_id','continent_id');
    }

    /**
     * atrelar um pais a um continente
     *
     * @param Continent $continent
     * @return type
     */
    public function addContinent(Continent $continent) {
        return $this->continent()->save($continent);
    }

    /**
     * remover o relacionamento com a tabela Continentes
     *
     * @param Continent $continent
     * @return type
     */
    public function revokeContinent(Continent $continent) {
        return $this->continent()->detach($continent);
    }

    /**
     * verifica se existe este relacionamento
     *
     * @param type $continent
     * @return type
     */
    public function hasContinent($continent) {
        if (is_string($continent)) {
            return $this->continent->contains('name', $continent);
        }

        return $continent->intersect($this->continent)->count();
    }

    public function state(){
        return $this->hasMany(State::class,'country_id','id');
    }
}

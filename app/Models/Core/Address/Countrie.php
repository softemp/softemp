<?php

namespace App\Models\Core\Address;

use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
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
    public function continents() {
        return $this->belongsToMany(Continent::class,'continent_countrie','countrie_id','continent_id');
    }

    /**
     * atrelar um pais a um continente
     *
     * @param Continent $continent
     * @return type
     */
    public function addContinent(Continent $continent) {
        return $this->continents()->save($continent);
    }

    /**
     * remover o relacionamento com a tabela Continentes
     *
     * @param Continent $continent
     * @return type
     */
    public function revokeContinent(Continent $continent) {
        return $this->continents()->detach($continent);
    }

    /**
     * verifica se existe este relacionamento
     *
     * @param type $continent
     * @return type
     */
    public function hasContinent($continent) {
        if (is_string($continent)) {
            return $this->continents->contains('name', $continent);
        }

        return $continent->intersect($this->continents)->count();
    }

    public function states(){
        return $this->hasMany(State::class,'countrie_id','id');
    }
}

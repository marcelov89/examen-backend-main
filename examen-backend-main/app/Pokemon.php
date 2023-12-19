<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    public $timestamps = false;

    public $table = "pokemones";

    protected $fillable = ['nombre', 'tipo'];


    public function equipos(){
        return $this->hasMany(EquipoPokemon::class, 'id_pokemones');
    }
}
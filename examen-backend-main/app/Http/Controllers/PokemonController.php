<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;
use App\PokeApi;

use GuzzleHttp\Client;


class PokemonController extends Controller
{
    public function listar()
    {
        $pokemones = Pokemon::get();
        return response()->json(['pokemones' => $pokemones]);
    }

    public function detalle($id)
    {
        $pokemon = Pokemon::whereId($id)->get();
              
        if($pokemon->isEmpty()){
            return response()->json([
                'mensaje' => 'sin Resultados'
            ], 404);
        }else{
            return response()->json([
                'pokemon' => $pokemon
            ],200);
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;
use App\PokeApi;

use GuzzleHttp\Client;

class AppController extends Controller
{
    public function getPokemones()
    {
        $cliente = new Client();
        $api= PokeApi::getUrlApi();
        $respuesta = $cliente->get($api . "pokemon?limit=15");
        $datos = $respuesta->json();

        foreach ($datos->results as $pokemon) {
            $pokemonDetalle = $cliente->get($pokemon->url);
            $pokemonDatos = $pokemonDetalle->json();
            Pokemon::create([
                'nombre' => $pokemonDatos->name,
                'tipo' => $pokemonDatos->types[0]->type->name,
            ]);
        }
        return response()->json(['message' => 'Pokemons Obtenidos Exitosamente']);
    }
}

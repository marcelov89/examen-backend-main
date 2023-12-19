<?php

namespace App\Api\V1\Controllers;

use App\Pokemon;
use App\Http\Controllers\Controller;
use Exception;

class PokemonController extends Controller
{
    public function listar()
    {
        $pokemones = [];
        try {
            $pokemones = Pokemon::all();
            return [
                'status' => 'ok',
                'pokemones' => $pokemones
            ];
        } catch (Exception $e) {
            throw $e;
        }
    }
}

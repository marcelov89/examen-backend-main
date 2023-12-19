<?php

namespace App\Api\V1\Controllers;

use Exception;
use App\Entrenador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntrenadorController extends Controller
{
    public function crear(Request $request)
    {
        $nombre = $request->nombr;
        try {
            if (empty($nombre)) {
                throw new Exception("Debe Ingresar el nombre.");
            }
            $entrenador = Entrenador::create([
                'nombre' => $nombre
            ]);
            return [
                'status' => 'ok',
                'id_entrenador' => $entrenador->id
            ];
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function detalle()
    {
        //
    }
}

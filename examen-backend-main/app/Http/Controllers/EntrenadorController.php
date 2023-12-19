<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrenador;

class EntrenadorController extends Controller
{
        public function crear(Request $request)
        {
            $validated=$request->validate([
                'nombre'=>'required',
            ]);

            $nombre = $request->input('nombre');
            $entrenador = Entrenador::create(['nombre' => $nombre]);
            return response()->json(['message' => 'Entrenador Registrado Exitosamente', 'entrenador' => $entrenador],201);
        }
    
        public function listar()
        {
            $entrenadores = Entrenador::get();
            return response()->json(['entrenadores' => $entrenadores],200);
        }
    
        public function detalle($id)
        {
            $entrenador = Entrenador::whereId($id)->get();
            $entrenador->load('equipos');
      
            if($entrenador->isEmpty()){
                return response()->json([
                    'mensaje' => 'sin Resultados'
                ], 404);
            }else{
                return response()->json([
                    'entrenador' => $entrenador
                ],200);
            }

        }
}

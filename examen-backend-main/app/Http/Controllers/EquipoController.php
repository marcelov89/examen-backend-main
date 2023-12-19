<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;

class EquipoController extends Controller
{
  
        public function crear(Request $request)
        {
            $validated=$request->validate([
                'id_entrenadores'=>'required',
                'nombre'=>'required',
            ]);

            $entrenadoresId = $request->input('id_entrenadores');
            $nombre = $request->input('nombre');
            $equipo = Equipo::create(['id_entrenadores' => $entrenadoresId,'nombre' => $nombre ]);
            return response()->json(['message' => 'Equipo Registrado Exitosamente', 'equipo' => $equipo],201);
        }
    
        public function listar()
        {
            $equipos = Equipo::whereHas('equiposPokemon')->get();
            return response()->json(['equipos' => $equipos],200);
        }

        public function detalle($id)
        {
            $equipo = Equipo::whereId($id)->get();
            if($equipo->isEmpty()){
                return response()->json([
                    'mensaje' => 'sin Resultados'
                ], 404);
            }else{
                return response()->json([
                    'equipo' => $equipo
                ],200);
            }
        }
    
}


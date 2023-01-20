<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use Illuminate\Http\Request;

class EntrenadorController extends Controller
{
    function index(){
        try{
            $entrenador = Entrenador::all();
            if(!$entrenador){
                return 'no hay deportes';
            }else{
                return response()->json($entrenador);
            }
        }catch(\Exception $e){
            return response()->json([
                'error'=> $e->getMessage()
            ],404);
        }
    }

    function registrar(Request $request){
        try{
            $request->validate([
                'tipo' =>' required|string',
            ]);
            $entrenador = Entrenador::create([
                'tipo' => $request->tipo,
            ]);
            return 'deportes inscripto correctamente';
        }catch(\Exception $e){
            return response()->json([
                'error'=> $e->getMessage()
            ],404);
        }
    }

    function actualizar(Request $request,$id){
        try{
            $request=$request->all();

            $entrenador = Entrenador::find($id);
            if(!$entrenador){
                return 'la pelicula no existe';
            }else{
                $entrenador = Entrenador::find($id)->update($request);
            };
        }catch(\Exception $e){
            return response()->json([
                'error'=> $e->getMessage()
            ],404);
        }
    }

    function eliminar($id){
        try{
            $entrenador = Entrenador::destroy($id);
        }catch(\Exception $e){
            return response()->json([
                'error'=> $e->getMessage()
            ],404);
        }
    }
}

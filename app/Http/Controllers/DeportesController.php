<?php

namespace App\Http\Controllers;

use App\Models\Deportes;
use Illuminate\Http\Request;

class DeportesController extends Controller
{
    
    function index(){
        try{
            $deportes = Deportes::all();
            if(!$deportes){
                return 'no hay deportes';
            }else{
                return response()->json($deportes);
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
            $deportes = Deportes::create([
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

            $deportes = Deportes::find($id);
            if(!$deportes){
                return 'la pelicula no existe';
            }else{
                $deportes = Deportes::find($id)->update($request);
            };
        }catch(\Exception $e){
            return response()->json([
                'error'=> $e->getMessage()
            ],404);
        }
    }

    function eliminar($id){
        try{
            $deportes = Deportes::destroy($id);
        }catch(\Exception $e){
            return response()->json([
                'error'=> $e->getMessage()
            ],404);
        }
    }

}

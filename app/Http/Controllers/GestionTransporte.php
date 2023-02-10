<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\{Personas,Vehiculos};
use Illuminate\Support\Facades\DB;

class GestionTransporte extends Controller
{
    public function index(){
        dd("holaaa");
    }

    public function registroVehiculos(Request $request){
        $insert = new Vehiculos();
        $insert->placa = $request->placa;
        $insert->color = $request->color;
        $insert->marca = $request->marca;
        $insert->tipo_vehiculo = $request->tipo_vehiculo;
        $insert->conductor = $request->conductor;
        $insert->propietario = $request->propietario;
        $insert->save();

        return response()->json(['status' => Response::HTTP_OK, 'data' => $insert], Response::HTTP_OK);
    }

    public function registroPersonas(Request $request){
        $insert = new Personas();
        $insert->cedula = $request->cedula;
        $insert->primer_nombre = $request->primer_nombre;
        $insert->segundo_nombre = $request->segundo_nombre;
        $insert->apellidos = $request->apellidos;
        $insert->direccion = $request->direccion;
        $insert->telefono = $request->telefono;
        $insert->ciudad = $request->ciudad;
        $insert->rol = $request->rol;
        $insert->save();

        return response()->json(['status' => Response::HTTP_OK, 'data' => $insert], Response::HTTP_OK);
    }


    public function consultaVehiculos(){
        $vehiculos = DB::table('vehiculos')
        ->join('personas','vehiculos.conductor','personas.cedula')
        ->select('vehiculos.*','personas.primer_nombre','personas.segundo_nombre','personas.apellidos','personas.rol')
        ->get();

        $array_respuesta = [];
        foreach($vehiculos as $vehiculo){
            $db_propietario = Personas::where('cedula',$vehiculo->propietario)->first();
            $array_respuesta[] = ['placa'=> $vehiculo->placa,
                                    'marca'=> $vehiculo->marca,
                                    'docuemnto_propietario'=>$db_propietario->cedula,
                                    'nombre_propietario'=> $db_propietario->primer_nombre.' '.$db_propietario->segundo_nombre.' '.$db_propietario->apellidos,
                                    'docuemnto_conductor'=> $vehiculo->conductor,
                                    'nombre_conductor'=> $vehiculo->primer_nombre.' '.$vehiculo->segundo_nombre.' '.$vehiculo->apellidos];
        }
        return response()->json(['status' => Response::HTTP_OK, 'data' => $array_respuesta], Response::HTTP_OK);
    }

}

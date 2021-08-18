<?php

namespace App\Http\Controllers;

use App\Inmueble;
use App\Publicacion;
use App\Zona;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class PublicacionApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerpublicaciones()
    {
        $publicaciones = Publicacion::all();
        return $publicaciones->toJson();
    }

    public function filtrarpublicaciones($criterio,$valor){
        $publicaciones = Publicacion::where($criterio,$valor)->get();
        return $publicaciones;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerpublicacion(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'descripcion'=>['required'],
            'precio'=>['required'],
            'tipo_publicacion'=>['required'],
            'user_id'=>['required'],
 
            'direccion'=>['required'],
            'area_terreno'=>['required'],
            'area_construida'=>['required'],
            'area_libre'=>['required'],
            'habitaciones'=>['required'],
            'baños'=>['required'],
            'pisos'=>['required'],
            'garajes'=>['required'],
            'foto_principal'=>['required'],
            'servicio'=>['required'],
            'tipo_inmueble'=>['required'],

            'zona_nombre'=>['required'],
            'latitud'=>['required'],
            'longitud'=>['required'],
        ]);
        if(!$validator->fails()){
            $zona=Zona::create([
             'zona_nombre' => $request['zona_nombre'],
             'latitud' => $request['latitud'],
             'longitud' => $request['longitud'],
            ]);

            $inmueble=Inmueble::create([
                'direccion' => $request['direccion'],
                'area_terreno' => $request['area_terreno'],
                'area_construida' => $request['area_construida'],
                'area_libre' => $request['area_libre'],
                'habitaciones' => $request['habitaciones'],
                'baños' => $request['baños'],
                'pisos' => $request['pisos'],
                'garajes' => $request['garajes'],
                'foto_principal' => $request['foto_principal'],
                'servicio' => $request['servicio'],
                'tipo_inmueble' => $request['tipo_inmueble'],
                'zona_id' => $zona->id,
            ]);
            
            $publicacion=Publicacion::create([
                'descripcion'=>$request['descripcion'],
                'precio'=>$request['precio'],
                'tipo_publicacion'=>$request['tipo_publicacion'],
                'user_id'=>$request['user_id'],
                'inmueble_id'=>$inmueble->id,
            ]);
            return response()->json(['publicacion'=>$publicacion]);
        }else{
            return response()->json($validator->errors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicacion $publicacion)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicacion $publicacion)
    {
        //
    }
}

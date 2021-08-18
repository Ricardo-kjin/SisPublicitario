<?php

namespace App\Http\Controllers;
use App\Tipopublicacion;
use App\Inmueble;
use App\TipoInmueble;
use Illuminate\Http\Request;

class FiltroApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function mostrarCantidadHabitaciones( $cant)
    {
        $filter = Inmueble::all()->where('habitaciones', $cant);
        return $filter->toJson();
    }

    public function mostrarTipoDeInmueble( $nombre)
    {
        $filter = Inmueble::all()->where('tipo_inmueble', $nombre);
        return $filter->toJson();
    }

    public function mostrarDirecciones($direccion)
    {
        $filter = Inmueble::all()->where('direccion', $direccion);
        return $filter->toJson();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

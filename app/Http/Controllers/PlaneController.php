<?php

namespace App\Http\Controllers;

use App\Plane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plane::all();
        return view('planes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('planes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validor = Validator::make($request->all(),  [
            'nombre' => ['required'],
            'descripcion' => ['required'],
            'cant_public' => ['required'],
            
        ]);
        
        if(!$validor->fails())
        {
          $grupo = Plane::create([
              'nombre' => $request['nombre'],
              'descripcion' => $request['descripcion'],
              'cant_public' => $request['cant_public'],
              'estado' => true
          ]);
          return redirect()->route('planes.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function show(Plane $plane)
    {
        return view('planes.show', [$plane => 'plane']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function edit(Plane $plane)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plane $plane)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plane $plane)
    {
        //
    }
}

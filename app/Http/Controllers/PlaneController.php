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
<<<<<<< HEAD
        $planes = Plane::all();
        return view('planes.index');
=======
        $planes=Plane::where('estado','1')->orderBy('id_planes','desc')->get();
        return view('venta.planes.index',['planes'=>$planes]);
>>>>>>> d13136fc37c86d10b67a32b9ed833c4febced35b
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        return view('planes.create');
=======
        //
        return view('venta.planes.create');
>>>>>>> d13136fc37c86d10b67a32b9ed833c4febced35b
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
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
=======
        //
        $request->validate([
            'nombre'=>'required|max:150',
            'descripcion'=>'required|max:700',
        ]);

        $plane=new Plane();
        $plane->nombre=$request->nombre;
        $plane->descripcion=$request->descripcion;
        $plane->estado=1;
        $plane->save();
        return redirect('/planes');
>>>>>>> d13136fc37c86d10b67a32b9ed833c4febced35b
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function show(Plane $plane)
    {
<<<<<<< HEAD
        return view('planes.show', [$plane => 'plane']);
=======
        return view('venta.planes.create',['plane'=>$plane]);
>>>>>>> d13136fc37c86d10b67a32b9ed833c4febced35b
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function edit(Plane $plane)
    {
        return view('venta.planes.edit',['plane'=>$plane]);
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
        $request->validate([
            'nombre'=>'required|max:150',
            'descripcion'=>'required|max:700',
        ]);
        $plane->nombre=$request->nombre;
        $plane->descripcion=$request->descripcion;
        $plane->save();
        return redirect('/planes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plane $plane)
    {
        $plane->estado=0;
        $plane->save();
        // $tipoinmueble->delete();
        return redirect('/planes');
    }
}

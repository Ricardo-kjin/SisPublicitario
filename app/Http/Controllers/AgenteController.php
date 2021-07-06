<?php

namespace App\Http\Controllers;

use App\TipoUsuario;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgenteController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function agente()
    {
        return view('admin.agentes.registrarAg');
    }
    public function storeagent(Request $request)
    {
      //  dd($request);
      $time=new DateTime();
        $tipo=TipoUsuario::create([
            'profesion'=>$request['profesion'],
            'nit_agente'=>$request['nit_agente'],
            'nombre_empresa'=>'ND',
            'direccion_empresa'=>'ND',
            'registro_empresa' =>'ND',
            'telefono_empresa'=>'ND',
            'nit_empresa'=>'ND',
            'estado'=>'1',
        ]);

       User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'telefono' => $request['telefono'],
        'fecha_nac' => $time->format('Y-m-d'),
        'id_tipo_usuarios'=>$tipo->id,
        'estado'=>'1',
        ]);
        return redirect('/admin');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

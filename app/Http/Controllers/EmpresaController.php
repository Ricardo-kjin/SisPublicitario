<?php

namespace App\Http\Controllers;

use App\TipoUsuario;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.empresa.create');
    }

    public function empresa()
    {
        return view('admin.empresas.registrarEm');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeemp(Request $request)
    {
        $time=new DateTime();

        $tipo=TipoUsuario::create([
            'profesion'=>'ND',
            'nit_agente'=>'ND',
            'nombre_empresa'=>$request['nombre_empresa'],
            'direccion_empresa'=>$request['direccion_empresa'],
            'registro_empresa'=>$request['registro_empresa'],
            'telefono_empresa'=>$request['telefono_empresa'],
            'nit_empresa'=>$request['nit_empresa'],
            'estado'=>'1',
        ]);

        User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'telefono' => $request['telefono'],
        'fecha_nac' =>$time->format('Y-m-d'),
        'id_tipo_usuarios'=>$tipo->id,
        'estado'=>'1',
        ]);
        return redirect('/users');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time=new DateTime();
        $tipo=TipoUsuario::create([
            'profesion'=>'ND',
            'nit_agente'=>'ND',
            'nombre_empresa'=>$request['nombre_empresa'],
            'direccion_empresa'=>$request['direccion_empresa'],
            'registro_empresa'=>$request['registro_empresa'],
            'telefono_empresa'=>$request['telefono_empresa'],
            'nit_empresa'=>$request['nit_empresa'],
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

<?php

namespace App\Http\Controllers;

use App\TipoUsuario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=DB::table('users')
        ->join('tipo_usuarios','tipo_usuarios.id','=','users.id_tipo_usuarios')
        ->where('users.estado','=','1')
        ->where('tipo_usuarios.nit_empresa','=','ND')
        ->where('tipo_usuarios.nit_agente','=','ND')
        ->get();
        //dd($users);
        return view('admin.users.index',["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        //validate the fields
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|between:8,255|confirmed',
            'password_confirmation' => 'required'
        ]);

        $tipo=TipoUsuario::create([
            'profesion'=>'Particular',
            'nit_agente'=>'ND',
            'nombre_empresa'=>'ND',
            'direccion_empresa'=>'ND',
            'registro_empresa' =>'ND',
            'telefono_empresa'=>'ND',
            'nit_empresa'=>'ND',
            'estado'=>'1',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->telefono=$request->telefono;
        $user->fecha_nac=$request->fecha_nac;
        $user->id_tipo_usuarios=$tipo->id;
        $user->estado=1;
        $user->save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('admin.users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
                //validate the fields
                $request->validate([
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'password' => 'confirmed',
                ]);

                $user->name = $request->name;
                $user->email = $request->email;
                $user->telefono = $request->telefono;
                if($request->password != null){
                    $user->password = Hash::make($request->password);
                }
                $user->save();

                return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {   $tipo=TipoUsuario::find($user->id);
        //dd($tipo);
        $tipo->delete();
        $user->delete();
        return redirect('/users');
    }
}

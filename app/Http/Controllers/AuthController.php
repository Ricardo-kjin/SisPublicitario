<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;   
use App\User;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
            'status' => 'invalid_credentials',
            'message' => 'Correo o contraseña no válidos.',
            ], 401);
        }
        return response()->json([
            'status' => 'ok',
            'token' => $jwt_token,
            'user' => JWTAuth::user('id')
        ]);
    }


    public function logout(Request $request) {
        $this->validate($request, [
            'token' => 'required'
        ]);
        try {
            JWTAuth::invalidate($request->token);
            return response()->json([
            'status' => 'ok',
            'message' => 'Cierre de sesión exitoso.'
        ]);
        } catch (JWTException $exception) {
            return response()->json([ 'status' => 'unknown_error',
            'message' => 'Al usuario no se le pudo cerrar la sesión.'
            ], 500);
        }
    }

    public function register(Request $request){
        $validator=Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'img_perfil' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'telefono' => ['required'],
            'direccion' => ['required'],
            'fecha_nac' => ['required'],
            'estado' => ['required'],
            'tipo_user' => ['required'],
        ]);
        if(!$validator->fails()){
            $user=User::create([
                'name' => $request['name'],
                'img_perfil' => $request['img_perfil'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'telefono' => $request['telefono'],
                'direccion' => $request['direccion'],
                'fecha_nac' => $request['fecha_nac'],
                'estado' => $request['estado'],
                'tipo_user' => $request['tipo_user'],
            ]);
            return response()->json(['message'=>'registro satisfactorio',
                                     'usuario'=>$user,  
                                    ]);
        }else{
            return response()->json($validator->errors());
        }
    }
}

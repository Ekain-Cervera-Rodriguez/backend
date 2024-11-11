<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = auth('api')->attempt($credentials)) {
                return response()->unauthorized(['Usuario o contraseña invalidos']);
            }
        $usuario = User::query()->where('email', '=', $credentials['email'])->first();
            return response()->success(compact('usuario', 'token'));
        }catch ( \Exception $e ){
            return response()->unprocessable('error', ['No se pudo inicar seción']);
        }

    }
    //
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'CredencialesKKKKKK no válidas', 'shshs' => $credentials], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo crear el token', 'Exception' => $credentials], 500);
        }

        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return response()->json(compact('user'));
    }
}

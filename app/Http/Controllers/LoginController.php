<?php

namespace App\Http\Controllers;

use App\Services\User\UserService;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public $service;

    public function __construct(UserService $useService)
    {
        $this->service = $useService;
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required'
        ]);

        $user = $this->service->login($request->all());

        if(!$user){
            return response()->json([
                'response' => 'credenciais inválidas',
            ], 400);
        }

        $user['token'] = $user->createToken('tokens')->plainTextToken;
        return response()->json([
            'response' => 'logado com sucesso',
            'user' => $user
        ], 200);
    }
}

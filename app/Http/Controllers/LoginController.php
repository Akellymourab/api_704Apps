<?php

namespace App\Http\Controllers;

use App\Service\User\UserService;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    public UserService $userService;
   
    public function __construct(UserService $userService)
    {
       $this->userService = $userService;
    }
   
    public function login(Request $request)
    {
        $user = $this->userService->login($request->all());
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

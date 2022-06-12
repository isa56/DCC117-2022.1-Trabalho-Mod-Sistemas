<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth')->except(['login']);
    }
    */
    
    /**
     * Login the user.
     * @param  \App\Http\Requests\LoginFormRequest
     * @return \Illuminate\Http\Response
     */
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if(!Auth::attempt($credentials)) {
            return response()->json('Não autorizado', 401);
        }
        $user = Auth::user();
        $user->tokens()->delete(); // revoga os tokens antigos do usuario
        $token = $user->createToken('token');
        return response()->json($token->plainTextToken);
    }   

}
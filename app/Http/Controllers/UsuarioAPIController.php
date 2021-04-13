<?php

namespace App\Http\Controllers;

use App\Models\UsuarioAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioAPIController extends Controller
{    
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->isJson()) return response()->json(['error' => 'os dados devem ser enviados no formato JSON'], 415);
        if(!$request->json()->has('email') || !$request->json()->has('email')) {
            return response()->json(['error' => 'campos email e senha são obrigatórios'], 400);
        }        
        $dados = $request->json()->all();    
        $usuarioAPI = new UsuarioAPI();
        $usuarioAPI->email = $dados['email'];
        $usuarioAPI->senha = sha1($dados['senha']);
        //usar a interface que usa bcrypt para cifrar Illuminate\Support\Facades\Hash:
        $usuarioAPI->token = Hash::make($dados['senha']);
        if($usuarioAPI->save()){
            return response()->json(['token' => $usuarioAPI->token], 201);
        }
        return response()->json(['error' => 'algum problema na API'], 500);
    }    
    
}

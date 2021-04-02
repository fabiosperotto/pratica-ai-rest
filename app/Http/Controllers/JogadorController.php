<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use Illuminate\Http\Request;

class JogadorController extends Controller
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
        //usado para retornar todos os dados em array, dd() serve para dar debug nos dados e encerrar a aplicacao:
        // dd($request->json()->all());

        if(!$request->json()->has('nome')) return response()->json(['error' => 'nome é obrigatório'], 400);
        
        $jogador = Jogador::create($request->json()->all());
        return response()->json($jogador, 201);
    }

    public function one($id = null)
    {
        if($id == null) return response()->json(['error' => 'id na URL é obrigatória'], 400);
        $jogador = Jogador::find($id);
        if($jogador == null) return response()->json(['error' => 'entidade não encontrada'], 404);        
        return response()->json($jogador, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {        
        if($id == null) return response()->json(['error' => 'id na URL é obrigatória'], 400);
        $jogador = Jogador::find($id);
        if($jogador == null) return response()->json(['error' => 'entidade não encontrada'], 404);
        
        $dados = $request->json()->all();
        if($request->json()->has('nome')) $jogador->nome = $dados['nome'];
        if($request->json()->has('ataque')) $jogador->ataque = $dados['ataque'];
        if($request->json()->has('defesa')) $jogador->defesa = $dados['defesa'];
        if($request->json()->has('pontos_vida')) $jogador->pontos_vida = $dados['pontos_vida'];
        if($jogador->save()) return response()->json($jogador, 200);
    }

    /**
     * Remove the specified resource from storage.
     *     
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = null)
    {
        if($id == null) return response()->json(['error' => 'id na URL é obrigatória'], 400);
        $jogador = Jogador::find($id);
        if($jogador->delete()) return response()->json(['OK'], 200);
    }

    public function all()
    {
        $jogadores = Jogador::all();
        return response()->json($jogadores, 200);
    }

    public function equipamento($id = null)
    {
        if($id == null) return response()->json(['error' => 'id na URL é obrigatória'], 400);
        $jogador = Jogador::find($id);
        $data = [];        
        foreach($jogador->equipamentos as $equipamento){
            $data[] = $equipamento;
        }
        return response()->json($data, 200);
    }
}

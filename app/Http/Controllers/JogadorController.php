<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use Illuminate\Http\Request;

class JogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
        return response()->json($jogador, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function show(Jogador $jogador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function edit(Jogador $jogador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jogador $jogador)
    {
        //
    }

    public function all()
    {
        $jogadores = Jogador::all();
        return response()->json($jogadores, 200);
    }
}

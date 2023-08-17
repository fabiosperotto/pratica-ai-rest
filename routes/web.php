<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => 'apicheck'], function() use ($router) {
    $router->get('/jogador', ['as' => 'jogador.all', 'uses' => 'JogadorController@all']);
    $router->get('/jogador/{id}', ['as' => 'jogador.get', 'uses' => 'JogadorController@one']);
    $router->post('/jogador', ['as' => 'jogador.post', 'uses' => 'JogadorController@store']);
    $router->put('/jogador[/{id}]', ['as' => 'jogador.put', 'uses' => 'JogadorController@update']);
    $router->delete('/jogador[/{id}]', ['as' => 'jogador.delete', 'uses' => 'JogadorController@destroy']);

    $router->get('/jogador/{id}/equipamento', ['as' => 'jogador.equipamento', 'uses' => 'JogadorController@equipamento']);
    $router->post('/jogador/{id}/equipamento', ['as' => 'jogador.equipamento', 'uses' => 'JogadorController@equipamentoPost']);
});

//rota para realizar cadastro e receber token de acesso a API:
$router->post('/authenticate',['as'=> 'autentica.api', 'uses' => 'UsuarioAPIController@store']);

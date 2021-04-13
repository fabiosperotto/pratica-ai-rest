<?php

namespace App\Http\Middleware;

use App\Models\UsuarioAPI;
use Closure;

class APIUserControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {        
        if($request->header('Authorization') == null) return response('Unauthorized', 401);
        $key = explode(" ", $request->header('Authorization')); //separar a string Basic token
        $usuarioAPI = UsuarioAPI::where('token',$key[1])->first();
        if($usuarioAPI == null) return response('Token invalido', 401);
        //ao chegar aqui, tudo certo com o token, segue a requisicao
        return $next($request);
    }
}

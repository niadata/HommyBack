<?php

namespace App\Http\Middleware;

use Closure;

class CORS
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
        $resposta = $next($request);

        $resposta->header('Acess-Control-Origin','*');
        $resposta->header('Acess-Control-Origin','GET, POST, PUT, DELETE, OPTIONS');
        $resposta->header('Acess-Control-Origin','Autorization, Content-Type');
        
        return $resposta;
    }
}

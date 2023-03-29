<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\m_clientes;
use Illuminate\Http\Request;

class validar_perfil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $blockAccess=true; 

        if( user()->perfil == 'admin')$blockAccess=false;  {
           abort('404');
        }

        return $next($request);
    }
}

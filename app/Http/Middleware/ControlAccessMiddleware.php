<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ControlAccessMiddleware{
    /**
    * Handle an incoming request.
    *
    * @param \Illuminate\Http\Request    $request
    * @param \Closure    $next
    * @return  mixed
    */
public function handle(Request $request, Closure $next){
    $blockAccess = false;

    if(auth()->user()->admin === false)$blockAccess = true;

      if($blockAccess){
        abort ('404');
          return back()->with('message', ['danger', 'No eres Admin no tienes privilegios para acceder']);

      }else{}

      return $next($request);

    }
}
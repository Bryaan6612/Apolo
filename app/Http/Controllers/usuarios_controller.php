<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_usuarios;


class usuarios_controller extends Controller
{
    public function listar(){
        $usuarios = m_usuarios::all();
        foreach($usuarios as $usuario){
               
            try{
                $usuario->nombre = $usuario->nombre;
                $usuario->apellidop = $usuario->apellidop;
                $usuario->apellidom = $usuario->apellidom;
                $usuario->tipo_usuario = $usuario->tipo_usuario;
                    }catch (Exception $e) {
                    }
        }

        return $usuarios;
    }
     
        public function vista(){
          return view('pages.usuario');
    }

    public function guardar(Request $request){
        
        if($request->id ==0)

            $usuarios =new m_usuarios(); 

        else

        $usuarios = m_usuarios::find($request->id);
        
        $usuario->nombre = $usuario->nombre;
        $usuario->apellidop = $usuario->apellidop;
        $usuario->apellidom = $usuario->apellidom;
        $usuario->tipo_usuario = $usuario->tipo_usuario;

        Log::info("Se registro correctamente");
        $usuarios->save();
        return $usuarios;
        
    }
}

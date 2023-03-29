<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_clientes;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Log;
use ver_imagen;

class clientes_controller extends Controller
{


    public function listar(){

        $clientes = m_clientes::all();

        foreach($clientes as $cliente){
               
            try{
                $cliente->nombre = Crypt::decryptString($cliente->nombre);
                $cliente->apellidos = Crypt::decryptString($cliente->apellidos);
                $cliente->edificio= Crypt::decryptString($cliente->edificio);
                $cliente->area = Crypt::decryptString($cliente->area);
                $cliente->eje= Crypt::decryptString($cliente->eje);
                $cliente->telefono = Crypt::decryptString($cliente->telefono);
                $cliente->correo = Crypt::decryptString($cliente->correo);
                    }catch (DecryptException $e) {
                       //$cliente->telefono = $cliente
                    }
        }

        return $clientes;
    }
    
    public function vista(){
       
        return view('pages.clientes');
       
    }

    public function guardar(Request $request){
        
        if($request->id ==0)

            $clientes =new m_clientes(); 

        else

        $clientes = m_clientes::find($request->id);
        $ruta_archivo = $request->file('imagen')->store('imagen_cliente');
        
        $clientes->imagen = $ruta_archivo;
        $clientes->nombre = Crypt:: encryptString ($request->nombre);
        $clientes->apellidos= Crypt::encryptString($request->apellidos);
        $clientes->edificio = Crypt::encryptString ($request->edificio);
        $clientes->area = Crypt::encryptString($request->area);
        $clientes->eje = Crypt::encryptString($request->eje);
        $clientes->telefono = Crypt::encryptString($request->telefono);
        $clientes->correo = Crypt::encryptString ($request ->correo);

        Log::info("Se Registro Nuevo Cliente");
        $clientes->save();
        return $clientes;
        
    }
    public function ver_imagen($id){
        $clientes = m_clientes::find($id);
        $path = $clientes->imagen;
        $full_path = Storage::path($path);
        $base64 = base64_encode(Storage::get($path));
        $image_data = 'data:'.mime_content_type($full_path) . ';base64,' . $base64;
        return '<img src="'. $image_data .'">';

    }
    public function eliminar(Request $request){
        $clientes = m_clientes::find($request->id);
        $clientes-> delete();
        Log::alert("Error falta un dato");
    }
    
}
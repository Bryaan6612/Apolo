<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\m_venta;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Log;

class venta_controller extends Controller
{
    public function listar(){

        $ventas = m_venta::all();

        foreach($ventas as $venta){
               
            try{
              
                $venta->detalle = Crypt::decryptString($venta->detalle);

                    }catch (DecryptException $e) {
                       //$cliente->telefono = $cliente
                    }
        }

        return $ventas;
    }
       
        public function vista(){

          return view('pages.venta');
    }
    public function guardar(Request $request){

        if($request->id !=0)
        $ventas = m_venta::find($request->id);

        else

        $ventas = new m_venta();
        $ventas -> id_cliente = $request -> id_cliente;
        $ventas -> detalle = Crypt::encryptString($request -> detalle);
        $ventas -> estado = "Abierta";

        $ventas->save();
        Log::info("Se dio de alta un reporte nuevo");

    }


    public function eliminar(Request $request){
        $ventas = m_venta::find($request->id);
        $ventas ->delete();
        
        Log::notice("Se borro un reporte con exito");
    }

    public function cerrar(Request $request){
        $ventas = m_venta::find($request -> id);
        $ventas -> estado = "Cancelada";
        $ventas -> save();
        return $ventas;
    }

    public function completar(Request $request){
        $ventas = m_venta::find($request -> id);
        $ventas -> estado = "Venta Completa";
        $ventas -> save();
        return $ventas;
    }

    public function editar(Request $request){

        if($request->estado !="Abierto")
        $ventas = m_ventas::find($request->id);


        else

        $ventas -> id = $request -> id;
        $ventas -> id_cliente = $request -> id_cliente;
        $ventas -> detalle = $request -> detalle;
        $ventas -> estado = "Abierto";

        }
    
}

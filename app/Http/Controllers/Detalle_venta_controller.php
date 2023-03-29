<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\m_detalleventa;
use Illuminate\Support\Facades\Log;


class Detalle_venta_controller extends Controller
{
    public function listar(){
        $detalleventa = m_detalleventa::all();
        return $detalleventa;
    }
        public function vista(){
          return view('pages.detalleventa');
    }
    public function guardar(Request $request){

        if($request->id !=0)
        $detalleventa = m_detalleventa::find($request->id);

        else

        $detalleventa = new m_detalleventa();
        $detalleventa -> id_venta = $request -> id_venta;
        $detalleventa -> id_reporte = $request -> id_reporte;
        $detalleventa -> cantidad = $request -> cantidad;
        $detalleventa -> precio = $request -> precio;
   



        $detalleventa->save();
        Log::info("Se dio de alta un reporte nuevo");

    }


    public function eliminar(Request $request){
        $detalleventa = m_detalleventa::find($request->id);
        $detalleventa ->delete();
        ;
        Log::notice("Se borro un reporte con exito");
    }

}

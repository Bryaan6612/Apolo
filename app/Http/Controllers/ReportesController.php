<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Models\m_reportes;
use Illuminate\Support\Facades\Log;
use ver_imagen;


class ReportesController extends Controller
{

    

        public function listar(Request $request){
            $nombre_tecnico = $request ->get('buscarpor');
            $nombre_area = $request ->get('buscarporArea');
            //return view('pages.reportes');
            $reportes = m_reportes::tecnicos($nombre_tecnico) ->areas($nombre_area);
            $reportes = m_reportes::all();      
            foreach($reportes as $reporte){            
                try{
                    $reporte->nombre_area($reporte->nombre_area);
                    $reporte->nombre_cliente($reporte->nombre_cliente);
                    $reporte->nombre_tecnico ($reporte->nombre_tecnico);
                    $reporte->reporte ($reporte->reporte);
                    $reporte->estado($reporte->estado);
                    $reporte->feyhora($reporte->feyhora);           
                    }catch ( Exception $e) {
                          
                    }
            }
            return $reportes;
            //return view('pages.reportes',compact('reportes'));
            
        }
        
        public function vista(){
           
            return view('pages.reportes');
           
        }
    
        public function guardar(Request $request){
            if($request->id !=0)
            $reportes = m_reportes::find($request->id);
            else    
            $reportes =new m_reportes(); 
            
            $ruta_archivo = $request->file('imagen')->store('imagenes_apolo');
            
            $reportes->imagen = $ruta_archivo;
            $reportes->nombre_area = Crypt::encryptString  ($request ->nombre_area);
            $reportes->nombre_cliente = Crypt::encryptString ($request ->nombre_cliente);
            $reportes->nombre_tecnico = Crypt::encryptString ($request ->nombre_tecnico);
            $reportes->reporte = Crypt::encryptString($request ->reporte);
            $reportes->estado = Crypt::encryptString($request ->estado);
            $reportes->feyhora ($request ->feyhora);
            Log::notice("Se Registro Nuevo Reporte");
    
            $reportes->save();
            return $reportes;
        }
    
        public function ver_imagen($id){
            $clientes = m_reportes::find($id);
            $path = $storage::path($path);
            $full_path = Storage::path($path);
            $base64 = base64_encode(Storage::get($path));
            $image_data = 'data:'.mime_content_type($full_path) . ';base64,' . $base64;
            return '<img src="'. $image_data .'">';
       
        }
        public function eliminar(Request $request){
            $reportes = m_reportes::find($request->id);
            $reportes-> delete();
            Log::alert("ERROR");
        }
        
        
    }
    
    

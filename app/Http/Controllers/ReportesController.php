<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use App\Models\m_reportes;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Log;
use ver_imagen;


class ReportesController extends Controller
{

    

    public function listar(Request $request)
    {

        $nombre_tecnico = $request ->get('buscarporNombre');
        $nombre_area = $request ->get('buscarporArea');
        $feyhora = $request ->get('buscarporFecha');

        $criteria = [];
        
        if(!is_null($nombre_tecnico)) $criteria[] = ['nombre_tecnico', 'LIKE', '%'.$nombre_tecnico.'%'];
        if(!is_null($nombre_area)) $criteria[] = ['nombre_area', 'LIKE', '%'.$nombre_area.'%'];
        //Se agrego un nuevo campo en el blade y en la consulta para buscar por fecha y hora. 
        if(!is_null($feyhora)) $criteria[] = ['feyhora', 'LIKE', '%'.$feyhora.'%'];

        //return $criteria;

        //return view('pages.reportes');
        //$reportes = m_reportes::tecnicos($nombre_tecnico) ->areas($nombre_area);
        //$reportes = m_reportes::all();      
        //$reportes = m_reportes::where('nombre_tecnico', 'LIKE', '%'.$nombre_tecnico.'%')->get();
        //\DB::enableQueryLog();
        $reportes = m_reportes::where($criteria)->get();
        //dd(\DB::getQueryLog());
        
       /* foreach($reportes as $reporte){            
            try{
                $reporte->nombre_area = $reporte->nombre_area;
                $reporte->nombre_cliente = $reporte->nombre_cliente;
                $reporte->nombre_tecnico = $reporte->nombre_tecnico;
                $reporte->reporte = $reporte->reporte;
                $reporte->estado = $reporte->estado;
                $reporte->feyhora = $reporte->feyhora;           
                
            }catch ( exception $e) {
                
                return $reportes;
            }
        }
        */

        if(empty($reportes)) {
            return ['msg' => 'empty'];
        }else{
            return $reportes;
            //return view('pages.reportes')->with("reportes", $reportes);

        }

        
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
        $reportes->nombre_area = $request -> nombre_area;
        $reportes->nombre_cliente = $request -> nombre_cliente;
        $reportes->nombre_tecnico = $request -> nombre_tecnico;
        $reportes->reporte = $request -> reporte;
        $reportes->estado = $request -> estado;
        $reportes->feyhora = $request -> feyhora;
        Log::notice("Se Registro Nuevo Reporte");

        $reportes->save();
        return $reportes;
    }

    public function ver_imagen($id){
        $reportes = m_reportes::find($id);
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
    
    
    

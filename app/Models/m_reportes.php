<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_reportes extends Model
{

    use HasFactory;
    
    protected $table ="reportes";
    /**
     * @return array|null
     * @author Gonzalo <egonzalo.monterrubio@gmail.com>
     */


    public function scopeTecnicos($query, $nombre_tecnico) 
    {
    	if ($nombre_tecnico) {
    		return $query->Where('nombre_tecnico','LIKE'."%$nombre_tecnico%");
    	}
        return null;
    }


   /**
     * @return array|null
     * @author Gonzalo <egonzalo.monterrubio@gmail.com>
     */

    public function scopeAreas($query, $nombre_area) 
    {
    	if ($nombre_area) {
    		return $query->where('nombre_area','LIKE'."%$nombre_area%");
    	}
        return null;
    }

    public function scopeFecha($query, $feyhora) 
    {
    	if ($feyhora) {
    		return $query->where('feyhora','LIKE'."%$feyhora%");
    	}
        return null;
    }

    
  
}

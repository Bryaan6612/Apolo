<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_reportes extends Model
{
    use HasFactory;
    
    protected $table ="reportes";

    public function scopeTecnicos($query, $nombre_tecnico) {
    	if ($nombre_tecnico) {
    		return $query->Where('nombre_tecnico','LIKE',"%$nombre_tecnico%");
    	}
    }



    public function scopeAreas($query, $nombre_area) {
    	if ($nombre_area) {
    		return $query->where('nombre_area','LIKE',"%$nombre_area%");
    	}
    }

    
  
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Requerimiento extends Model
{
    use HasFactory;
    protected $table = 'requerimiento';
    public $timestamps = false;
    
    protected $primaryKey = 'id_req';
    public $incrementing = true;

    protected $fillable = [
    "id_us",
    "id_cs",
    "id_per",
    "id_tic",
    "id_niv",
    "id_car",
    "nroReq",
    "motivo",
    "fechareq",
    "fechaIni",
    "fechaFin",
    "jornada",
    "nota",
    "foto",
    "observaciones",
    "id_esreq",
    "fecha_nota",
    "id_usmodif",
    "fecha_modif",
    //"conteo_impresion",
    "conteo_edicion",
    "id_cono"

    ] ;

    public function centroDeSalud():BelongsTo{
        return $this->belongsTo(CentroDeSalud::class,"id_cs","id_cs");
    }
    public function cargos():BelongsTo{
        return $this->belongsTo(Cargos::class,"id_car","id_car");
    }
    public function estadoRequerimiento():BelongsTo{
        return $this->belongsTo(EstadoRequerimiento::class,"id_esreq","id_esreq");
    }

    public function adjReq() {
        return $this->hasMany(AdjReq::class,"id_req","id_req");
    }
     
}

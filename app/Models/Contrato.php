<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contrato';
    public $timestamps = false;
    
    protected $primaryKey = 'id_con';
    public $incrementing = true;

    protected $fillable = [
        "id_req",
        "id_us",
        "id_cs",
        "id_tic",
        "id_esco",
        "id_niv",
        "id_car",
        "noCon",
        "partPres",
        "fechaCon",
        "horaCon",
        "fechaIni",
        "fechaFin",
        "jornada",
        "ContraItem",
        "archivoDigital",
        "hash1",
        "imagen",
        "observaciones",
        "id_cinal",
        "id_cireg",
        "id_cite",
        "gestion_au",
        "firmado",
        "observaciones2",
        "fecha_crea",
        "us_crea",
        "feche_modif",
        "us_modif",
        "conteo_impresion",
        "id_per",
        "id_cono"
    ];

}

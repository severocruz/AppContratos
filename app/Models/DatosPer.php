<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class DatosPer extends Model
{
    use HasFactory;
    protected $table = "datos_per";
    public $timestamps = false;
    protected $primaryKey= "id_per";
    public $incrementing = true;

    protected $fillable = [
        'a_paterno',
        'a_materno',
        'nombres',
        "CI",
        "id_dep",
        "matricula",
        "est_civil",
        "sexo",
        "localidad",
        "direccion",
        "calle",
        "No",
        "telefono",
        "email",
        "id_esper",
        "id_file",
        "id_cv",
        "foto",
        "fecha_nac",
        "id_afp",
        "conteo",
        "id_uscrea",
        "fecha_crea",
        "id_usmodif",
        "fecha_modif",
        "estado_conteo",
        "hashDp"
    ];

    public function estadoPersonal():BelongsTo{
        return $this->belongsTo(EstadoPersonal::class,"id_esper","id_esper");
    }
    public function departamento():BelongsTo{
        return $this->belongsTo(Departamento::class,"id_dep","id_dep");
    }
    public function requerimientos(){
        return $this->hasMany('App\Models\Requerimiento','id_per','id_per');
    }

    public function filePer():BelongsTo{
        return $this->belongsTo(FilePer::class,"id_file","id_file");
    }

}

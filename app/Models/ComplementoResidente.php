<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplementoResidente extends Model
{
    use HasFactory;
    protected $table = 'complemento_residente';
    public $timestamps = false;
    
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
    "id_req",
    "id_con",
    "id_residente",
    "id_esp",
    "cargo",
    "anio_formacion",
    "duracion",
    "gestion",
    "id_gari",
    "id_garii",
    "tipo",
    "estado"
    ];
}

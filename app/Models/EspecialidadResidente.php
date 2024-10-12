<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecialidadResidente extends Model
{
    use HasFactory;

    protected $table = 'especialidad_residente';
    public $timestamps = false;
    
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
    "nombre",
    "estado"
    ];
}

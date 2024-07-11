<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoContrato extends Model
{
    use HasFactory;
    protected $table = 'estado_contrato';
    public $timestamps = false;
    
    protected $primaryKey = 'id_esco';
    public $incrementing = true;
}

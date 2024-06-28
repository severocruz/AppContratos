<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoRequerimiento extends Model
{
    use HasFactory;
    protected $table = 'estado_requerimiento';
    public $timestamps = false;
    
    protected $primariKey = 'id_esreq';
    public $incrementing = true;

    protected $fillable = [];   
    
}

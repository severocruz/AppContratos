<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenContrato extends Model
{
    use HasFactory;
    protected $table ='imagenes_contrato';
    public $timestamps = false;
    
    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $fillable = [
        'id_con',
        'imagen',
        'detalle',
        'estado'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegEstadosReq extends Model
{
    use HasFactory;
    protected $table = 'reg_estados_req';
    public $timestamps = false;
    
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
    "id_us",
    "id_req",
    "id_per",
    "id_estini",
    "id_estfin",
    "fecha"
    ] ;
}

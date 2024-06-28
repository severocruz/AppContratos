<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroDeSalud extends Model
{
    use HasFactory;
    protected $table = 'centro_de_salud';
    public $timestamps = false;
    protected $primariKey = 'id_cs';
    public $incrementing = true;
    
    protected $fillable = [] ;
}

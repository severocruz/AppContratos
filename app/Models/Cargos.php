<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;
    protected $table = 'cargos';
    public $timestamps = false;
    
    protected $primariKey = 'id_car';
    public $incrementing = true;

    protected $fillable = [] ;
}

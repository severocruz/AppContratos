<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garante extends Model
{
    use HasFactory;

    protected $table = 'garante';
    public $timestamps = false;
    
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        "a_paterno",
        "a_materno",
        "nombres",
        "ci",
        "id_dep",
        "observacion",
        "estado"
    ];
}

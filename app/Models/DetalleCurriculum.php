<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCurriculum extends Model
{
    use HasFactory;
    protected $table = 'detalle_curriculum';
    public $timestamps = false;
    
    protected $primaryKey = 'id_dcv';
    public $incrementing = true;
    protected $fillable = [
        "id_cv",
        "id_catcv",
        "dato1",
        "dato2",
        "dato3",
        "dato4",
        "dato5",
        "dato6",
        "estado"
    ];
}

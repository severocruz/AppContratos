<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenCurriculum extends Model
{
    use HasFactory;
    
    protected $table ='img_curriculum';
    public $timestamps = false;
    
    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $fillable = [
        'id_dcv',
        'imagen',
        'detalle',
        'estado'
    ];
}

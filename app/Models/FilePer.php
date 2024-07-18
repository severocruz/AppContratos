<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePer extends Model
{
    use HasFactory;
    protected $table = "file_pers";
    public $timestamps = false;

    protected $primaryKey = 'id_file';
    public $incrementing = true;
    protected $fillable = [
        "nombre",
        "ubicacion_fisica"] ;

}

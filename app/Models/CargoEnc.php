<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoEnc extends Model
{
    use HasFactory;

    protected $table = 'cargo_encs';
    public $timestamps = false;
    
    protected $primaryKey = 'idcargos_encs';
    public $incrementing = true;

    protected $fillable = [] ;

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CentroDeSalud extends Model
{
    use HasFactory;
    protected $table = 'centro_de_salud';
    public $timestamps = false;
    protected $primaryKey = 'id_cs';
    public $incrementing = true;
    
    protected $fillable = [] ;
    public function cargoEnc():BelongsTo{
        return $this->belongsTo(CargoEnc::class,"idcargos_encs","idcargos_encs");
    }
}

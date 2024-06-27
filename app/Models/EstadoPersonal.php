<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstadoPersonal extends Model
{
    use HasFactory;
    protected $table = "estado_personal";
    public $timestamps = false;
    protected $primaryKey= "id_esper";
    public $incrementing = true;

    public function personal(): HasMany{
        return $this->hasMany(DatosPer::class,'id_esper','id_esper');
    }
}

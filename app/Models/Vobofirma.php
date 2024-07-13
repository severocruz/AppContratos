<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Vobofirma extends Model
{
    use HasFactory;
    protected $table = "vobofirmas";
    public $timestamps = false;

    protected $primaryKey = 'id_firma';
    public $incrementing = true;
    protected $fillable = [
        "id_con",
        "id_au",
        "observaciones"] ;
    public function autoridadesVb():BelongsTo{
            return $this->belongsTo(AutoridadesVb::class,"id_au","id");
    }
}

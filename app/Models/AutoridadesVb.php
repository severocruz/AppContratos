<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class AutoridadesVb extends Model
{
    use HasFactory;
    protected $table = 'autoridades_vb';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'cargo',
        'orden',
        'estado',
        'gestion_au',
        'img_firma',
        'id_us'
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class,"id_us","id");
    }
}

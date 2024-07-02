<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocAdjunto extends Model
{
    use HasFactory;
    
    protected $table = "doc_adjuntos";
    public $timestamps = false;
    protected $primaryKey= "id_adj";
    public $incrementing = true;
    public $checked = false;

    public function adjReq() {
        return $this->hasMany(AdjReq::class,"id_adj","id_adj");
    }
}

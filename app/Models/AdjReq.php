<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdjReq extends Model
{
    use HasFactory;
    protected $table = "adj_req";
    public $timestamps = false;
    protected $primaryKey= "id_adr";
    public $incrementing = true;
    
    protected $fillable = [
        "id_req",
        "id_adj",
        "observaciones"
    ] ;
}

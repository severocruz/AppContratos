<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisorReq extends Model
{
    use HasFactory;
    protected $table = 'revisor_req';
    public $timestamps = false;
    // protected $primaryKey = 'id';
    // public $incrementing = true;

    protected $fillable = [
    "id_us",
    "tipo",
    "estado"
      ] ;
}

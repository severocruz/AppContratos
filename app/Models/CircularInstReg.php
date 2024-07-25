<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CircularInstReg extends Model
{
    use HasFactory;
    protected $table = 'circular_inst_reg';
    public $timestamps = false;
    
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable=['no',
    'fecha',
    'estado'];
}

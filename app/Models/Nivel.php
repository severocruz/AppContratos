<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;
    protected $table = 'nivel';
    public $timestamps = false;
    
    protected $primariKey = 'id_niv';
    public $incrementing = true;

    protected $fillable = [];   
    
}

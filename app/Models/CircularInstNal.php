<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CircularInstNal extends Model
{
    use HasFactory;
    protected $table = 'circular_inst_nal';
    public $timestamps = false;
    
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable=[];
}

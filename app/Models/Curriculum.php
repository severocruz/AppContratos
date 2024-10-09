<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculum';
    public $timestamps = false;
    
    protected $primaryKey = 'id_cv';
    public $incrementing = true;
    protected $fillable = [
        'fecha'
    ];
}

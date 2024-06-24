<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afp extends Model
{
    use HasFactory;
    protected $table = "afp_aporte";
    public $timestamps = false;
    protected $primaryKey= "id";
    public $incrementing = true;
}

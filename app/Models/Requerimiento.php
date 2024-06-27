<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    use HasFactory;
    protected $table = 'requerimiento';
    protected $timestamp = false;
    protected $primariKey = 'id_req';
    public $incrementing = true;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class RevisionesReq extends Model
{
    use HasFactory;
    protected $table = 'revisiones_req';
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        
        "id_req",
        "id_revisor",
        "dictamen",
        "observaciones",
        "fecha",
        "hora"];
    public function revisorReq():BelongsTo{
        return $this->belongsTo(RevisorReq::class,"id_revisor");
    }
}

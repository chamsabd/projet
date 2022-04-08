<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_resource';
    
    public function seance()
    {
        return $this->belongsTo(Seance::class,'id_seance','id_seance');
    }
}

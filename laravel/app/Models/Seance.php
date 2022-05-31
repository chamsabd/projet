<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#$lastupdated = date('Y-m-d H:i:s');
class Seance extends Model
{
    use HasFactory;
   protected $fillable=['nom_seance','date','temps_debut','temps_fin','formation_id'];
   
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
   // protected $primaryKey='id_demande';
   public function utilisateur(){
         return $this->belongsTo(Utilisateur::class);
       
    }
    public function formation(){
        return $this->belongsTo(Formation::class);
    }

}

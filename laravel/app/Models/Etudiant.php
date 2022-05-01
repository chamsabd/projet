<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    //protected $primaryKey= "carte_etud";
  //  public $incrementing = false;
   
   public function responsable (){
       return $this->belongsTo(Responsable ::class);
   }
   public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}

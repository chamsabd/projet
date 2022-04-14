<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    //protected $primaryKey= "carte_etud";
  //  public $incrementing = false;
    public function client(){
        return $this->belongsTo(Client::class);
     
   }
   public function responsable (){
       return $this->belongsTo(Responsable ::class);
   }
}

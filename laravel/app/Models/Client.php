<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
 
    
    public function departement(){
        return $this->belongsTo(Departement::class);
      
   }
   public function etudiant()
   {
       return $this->hasOne(Etudiant::class);
   }
    public function utilisateur(){
    return $this->belongsTo(Utilisateurs::class);
}

}
?>

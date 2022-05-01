<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    public function responsable(){
        return $this->hasOne(Responsable::class);
    }
    public function professeur(){
        return $this->hasOne(Professeur::class);
    }
    public function etudiant(){
        return $this->hasOne(Etudiant::class);
    }
 
}
?>

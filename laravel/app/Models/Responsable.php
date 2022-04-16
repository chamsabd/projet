<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{  
    use HasFactory;

  public function etudiants()
  {
      return $this->hasMany(Etudiant::class);
  }

  public function professeurs()
  {
      return $this->hasMany(Professeur::class);
  }

  public function demandes()
  {
      return $this->hasMany(Demande::class);
  }

  public function admin()
  {
      return $this->belongsTo(Admin::class);
  }

}

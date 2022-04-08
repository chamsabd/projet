<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{  
    use HasFactory;
    protected $primaryKey='id_responsable';
   // public $incrementing = false ;
  // public $timestamps = false ;

  public function etudiants()
  {
      return $this->hasMany(Etudiant::class, 'id_responsable','id_responsable');
  }

  public function professeurs()
  {
      return $this->hasMany(Professeur::class,'id_responsable','id_responsable');
  }

  public function demandes()
  {
      return $this->hasMany(Demande::class,'id_responsable','id_responsable');
  }

  public function admin()
  {
      return $this->belongsTo(Admin::class,'id_responsable','id_responsable');
  }


}

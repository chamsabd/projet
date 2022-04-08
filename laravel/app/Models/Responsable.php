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
      return $this->hasMany('app\Models\Etudiant', 'id_responsable');
  }

  public function professeurs()
  {
      return $this->hasMany('app\Models\Professeur','id_responsable');
  }

  public function demandes()
  {
      return $this->hasMany('app\Models\Demande','id_responsable');
  }

  public function admin()
  {
      return $this->belongsTo('app\Admin','id_responsable');
  }


}

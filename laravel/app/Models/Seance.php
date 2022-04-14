<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;
 
    //public $timestamps = false ;
    /*
    public function ressources()
    {
        return $this->hasMany(Ressource::class,'id_seance');
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class,'id_seance');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class,'id_seance');
    }
*/

}

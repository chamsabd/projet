<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;
    protected $primaryKey='id_seance';
    //public $timestamps = false ;
    public function ressources()
    {
        return $this->hasMany('app\Models\Ressource','id_seance');
    }

    public function professeur()
    {
        return $this->belongsTo('app\Category','id_seance');
    }

    public function formation()
    {
        return $this->belongsTo('app\Formation','id_seance');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
   // protected $primaryKey='id_demande';
   public function client(){
         return $this->belongsTo(Client::class);
       
    }
    public function responsable(){
        return $this->belongsTo(Responsable::class);
    }
    public function formation(){
        return $this->belongsTo(Formation::class);
    }

}

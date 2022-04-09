<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $primaryKey='id_demande';
   public function clients(){
         return $this->belongsTo(Client::class,'id_clients','id_clients');
       
    }
   
}

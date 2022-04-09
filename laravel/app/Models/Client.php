<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
 
    protected $primaryKey = 'id_clients';
    
    public function departement(){
        return $this->belongsTo(Departement::class,'id_departement','id_dep');
      
   }
   public function formations()
   {
       return $this->belongsToMany(Formation::class);
   }
}

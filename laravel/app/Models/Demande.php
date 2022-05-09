<?php

namespace App\Models;
use App\Models\Formation;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable=[
'date_demande',
'formation_id',
'utilisateur_id'
    ];
   // protected $primaryKey='id_demande';
   public function utilisateur(){
         return $this->belongsToMany(Utilisateur::class);
            
    }
    public function formation(){
        return $this->belongsToMany(Formation::class);
    }

}

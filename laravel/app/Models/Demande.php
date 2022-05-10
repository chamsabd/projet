<?php

namespace App\Models;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    protected $fillable=[
'date_demande',
'formation_id',
'user_id'
    ];
   // protected $primaryKey='id_demande';
   public function user(){
         return $this->belongsToMany(User::class);
            

    }
    
    public function formation(){
        return $this->belongsToMany(Formation::class);
    }

}

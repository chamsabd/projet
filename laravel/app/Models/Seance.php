<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;
  
    public function ressources()
    {
        return $this->hasMany(Ressource::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }


}

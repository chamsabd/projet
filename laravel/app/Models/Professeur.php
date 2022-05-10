<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;
    

    public function Responsable()
    {
        return $this->belongsTo(Responsable::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function utilsateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

  

    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }
    public function departments()
    {
        return $this->hasMany(Departement::class);
    }
    public function responsables()
    {
        return $this->hasMany(Responsable::class);
    }
}

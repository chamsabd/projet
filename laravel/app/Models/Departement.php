<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    

    public function Admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    
}

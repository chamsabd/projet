<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_admin';
    public $incrementing = false;

    public function utilisateur()
    {
        return $this->hasOne(Utilisateur::class,'ncin','ncin');
    }
}
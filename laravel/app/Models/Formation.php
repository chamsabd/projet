<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
   

    public function responsable()
    {
        return $this->belongsTo(Utilisateur::class, 'responsable_id');
    } 
    public function formateur()
    {
        return $this->belongsTo(Utilisateur::class, 'formateur_id');
    }  
    public function formateurexterne()
    {
        return $this->belongsTo(Utilisateur::class, 'formateurexterne_id');
    } 
}
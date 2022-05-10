<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    } 
    public function formateur()
    {
        return $this->belongsTo(User::class, 'formateur_id');
    }  
    public function formateurexterne()
    {
        return $this->belongsTo(User::class, 'formateurexterne_id');
    } 
    public function demandes()
    {
        return $this->belongsToMany(User::class, 'demandes');
    }
    public function inscrits()
    {
        return $this->belongsToMany(User::class, 'inscrits');
    }
    public function certifs()
    {
        return $this->belongsToMany(User::class, 'certifs');
    }
}
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
        return $this->belongsToMany(User::class, 'demandes')->withTimestamps()->withPivot('id',"accepted");
    }
    public function inscrits()
    {
        return $this->belongsToMany(User::class, 'inscrits')->withTimestamps()->withPivot('id');
    }
    public function certifs()
    {
        return $this->belongsToMany(User::class, 'Certifications')->withTimestamps()->withPivot('id',"score");


    }
    public function ressources()
    {
        return $this->hasMany(Resource::class);
    } 
}
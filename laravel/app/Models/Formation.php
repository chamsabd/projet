<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_formation';

public function inscrits()
{
    return $this->hasMany(Inscrit::class,'id_formation');
}
}
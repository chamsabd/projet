<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model
{
    use HasFactory;    

public function Formation()
{
    return $this->belongsTom(Formation::class,'id_formation');
}    
}

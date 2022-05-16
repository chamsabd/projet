<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model
{
    use HasFactory;    

public function formations()
{
 return $this->belongsTo(Formation::class,'formation_id');
}  
public function users()
{
    return $this->belongsTo(User::class,'user_id');
}  

}

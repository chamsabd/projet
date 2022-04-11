<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model
{
    use HasFactory;    

public function Formation()
{
<<<<<<< HEAD
    return $this->belongsTom(Formation::class,'id_formation');
}    
=======
    return $this->belongsTo(Formation::class,'id_formation');
}  
public function client()
{
    return $this->belongsTo(Client::class,'id_formation');
}  
>>>>>>> 47ca99f5f87940008a6a74ab616ca2b8a32fe0a7
}

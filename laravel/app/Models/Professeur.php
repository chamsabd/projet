<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_reponsable';

   /* public function Responsable()
    {
        return $this->belongsTo(Responsable::class, 'id_reponsable');
    }
    */
}

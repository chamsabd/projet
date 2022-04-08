<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $primaryKey = 'ncin';
    public $incrementing = false;
    public function admin()
    {
        return $this->belongsTo(Admin::class,'ncin','ncin');
    }
}

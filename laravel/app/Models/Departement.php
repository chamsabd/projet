<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_dep';

    /* public function admins()
    {
        return $this->hasMany(Admin::class, 'id_admin');
    }
    */
}

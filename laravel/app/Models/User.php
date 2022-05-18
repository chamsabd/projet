<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
   
     use HasFactory, Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'ncin',
        'avatar',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    public function responsable(){
        return $this->hasOne(Responsable::class);
    }
    public function professeur(){
        return $this->hasOne(Professeur::class);
    }
    public function etudiant(){
        return $this->hasOne(Etudiant::class);
    }
    public function certif(){
        return $this->belongsToMany(Formation::class,"certifications")
        ->withTimestamps()->withPivot('id');
    }
 }

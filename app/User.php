<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'login', 'fonction', 'password', 'profil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     public function hisFonction()
    {
         return $this->belongsTo(Fonction::class, 'fonction');
    }
    public function quotas()
    {
        return $this->hasMany(Quota::class);
    }
    public function justificatifs()
    {
        return $this->hasMany(Justificatif::class);
    }
    
}

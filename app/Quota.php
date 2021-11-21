<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quota extends Model
{

    protected $fillable = [
        'nombre', 'type', 'user_id'
    ];
    public function user()
    { //chaque user a un quota 
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $attributes = [
        'id' => 0,
    ];
    protected $fillable = [
        'email', 'sujet', 'msg', 'etat',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

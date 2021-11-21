<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Justificatif extends Model
{
    protected $attributes = [
        'id' => 0,
    ];
    protected $fillable = [
        'fichier', 'sujet',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

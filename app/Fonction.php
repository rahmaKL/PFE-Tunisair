<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    protected $attributes = [
        'id' => 0,
        'nom' => "",
    ];
    protected $fillable = ['nom'];
}

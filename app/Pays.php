<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $attributes = [
        'id' => 0,
    ];
    protected $fillable = [
        'nom', 'code'
    ];
}
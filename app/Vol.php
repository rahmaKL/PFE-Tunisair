<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    protected $attributes = [
        'id' => 0,
    ];
    protected $fillable = [
        'de', 'a', 'date', 'tarif'
    ];

    public function paysDe()
    {  // gerer la relation avec la table pays 
        return $this->belongsTo(Pays::class, 'de');
    }
    public function paysA()
    {
        return $this->belongsTo(Pays::class, 'a');
    }
}

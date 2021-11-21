<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FonctionQuota extends Model
{
    protected $fillable = [
        'fonction_id', 'quota_id', 'nombre'
    ];
    public function fonction()
    {
        return $this->belongsTo(Fonction::class);
    }
}

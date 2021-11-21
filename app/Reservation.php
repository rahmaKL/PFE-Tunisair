<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $attributes = [
        'id' => 0,
        'type' => 0,
        'de' => 3637,
        'a' => 3637,
    ];
    protected $fillable = [
        'type', 'depart', 'retour', 'de', 'a',
        'date_demande', 'date_validation', 'etat',
        'commentaire', 
        'vol_depart', 'vol_retour', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function paysDe()
    {
        return $this->belongsTo(Pays::class, 'de');
    }
    public function paysA()
    {
        return $this->belongsTo(Pays::class, 'a');
    }
    public function volDepart()
    {
        return $this->belongsTo(Vol::class, 'vol_depart');
    }
    public function volRetour()
    {
        return $this->belongsTo(Vol::class, 'vol_retour');
    }
}

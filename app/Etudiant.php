<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    public function stagaire()
    {
        return $this->hasOne(Stagaire::class);
 
    }

    public function niveau()
    {
        return $this->belongsTo('App\Niveau');
    }

}

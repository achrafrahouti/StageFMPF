<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    public function lignestage()
    {
        return $this->hasOne(Stagaire::class);
 
    }

}

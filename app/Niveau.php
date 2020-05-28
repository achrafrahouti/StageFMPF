<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    public function periodes()
    {
        return $this->hasMany('App\Periode','niveau_id');
    }
    public function groupes()
    {
        return $this->hasMany('App\Niveau', 'niveau_id');
    }
}

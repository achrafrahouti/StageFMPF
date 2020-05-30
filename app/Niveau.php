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
        return $this->hasMany('App\Groupe', 'niveau_id');
    }
    public function stages()
    {
        return $this->hasMany('App\Stage','niveau_id');
    }
    public function etudiants()
    {
        return $this->hasMany('App\Etudiant', 'niveau_id');
    }
}

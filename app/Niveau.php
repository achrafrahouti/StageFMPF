<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    public function periode()
    {
        return $this->hasOne('App\Periode','niveau_id');
    }
}

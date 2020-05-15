<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Secretaire extends Model
{
    public function user()
    {
        return $this->morphOne('App\User','profile');
    }

    public function stage()
    {
        return $this->hasOne('App\Stage','secretaire_id');
    }
    public function service()
    {
        return $this->hasOne('App\Service', 'secretaire_id');
    }

}

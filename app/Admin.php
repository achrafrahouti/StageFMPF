<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->morphOne('App\User','profile');
    }
}

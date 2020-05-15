<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'name',
        'groupe_tot',
        'groupe_sh',
        'geoupe_sgh',
        'created_at',
        'updated_at',
    ];

    public function stagaires()
    {
        return $this->hasMany('App\Stagaire', 'groupe_id');
    }
}

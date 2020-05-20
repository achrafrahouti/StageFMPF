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

    public function stages()
    {
        return $this->belongsToMany('App\Stage','stage_groupe_periode','groupe_id','stage_id')->withPivot('periode_id');
    }

    public function periodes()
    {
        return $this->belongsToMany('App\Periode','stage_groupe_periode','groupe_id','periode_id')->withPivot('stage_id');
    }
}

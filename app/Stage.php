<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stage extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'service_id',
        'niveau_id',
        'created_at',
        'updated_at',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function stagaires()
    {
        return $this->belongsToMany('App\Stagaire', 'notes', 'stage_id', 'stagaire_id')->withPivot('note');
    }

    public function periodes()
    {
        return $this->belongsToMany('App\Stage','stage_groupe_periode','periode_id','stage_id')->wherePivot('groupe_id');
    }

    public function groupes()
    {
        return $this->belongsToMany('App\Groupe', 'stage_groupe_periode', 'stage_id', 'groupe_id')->withPivot('periode_id');
    }
    public function niveau()
    {
        return $this->belongsTo('App\Niveau');
    }
}

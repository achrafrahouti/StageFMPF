<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Periode extends Model
{

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    /**
     * FOR TEST BRANCHE
     */
    protected $fillable = [
        'name',
        'date_debut',
        'date_fin',
        'niveau_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * tout les stages join avec une periode
     */
    public function stages()
    {
        return $this->belongsToMany('App\Stage','stage_groupe_periode','periode_id','stage_id')->withPivot('groupe_id');
    }

    public function groupes()
    {
        return $this->belongsToMany('App\Stage','stage_groupe_periode','periode_id','groupe_id')->withPivot('stage_id');
    }

    public function niveau()
    {
        return $this->belongsTo('App\Niveau');
    }

}

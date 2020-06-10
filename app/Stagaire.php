<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stagaire extends Model
{
    public $timestamps = false; // pas attribut 'created_at' et " updated_at"
    protected $dates = [

    ];

    protected $fillable = [
        'etudiant_id',
        'groupe_id',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
    public function stages()
    {
        return $this->belongsToMany('App\Stage', 'notes', 'stagaire_id', 'stage_id')->withPivot('note');
    }

    public function user()
    {
        return $this->morphOne('App\User','profile');
    }

    public function demandes()
    {
        return $this->hasMany('App\Demande','id_stagaire');
    }

}

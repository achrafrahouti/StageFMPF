<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'capacite',
        'lieu',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }
    public function secretaire()
    {
        return $this->hasOne('App\Secretaire','service_id');
    }

    public function encadrant()
    {
        return $this->hasOne('App\Encadrant', 'service_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'service_id',
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

    public function secretaire()
    {
        return $this->belongsTo('App\Secretaire', 'secretaire_id');
    }
}

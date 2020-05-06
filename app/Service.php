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
}

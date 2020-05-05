<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    /**
     * 
     */
    protected $fillable = [
        'name',
        'date_debut',
        'date_fin',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}

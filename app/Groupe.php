<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
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
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}

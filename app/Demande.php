<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
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
    	'id',
        'id_stagaire',
        'id_stage',
        'type_dem',
        'objet_dem',
        'demande_validé',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

 public function stagaire()
{
   return $this->belongsTo('App\Stagaire','id_stagaire'); 
}
 public function stage()
{
   return $this->belongsTo('App\Stage','id_stage'); 
}


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transport_routes extends Model
{
    

    protected $guarded = [];

        
    public function operator(){
    	return $this->belongsTo(rental_operators::class,'rental_operator_id','id');
    }

    
    public function region(){
    	return $this->belongsTo(tours_destinations::class,'region_id','id');
    }






}

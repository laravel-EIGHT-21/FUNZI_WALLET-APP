<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class car_rental_cart extends Model
{
    


    protected $guarded = [];

    public function car(){
    	return $this->belongsTo(car::class,'car_id','id');
    }


    public function school(){
    	return $this->belongsTo(User::class,'school_id','id');
    }





}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class car_rental_bookings extends Model
{
    


    protected $guarded = [];

    public function rental(){
    	return $this->belongsTo(car::class,'car_id','id');
    }


    public function booking(){
    	return $this->belongsTo(car_bookings::class,'booking_id','id');
    }
 

    public function school(){
    	return $this->belongsTo(User::class,'school_id','id');
    }



}

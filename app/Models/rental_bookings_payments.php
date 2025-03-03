<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rental_bookings_payments extends Model
{
    


    protected $guarded = [];

        
    public function school(){
    	return $this->belongsTo(User::class,'school_id','id');
    }

    
    public function booking(){
    	return $this->belongsTo(car_bookings::class,'booking_id','id');
    }


}

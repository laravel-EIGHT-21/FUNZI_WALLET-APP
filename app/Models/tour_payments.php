<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tour_payments extends Model
{
    use HasFactory;

    protected $guarded = [];

        
    public function school(){
    	return $this->belongsTo(User::class,'school_id','id');
    }

    
    public function booking(){
    	return $this->belongsTo(school_bookings::class,'booking_id','id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tours_packs extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function tour(){
    	return $this->belongsTo(tour_packages::class,'tour_package_id','id');
    }


    public function booking(){
    	return $this->belongsTo(school_bookings::class,'booking_id','id');
    }
 

    public function school(){
    	return $this->belongsTo(User::class,'school_id','id');
    }



}

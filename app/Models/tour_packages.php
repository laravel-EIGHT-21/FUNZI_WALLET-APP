<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tour_packages extends Model
{
    use HasFactory;

    protected $guarded = [];



            
    public function destination(){
    	return $this->belongsTo(tours_destinations::class,'destination_id','id');
    }



}

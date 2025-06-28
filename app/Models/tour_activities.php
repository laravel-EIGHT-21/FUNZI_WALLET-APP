<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tour_activities extends Model
{
    


        use HasFactory;

    protected $guarded = [];

    public function tour(){
    	return $this->belongsTo(tour_packages::class,'tour_id','id');
    }




}

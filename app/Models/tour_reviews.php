<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tour_reviews extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function school(){
        return $this->belongsTo(User::class, 'school_id' ,'id');
    }



    public function tour(){
    	return $this->belongsTo(tour_packages::class,'tour_id','id');
    }




}

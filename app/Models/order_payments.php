<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_payments extends Model
{
    

    protected $guarded = [];

         
    public function school(){
    	return $this->belongsTo(User::class,'school_id','id');
    }

    
    public function order(){
    	return $this->belongsTo(orders::class,'order_id','id');
    }





}

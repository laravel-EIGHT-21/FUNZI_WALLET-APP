<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    protected $guarded = [];

        
    public function operator(){
    	return $this->belongsTo(rental_operators::class,'rental_operator_id','id');
    }

}

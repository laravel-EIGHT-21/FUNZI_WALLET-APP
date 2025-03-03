<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school_bookings extends Model
{
    use HasFactory;

    protected $guarded = [];

        
    public function school(){
    	return $this->belongsTo(User::class,'school_id','id');
    }




}

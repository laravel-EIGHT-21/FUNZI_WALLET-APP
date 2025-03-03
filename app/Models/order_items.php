<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_items extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
    	return $this->belongsTo(products::class,'product_id','id');
    }


    public function school(){
    	return $this->belongsTo(User::class,'school_id','id');
    }



}

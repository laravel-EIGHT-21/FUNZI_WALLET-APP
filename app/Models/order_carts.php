<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_carts extends Model
{
    
    protected $guarded = [];



    public function school(){
      return $this->belongsTo(User::class,'school_id','id');
  }


  public function product(){
    return $this->belongsTo(Products::class,'product_id','id');
}
}

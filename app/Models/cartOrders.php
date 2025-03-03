<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartOrders extends Model
{
    use HasFactory;


    protected $guarded = [];



    public function school(){
      return $this->belongsTo(User::class,'school_id','id');
  }


  public function product(){
    return $this->belongsTo(Products::class,'product_id','id');
}


}

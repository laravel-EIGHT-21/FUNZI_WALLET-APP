<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense_payments_track extends Model
{
    use HasFactory;


    protected $guarded = [];
 
         
    public function expense(){
        return $this->belongsTo(expenses::class,'expense_id','id');
    }


         
    public function school(){
        return $this->belongsTo(User::class,'school_id','id');
    }



    public function term(){
        return $this->belongsTo(school_terms::class,'term_id','id');
    }



}

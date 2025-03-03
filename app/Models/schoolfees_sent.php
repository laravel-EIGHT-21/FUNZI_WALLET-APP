<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schoolfees_sent extends Model
{
    use HasFactory;

    protected $guarded = [];
 
         
    public function school(){
        return $this->belongsTo(User::class,'school_id','school_id_no');
    }


        
    public function sender(){
        return $this->belongsTo(User::class,'sender_id','id');
    }



}
